<?php

namespace App\Http\Controllers\Sekertaris;
use App\Http\Controllers\Controller;
use App\MaterialMasuk;
use App\DetailMaterialMasuk;
use App\Material;
use App\Suplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PDF;

class MaterialMasukController extends Controller
{
    public function index(Request $request){

        if ($request->start != null && $request->end!= null && $request->kode!= null){
            $this->validate($request,[
                    'start'=> 'required',
                    'end'=> 'required',
            ]);
            $data = MaterialMasuk::select('suplier.*','sekertaris.*','material_masuk.*','detail_material_masuk.*','material.*','material_masuk.created_at as waktu_entri')
            ->join('detail_material_masuk','detail_material_masuk.material_masuk_id','material_masuk.id_material_masuk')
            ->join('material','material.id_material','detail_material_masuk.material_id')
            ->join('sekertaris','material_masuk.sekertaris_id','sekertaris.id_sekertaris')
            ->join('suplier','material_masuk.suplier_id','suplier.id_suplier')
            ->whereBetween('material_masuk.created_at', [Carbon::createFromFormat('d-m-Y', $request->start)->startOfDay()->toDateTimeString(), Carbon::createFromFormat('d-m-Y', $request->end)->endOfDay()->toDateTimeString()])
            ->where('material_masuk.kode_transaksi_masuk',$request->kode)
            ->orderBy('material_masuk.created_at', 'desc')
            ->get();

        }else  if($request->start != null && $request->end!= null){
            $this->validate($request,[
                    'start'=> 'required',
                    'end'=> 'required',
            ]);

            $data = MaterialMasuk::select('suplier.*','sekertaris.*','material_masuk.*','detail_material_masuk.*','material.*','material_masuk.created_at as waktu_entri')
            ->join('detail_material_masuk','detail_material_masuk.material_masuk_id','material_masuk.id_material_masuk')
            ->join('material','material.id_material','detail_material_masuk.material_id')
            ->join('sekertaris','material_masuk.sekertaris_id','sekertaris.id_sekertaris')
            ->join('suplier','material_masuk.suplier_id','suplier.id_suplier')
            ->whereBetween('material_masuk.created_at', [Carbon::createFromFormat('d-m-Y', $request->start)->startOfDay()->toDateTimeString(), Carbon::createFromFormat('d-m-Y', $request->end)->endOfDay()->toDateTimeString()])
            ->orderBy('material_masuk.created_at', 'desc')
            ->get();

        }else{
            $data = MaterialMasuk::select('suplier.*','sekertaris.*','material_masuk.*','detail_material_masuk.*','material.*','material_masuk.created_at as waktu_entri')
                    ->join('detail_material_masuk','detail_material_masuk.material_masuk_id','material_masuk.id_material_masuk')
                    ->join('material','material.id_material','detail_material_masuk.material_id')
                    ->join('sekertaris','material_masuk.sekertaris_id','sekertaris.id_sekertaris')
                    ->join('suplier','material_masuk.suplier_id','suplier.id_suplier')
                    ->orderBy('material_masuk.created_at', 'desc')
                    ->groupBy('detail_material_masuk.material_masuk_id')
                    ->get();
        }
        return view('sekertaris.materialmasuk.index', compact('data'));

    }

    public function create() {
        $suplier = Suplier::get();
        $material = Material::select('material.*', 'kategori.*')
        ->join('kategori', 'material.kategori_id', 'kategori.id_kategori')
        ->get();

        return view('sekertaris.materialmasuk.create',compact('suplier','material'));
    }

    public function store(Request $request) {
        $request->validate([
            'suplier_id' => 'required',
            'jumlah_material' => 'required',
            'checklist' => 'required',
        ]);

        //Cek Jumlah Material START
        $cek=0;
        foreach($request->jumlah_material as $index) {
            if($index!=null) {
                $cek++;
            }
        }

        if($cek==0 || (count($request->checklist)!=$cek)) {
            return redirect()->back()
                ->with(['jenis' => 'error', 'pesan' => 'Jumlah material harus diisi']);
        }
        //Cek Jumlah Material END

        //insert data material masuk & kode transaksi------------------------
        $last_id = MaterialMasuk::orderBy('id_material_masuk', 'DESC')->first();
        $get_id = 1;
        if($last_id){
            $get_id = $last_id->id_material_masuk+1;
        }
        $materialMasuk = MaterialMasuk::create([
            'harga_total' => 0,
            'suplier_id'  => $request->suplier_id,
            'kode_transaksi_masuk'=>"MS".sprintf('%04s', $get_id),
            'sekertaris_id'=>Auth::guard('sekertaris')->user()->id_sekertaris,
        ]);

        //inisialisasi harga total
        $total=0;

        //perulangan insert detail material
        foreach($request->checklist as $index) {
            DetailMaterialMasuk::create([
                'jumlah_material_masuk' =>  $request->jumlah_material[$index],
                'material_masuk_id'  =>  $materialMasuk->id_material_masuk,
                'material_id'  => $request->id[$index],
            ]);

            $material = Material::where('id_material', $request->id[$index])->first();
            $stok=$material->stok_material+$request->jumlah_material[$index];

            $material->update([
                'stok_material' => $stok
            ]);
            //menghitung total harga
            $total += $request->jumlah_material[$index]*$request->harga_satuan[$index];
        }

        //update material masuk tadi
        $materialMasuk->update([
            'harga_total' => $total,
        ]);

        return redirect(route('sekertaris.materialmasuk.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Material Berhasil Di tambahkan']);
    }

