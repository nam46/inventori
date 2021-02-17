<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LaporanKeluar;
use App\MaterialKeluar;
use App\MaterialMasuk;
use Carbon\Carbon;
use PDF;

class LaporanController extends Controller
{
//--------------------------------------------------Index Masuk-------------------------------------------------------------------------------------

    public function laporanMasuk(Request $request) {
        if ($request->start != null && $request->end!= null && $request->kode!= null){
                $this->validate($request,[
                        'start'=> 'required',
                        'end'=> 'required',
                ]);
                $data = MaterialMasuk::select('sekertaris.*','material_masuk.*','detail_material_masuk.*','suplier.*','material.*','kategori.*','material_masuk.created_at as waktu_entri')
                ->join('detail_material_masuk','detail_material_masuk.material_masuk_id','material_masuk.id_material_masuk')
                ->join('suplier','suplier.id_suplier','material_masuk.suplier_id')
                ->join('material','material.id_material','detail_material_masuk.material_id')
                ->join('kategori','kategori.id_kategori','material.kategori_id')
                ->join('sekertaris','material_masuk.sekertaris_id','sekertaris.id_sekertaris')
                ->whereBetween('material_masuk.created_at', [Carbon::createFromFormat('d-m-Y', $request->start)->startOfDay()->toDateTimeString(), Carbon::createFromFormat('d-m-Y', $request->end)->endOfDay()->toDateTimeString()])
                ->where('material_masuk.kode_transaksi_masuk',$request->kode)
                ->orderBy('material_masuk.created_at', 'desc')
                ->get();

            }else  if($request->start != null && $request->end!= null){
                $this->validate($request,[
                        'start'=> 'required',
                        'end'=> 'required',
                ]);

                $data = MaterialMasuk::select('kategori.*','suplier.*','sekertaris.*','material_masuk.*','detail_material_masuk.*','material.*','material_masuk.created_at as waktu_entri')
                ->join('detail_material_masuk','detail_material_masuk.material_masuk_id','material_masuk.id_material_masuk')
                ->join('material','material.id_material','detail_material_masuk.material_id')
                ->join('sekertaris','material_masuk.sekertaris_id','sekertaris.id_sekertaris')
                ->join('kategori','kategori.id_kategori','material.kategori_id')
                ->join('suplier','material_masuk.suplier_id','suplier.id_suplier')
                ->whereBetween('material_masuk.created_at', [Carbon::createFromFormat('d-m-Y', $request->start)->startOfDay()->toDateTimeString(), Carbon::createFromFormat('d-m-Y', $request->end)->endOfDay()->toDateTimeString()])
                ->orderBy('material_masuk.created_at', 'desc')
                ->get();


        }else{
            $data = MaterialMasuk::select('sekertaris.*','material_masuk.*','detail_material_masuk.*','suplier.*','material.*','kategori.*','material_masuk.created_at as waktu_entri')
                    ->join('detail_material_masuk','detail_material_masuk.material_masuk_id','material_masuk.id_material_masuk')
                    ->join('suplier','suplier.id_suplier','material_masuk.suplier_id')
                    ->join('material','material.id_material','detail_material_masuk.material_id')
                    ->join('kategori','kategori.id_kategori','material.kategori_id')
                    ->join('sekertaris','material_masuk.sekertaris_id','sekertaris.id_sekertaris')
                    ->orderBy('material_masuk.created_at', 'desc')
                    // ->groupBy('detail_material_masuk.material_masuk_id')
                    ->get();
        }

        return view('owner.laporanmasuk.index', compact('data'));

    }
//--------------------------------------------------Cetak Masuk-------------------------------------------------------------------------------------

