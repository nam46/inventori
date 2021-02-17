<?php

namespace App\Http\Controllers\Sekertaris;
use App\Http\Controllers\Controller;
use App\MaterialKeluar;
use App\DetailMaterialKeluar;
use App\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PDF;


class MaterialKeluarController extends Controller
{
    public function index(Request $request) {

        if ($request->start != null && $request->end!= null && $request->kode !=null){
            $this->validate($request,[
                    'start'=> 'required',
                    'end'=> 'required',
            ]);
            $data = MaterialKeluar::select('sekertaris.*','material_keluar.*','detail_material_keluar.*','material.*','material_keluar.created_at as waktu_entri')
            ->join('detail_material_keluar','detail_material_keluar.material_keluar_id','material_keluar.id_material_keluar')
            ->join('material','material.id_material','detail_material_keluar.material_id')
            ->join('sekertaris','material_keluar.sekertaris_id','sekertaris.id_sekertaris')
            ->whereBetween('material_keluar.created_at', [Carbon::createFromFormat('d-m-Y', $request->start)->startOfDay()->toDateTimeString(), Carbon::createFromFormat('d-m-Y', $request->end)->endOfDay()->toDateTimeString()])
            ->where('material_keluar.kode_transaksi_keluar',$request->kode)
            ->orderBy('material_keluar.created_at', 'desc')
            ->groupBy('detail_material_keluar.material_keluar_id')
            ->get();

        }else  if($request->start != null && $request->end!= null){
            $this->validate($request,[
                    'start'=> 'required',
                    'end'=> 'required',
            ]);

            $data = MaterialKeluar::select('sekertaris.*','material_keluar.*','detail_material_keluar.*','material.*','material_keluar.created_at as waktu_entri')
            ->join('detail_material_keluar','detail_material_keluar.material_keluar_id','material_keluar.id_material_keluar')
            ->join('material','material.id_material','detail_material_keluar.material_id')
            ->join('sekertaris','material_keluar.sekertaris_id','sekertaris.id_sekertaris')
            ->whereBetween('material_keluar.created_at', [Carbon::createFromFormat('d-m-Y', $request->start)->startOfDay()->toDateTimeString(), Carbon::createFromFormat('d-m-Y', $request->end)->endOfDay()->toDateTimeString()])
            ->orderBy('material_keluar.created_at', 'desc')
            ->get();

    }else{
        $data = MaterialKeluar::select('sekertaris.*','material_keluar.*','detail_material_keluar.*','material.*','material_keluar.created_at as waktu_entri')
                ->join('detail_material_keluar','detail_material_keluar.material_keluar_id','material_keluar.id_material_keluar')
                ->join('material','material.id_material','detail_material_keluar.material_id')
                ->join('sekertaris','material_keluar.sekertaris_id','sekertaris.id_sekertaris')
                ->orderBy('material_keluar.created_at', 'desc')
                ->groupBy('detail_material_keluar.material_keluar_id')
                ->get();
    }
        return view('sekertaris.materialkeluar.index',compact('data'));
    }

    public function create() {
        $material = Material::select('material.*', 'kategori.*')
        ->join('kategori', 'material.kategori_id', 'kategori.id_kategori')
        ->get();

        return view('sekertaris.materialkeluar.create',compact('material'));

    }

