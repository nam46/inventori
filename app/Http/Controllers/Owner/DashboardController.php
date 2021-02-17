<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Material;
use App\DetailMaterialMasuk;
use App\DetailMaterialKeluar;
use App\MaterialMasuk;
use App\MaterialKeluar;

class DashboardController extends Controller
{
    public function index() {

    $material = Material::sum('stok_material');
    $detailMaterialMasuk = DetailMaterialMasuk::sum('jumlah_material_masuk');
    $detailMaterialKeluar = DetailMaterialKeluar::sum('jumlah_material_keluar');
    $materialMasuk = MaterialMasuk::sum('harga_total');
    $materialKeluar = Materialkeluar::sum('harga_total');

    $total=$materialMasuk+$materialKeluar;

    return view('owner.dashboard',compact('material','detailMaterialMasuk','detailMaterialKeluar','total'));
    }
}