    public function cetakLaporanMasuk(Request $request) {
        if ($request->start != null && $request->end!= null && $request->kode !=null){
                $this->validate($request,[
                        'start'=> 'required',
                        'end'=> 'required',
                ]);
                $data = MaterialMasuk::select('material_masuk.*','detail_material_masuk.*','suplier.*','material.*','kategori.*','material_masuk.created_at as waktu_entri')
                ->join('detail_material_masuk','detail_material_masuk.material_masuk_id','material_masuk.id_material_masuk')
                ->join('suplier','suplier.id_suplier','material_masuk.suplier_id')
                ->join('material','material.id_material','detail_material_masuk.material_id')
                ->join('kategori','kategori.id_kategori','material.kategori_id')
                ->whereBetween('material_masuk.created_at', [Carbon::createFromFormat('d-m-Y', $request->start)->startOfDay()->toDateTimeString(), Carbon::createFromFormat('d-m-Y', $request->end)->endOfDay()->toDateTimeString()])
                ->where('material_masuk.kode_transaksi_masuk',$request->kode)
                ->orderBy('material_masuk.created_at', 'desc')
                ->get();

            }else  if($request->start != null && $request->end!= null){
                $this->validate($request,[
                        'start'=> 'required',
                        'end'=> 'required',
                ]);

                $data = MaterialMasuk::select('kategori.*','suplier.*','sekertaris.*','material_masuk.*','detail_material_masuk.*','material.*','material_masuk.created_at as waktu_entri')
                ->join('detail_material_masuk','detail_material_masuk.material_masuk_id','material_masuk.id_material_masuk')
                ->join('material','material.id_material','detail_material_masuk.material_id')
                ->join('sekertaris','material_masuk.sekertaris_id','sekertaris.id_sekertaris')
                ->join('suplier','material_masuk.suplier_id','suplier.id_suplier')
                ->join('kategori','kategori.id_kategori','material.kategori_id')
                ->whereBetween('material_masuk.created_at', [Carbon::createFromFormat('d-m-Y', $request->start)->startOfDay()->toDateTimeString(), Carbon::createFromFormat('d-m-Y', $request->end)->endOfDay()->toDateTimeString()])
                ->orderBy('material_masuk.created_at', 'desc')
                ->get();

        }else{
            $data = MaterialMasuk::select('material_masuk.*','detail_material_masuk.*','suplier.*','material.*','kategori.*','material_masuk.created_at as waktu_entri')
                    ->join('detail_material_masuk','detail_material_masuk.material_masuk_id','material_masuk.id_material_masuk')
                    ->join('suplier','suplier.id_suplier','material_masuk.suplier_id')
                    ->join('material','material.id_material','detail_material_masuk.material_id')
                    ->join('kategori','kategori.id_kategori','material.kategori_id')
                    ->orderBy('material_masuk.created_at', 'desc')
                    ->get();
        }

        $pdf = PDF::loadView('owner.laporanmasuk.cetak', compact('data'));
        $pdf->setPaper('Folio', 'landscape');
        return $pdf->stream('Laporan Material Masuk.pdf');
     }

//--------------------------------------------------Index Keluar-------------------------------------------------------------------------------------
    public function laporanKeluar(Request $request) {
        if ($request->start != null && $request->end!= null && $request->kode !=null){
            $this->validate($request,[
                    'start'=> 'required',
                    'end'=> 'required',
            ]);
            $data = MaterialKeluar::select('material_keluar.*','detail_material_keluar.*','material.*','kategori.*','material_keluar.created_at as waktu_entri')
            ->join('detail_material_keluar','detail_material_keluar.material_keluar_id','material_keluar.id_material_keluar')
            ->join('material','material.id_material','detail_material_keluar.material_id')
            ->join('kategori','kategori.id_kategori','material.kategori_id')
            ->whereBetween('material_keluar.created_at', [Carbon::createFromFormat('d-m-Y', $request->start)->startOfDay()->toDateTimeString(), Carbon::createFromFormat('d-m-Y', $request->end)->endOfDay()->toDateTimeString()])
            ->where('material_keluar.kode_transaksi_keluar',$request->kode)
            ->orderBy('material_keluar.created_at', 'desc')
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
        $data = MaterialKeluar::select('material_keluar.*','detail_material_keluar.*','material.*','kategori.*','material_keluar.created_at as waktu_entri')
                ->join('detail_material_keluar','detail_material_keluar.material_keluar_id','material_keluar.id_material_keluar')
                ->join('material','material.id_material','detail_material_keluar.material_id')
                ->join('kategori','kategori.id_kategori','material.kategori_id')
                ->orderBy('material_keluar.created_at', 'desc')
                ->get();
    }

    return view('owner.laporankeluar.index', compact('data'));

}
//--------------------------------------------------Cetak Keluar-------------------------------------------------------------------------------------

public function cetakLaporanKeluar(Request $request) {
    if ($request->start != null && $request->end!= null && $request->kode !=null){
            $this->validate($request,[
                    'start'=> 'required',
                    'end'=> 'required',
            ]);
            $data = MaterialKeluar::select('material_keluar.*','detail_material_keluar.*','material.*','kategori.*','material_keluar.created_at as waktu_entri')
            ->join('detail_material_keluar','detail_material_keluar.material_keluar_id','material_keluar.id_material_keluar')
            ->join('material','material.id_material','detail_material_keluar.material_id')
            ->join('kategori','kategori.id_kategori','material.kategori_id')
            ->whereBetween('material_keluar.created_at', [Carbon::createFromFormat('d-m-Y', $request->start)->startOfDay()->toDateTimeString(), Carbon::createFromFormat('d-m-Y', $request->end)->endOfDay()->toDateTimeString()])
            ->where('material_keluar.kode_transaksi_keluar',$request->kode)
            ->orderBy('material_keluar.created_at', 'desc')
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
        $data = MaterialKeluar::select('material_keluar.*','detail_material_keluar.*','material.*','kategori.*','material_keluar.created_at as waktu_entri')
                ->join('detail_material_keluar','detail_material_keluar.material_keluar_id','material_keluar.id_material_keluar')
                ->join('material','material.id_material','detail_material_keluar.material_id')
                ->join('kategori','kategori.id_kategori','material.kategori_id')
                ->orderBy('material_keluar.created_at', 'desc')
                ->get();
    }



    $pdf = PDF::loadView('owner.laporankeluar.cetak', compact('data'));
    $pdf->setPaper('Folio', 'landscape');
    return $pdf->stream('Laporan Material Keluar.pdf');
     }
}