    //tambah
    public function store(Request $request) {
        $request->validate([
            // 'harga_total' => 'required',
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


        // MaterialKeluar::create([
        $last_id = MaterialKeluar::orderBy('id_material_keluar', 'DESC')->first();
        $get_id = 1;
        if($last_id){
            $get_id = $last_id->id_material_keluar+1;
        }
        $materialKeluar = MaterialKeluar::create([
            // 'harga_total' => $request->harga_total,
            'harga_total' => 0,
            'kode_transaksi_keluar'=>"MK".sprintf('%04s', $get_id),
            'sekertaris_id'=>Auth::guard('sekertaris')->user()->id_sekertaris,


        ]);

        //inisialisasi harga total
        $total=0;

        //perulangan insert detail material
        foreach($request->checklist as $index){
            DetailMaterialKeluar::create([
                'jumlah_material_keluar' => $request->jumlah_material[$index],
                'material_keluar_id' => $materialKeluar->id_material_keluar,
                'material_id' => $request->id[$index],

            ]);


            $material = Material::where('id_material', $request->id[$index])->first();
            $stok=$material->stok_material-$request->jumlah_material[$index];

            $material->update([
                'stok_material' => $stok
            ]);

        //Perhitungan Total Harga
        $total +=$request->jumlah_material[$index]*$request->harga_satuan[$index];
        }

        //Update Material Keluar

        $materialKeluar->update([
            'harga_total'=>$total,
        ]);

        return redirect(route('sekertaris.materialkeluar.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Menambah Material Keluar']);

    }

    //edit-----------------------------------------------------------------------
    public function edit($id) {
        $data = MaterialKeluar::findOrFail($id);

        $material = Material::select('material.*', 'kategori.*')
        ->join('kategori', 'material.kategori_id', 'kategori.id_kategori')
        ->get();

        $detailMaterial = DetailMaterialKeluar::where('material_keluar_id',$id)->get();

        return view('sekertaris.materialkeluar.edit', compact('data','material','detailMaterial'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            // 'harga_total' => 'required',
            'checklist' => 'required',
        ]);

        $data = MaterialKeluar::find($id);
        $total=0;
        foreach($request->checklist as $index) {
            $detailMaterialKeluar = DetailMaterialKeluar::where('material_keluar_id',$data->id_material_keluar)->where('material_id', $request->id[$index])->first();

            $material = Material::where('id_material', $request->id[$index])->first();
            $kembaliKeStokAwal=$material->stok_material-$detailMaterialKeluar->jumlah_material_keluar;
            $stokBaru = $kembaliKeStokAwal+$request->jumlah_material[$index];

            $material->update([
                'stok_material' => $stokBaru
            ]);

            $detailMaterialKeluar->update([
                'jumlah_material_keluar' => $request->jumlah_material[$index]
            ]);

            $total += $request->jumlah_material[$index]*$request->harga_satuan[$index];
        }

        $data->update([
            'harga_total' => $total,
            // 'suplier_id'  => $request->suplier_id,
        ]);


        return redirect(route('sekertaris.materialkeluar.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Mengubah Data Material Keluar']);
    }


//--------------------------------------delete--------------------------------------------------
    public function destroy($id)
    {

        $data = DetailMaterialKeluar::where('material_keluar_id',$id)->get();
        foreach($data as $d)
        {
            $updateMaterial = Material::where('id_material', $d->material_id)->first();

            $updateMaterial->update([
                'stok_material' => $updateMaterial->stok_material+$d->jumlah_material_keluar
            ]);
        }

        DetailMaterialKeluar::where('material_keluar_id',$id)->delete();
        MaterialKeluar::findOrFail($id)->delete();
        return redirect(route('sekertaris.materialkeluar.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Hapus Data Material Keluar']);
    }

//------------------------------------------------cetak---------------------------------------------

    public function cetakMaterialKeluar(Request $request) {
        if ($request->start != null && $request->end!= null && $request->kode !=null){
                $this->validate($request,[
                        'start'=> 'required',
                        'end'=> 'required',
                ]);

                $data = MaterialKeluar::select('sekertaris.*','material_keluar.*','detail_material_keluar.*','material.*','material_keluar.created_at as waktu_entri')
                ->join('detail_material_keluar','detail_material_keluar.material_keluar_id','material_keluar.id_material_keluar')
                ->join('material','material.id_material','detail_material_keluar.material_id')
                ->join('sekertaris','material_keluar.sekertaris_id','sekertaris.id_sekertaris')
                ->whereBetween('material_keluar.created_at', [Carbon::createFromFormat('d-m-Y', $request->start)->startOfDay()->toDateTimeString(), Carbon::createFromFormat('d-m-Y', $request->end)->endOfDay()->toDateTimeString()])
                ->where('material_keluar.kode_transaksi_keluar',$request->kode)
                ->orderBy('material_keluar.created_at', 'desc')
                ->groupBy('detail_material_keluar.material_keluar_id')
                ->get();

            }else  if($request->start != null && $request->end!= null){
                $this->validate($request,[
                        'start'=> 'required',
                        'end'=> 'required',
                ]);

                $data = MaterialKeluar::select('sekertaris.*','material_keluar.*','detail_material_keluar.*','material.*','material_keluar.created_at as waktu_entri')
                ->join('detail_material_keluar','detail_material_keluar.material_keluar_id','material_keluar.id_material_keluar')
                ->join('material','material.id_material','detail_material_keluar.material_id')
                ->join('sekertaris','material_keluar.sekertaris_id','sekertaris.id_sekertaris')
                ->whereBetween('material_keluar.created_at', [Carbon::createFromFormat('d-m-Y', $request->start)->startOfDay()->toDateTimeString(), Carbon::createFromFormat('d-m-Y', $request->end)->endOfDay()->toDateTimeString()])
                ->orderBy('material_keluar.created_at', 'desc')
                ->get();

        }else{
            $data = MaterialKeluar::select('material_keluar.*','detail_material_keluar.*','material.*','material_keluar.created_at as waktu_entri')
                    ->join('detail_material_keluar','detail_material_keluar.material_keluar_id','material_keluar.id_material_keluar')
                    ->join('material','material.id_material','detail_material_keluar.material_id')
                    ->join('kategori','kategori.id_kategori','material.kategori_id')
                    ->orderBy('material_keluar.created_at', 'desc')
                    ->groupBy('detail_material_keluar.material_keluar_id')
                    ->get();
        }



        $pdf = PDF::loadView('sekertaris.materialkeluar.cetak', compact('data'));
        $pdf->setPaper('Folio', 'landscape');
        return $pdf->stream('Laporan Material Keluar.pdf');
         }


}