    //edit-------------------------------------------------------------------------------
    public function edit($id) {
        $data = MaterialMasuk::findOrFail($id);

        $suplier = Suplier::get();

        $material = Material::select('material.*', 'kategori.*')
        ->join('kategori', 'material.kategori_id', 'kategori.id_kategori')
        ->get();

        $detailMaterial = DetailMaterialMasuk::where('material_masuk_id', $id)->get();

        return view('sekertaris.materialmasuk.edit', compact('data','suplier','material','detailMaterial'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'suplier_id' => 'required',
            'checklist' => 'required',
        ]);

        $data = MaterialMasuk::find($id);
        $total=0;

//         $i=0;
//         foreach($request->checklist as $index) {
//                 $a=0;
//                 foreach($request->id as $material) {
//                     if($i==$a) {
//                         $detailMaterialMasuk = DetailMaterialMasuk::where('material_masuk_id',$data->id_material_masuk)->where('material_id', $material)->first();
//                         $material = Material::where('id_material', $material)->first();

//                         $stokBaru = $material->stok_material-$request->jumlah_material[$a];

//                         $material->update([
//                             'stok_material' => $stokBaru
//                         ]);
// dump($i);
// dump($a);
// dump("NGURANG");

//                     }
//                     $a++;
//                 }
//             $i++;
//         }
//         dd("MANDEK");
//         // DetailMaterialMasuk::where('material_masuk_id',$data->id_material_masuk)->delete();

//         $i=0;
//         foreach($request->checklist as $index) {
//             // DetailMaterialMasuk::create([
//             //     'jumlah_material_masuk' =>  $request->jumlah_material[$index],
//             //     'material_masuk_id'  =>  $data->id_material_masuk,
//             //     'material_id'  => $request->id[$index],
//             // ]);

//             $a=0;
//             foreach($request->id as $materials) {
//                 if($i==$index) {
//                     $material = Material::where('id_material', $request->id[$a])->first();
//                     $stok=$material->stok_material+$request->jumlah_material[$a];

//                     $material->update([
//                         'stok_material' => $stok
//                     ]);
//                     dump($i);
//                     dump($a);
//                     dump("NAMBAH");
//                     $total += $request->jumlah_material[$a]*$request->harga_satuan[$a];
//                 }
//                 $a++;
//             }
//             $i++;
//         }


        $countDetail = DetailMaterialMasuk::where('material_masuk_id',$data->id_material_masuk)->get();
        if(count($request->checklist) == count($countDetail)) {
            foreach($request->checklist as $index) {

                $detailMaterialMasuk = DetailMaterialMasuk::where('material_masuk_id',$data->id_material_masuk)->where('material_id', $request->id[$index])->first();
                $material = Material::where('id_material', $request->id[$index])->first();
                $kembaliKeStokAwal=$material->stok_material-$detailMaterialMasuk->jumlah_material_masuk;
                $stokBaru = $kembaliKeStokAwal+$request->jumlah_material[$index];

                $material->update([

                    'stok_material' => $stokBaru
                ]);

                $detailMaterialMasuk->update([
                    'jumlah_material_masuk' => $request->jumlah_material[$index]
                ]);
                $total += $request->jumlah_material[$index]*$request->harga_satuan[$index];
            }
        } else {
            foreach($request->checklist as $index) {
                $detailMaterialMasuk = DetailMaterialMasuk::where('material_masuk_id',$data->id_material_masuk)->where('material_id', $request->id[$index])->get();

                foreach($detailMaterialMasuk as $dm) {
                    dump($dm->material_id);
                    if($dm->material_id != $request->id[$index]) {
                            dump("A");
                    }
                }
                // $material = Material::where('id_material','!=',$request->id[$index])->first();
            }

            // DetailMaterialMasuk::where('material_masuk_id',$data->id_material_masuk)->delete();

        }



dd("MANDEK");
        $data->update([
            'harga_total' => $total,
            'suplier_id'  => $request->suplier_id,
        ]);
        dd("A");

        return redirect(route('sekertaris.materialmasuk.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Mengubah Data Material Masuk']);
    }

//--------------------------------------delete--------------------------------------------------
    public function destroy($id)
    {
        $cek=0;
        $dataCek = DetailMaterialMasuk::where('material_masuk_id',$id)->get();
        foreach($dataCek as $d)
        {
            $cekStok = Material::where('id_material', $d->material_id)->first();
            if($cekStok->stok_material<$d->jumlah_material_masuk) {
                $cek++;
            }
        }
        if($cek>0) {
            return redirect(route('sekertaris.materialmasuk.index'))
            ->with(['jenis' => 'error', 'pesan' => 'Gagal Hapus Data Material Karena Stok Kurang']);
        }

        $data = DetailMaterialMasuk::where('material_masuk_id',$id)->get();
        foreach($data as $d)
        {

            $updateMaterial = Material::where('id_material', $d->material_id)->first();

            $updateMaterial->update([
                'stok_material' => $updateMaterial->stok_material-$d->jumlah_material_masuk
            ]);
        }
        DetailMaterialMasuk::where('material_masuk_id',$id)->delete();
        MaterialMasuk::findOrFail($id)->delete();
        return redirect(route('sekertaris.materialmasuk.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Hapus Data Material Masuk']);
    }


//-----------------------------------------------------------cetak-----------------------------------------------------
    public function cetakMaterialMasuk(Request $request) {
        if ($request->start != null && $request->end!= null&& $request->kode!= null){
                $this->validate($request,[
                        'start'=> 'required',
                        'end'=> 'required',
                ]);

                $data = MaterialMasuk::select('suplier.*','sekertaris.*','material_masuk.*','detail_material_masuk.*','material.*','material_masuk.created_at as waktu_entri')
                ->join('detail_material_masuk','detail_material_masuk.material_masuk_id','material_masuk.id_material_masuk')
                ->join('material','material.id_material','detail_material_masuk.material_id')
                ->join('sekertaris','material_masuk.sekertaris_id','sekertaris.id_sekertaris')
                ->join('suplier','material_masuk.suplier_id','suplier.id_suplier')
                ->whereBetween('material_masuk.created_at', [Carbon::createFromFormat('d-m-Y', $request->start)->startOfDay()->toDateTimeString(), Carbon::createFromFormat('d-m-Y', $request->end)->endOfDay()->toDateTimeString()])
                ->where('material_masuk.kode_transaksi_masuk',$request->kode)
                ->orderBy('material_masuk.created_at', 'desc')
                ->get();

            }else  if($request->start != null && $request->end!= null){
                $this->validate($request,[
                        'start'=> 'required',
                        'end'=> 'required',
                ]);

                $data = MaterialMasuk::select('suplier.*','sekertaris.*','material_masuk.*','detail_material_masuk.*','material.*','material_masuk.created_at as waktu_entri')
                ->join('detail_material_masuk','detail_material_masuk.material_masuk_id','material_masuk.id_material_masuk')
                ->join('material','material.id_material','detail_material_masuk.material_id')
                ->join('sekertaris','material_masuk.sekertaris_id','sekertaris.id_sekertaris')
                ->join('suplier','material_masuk.suplier_id','suplier.id_suplier')
                ->whereBetween('material_masuk.created_at', [Carbon::createFromFormat('d-m-Y', $request->start)->startOfDay()->toDateTimeString(), Carbon::createFromFormat('d-m-Y', $request->end)->endOfDay()->toDateTimeString()])
                ->orderBy('material_masuk.created_at', 'desc')
                ->get();

        }else{
            $data = MaterialMasuk::select('suplier.*','sekertaris.*','material_masuk.*','detail_material_masuk.*','material.*','material_masuk.created_at as waktu_entri')
                    ->join('detail_material_masuk','detail_material_masuk.material_masuk_id','material_masuk.id_material_masuk')
                    ->join('material','material.id_material','detail_material_masuk.material_id')
                    ->join('sekertaris','material_masuk.sekertaris_id','sekertaris.id_sekertaris')
                    ->join('suplier','material_masuk.suplier_id','suplier.id_suplier')
                    ->orderBy('material_masuk.created_at', 'desc')
                    ->groupBy('detail_material_masuk.material_masuk_id')
                    ->get();
        }



        $pdf = PDF::loadView('sekertaris.materialmasuk.cetak', compact('data'));
        $pdf->setPaper('Folio', 'landscape');
        return $pdf->stream('Laporan Material Masuk.pdf');
         }

}
