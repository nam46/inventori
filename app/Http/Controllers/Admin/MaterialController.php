<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Material;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    public function index(){
        $data = Material::select('admin.*','material.*', 'kategori.*')
            ->join('kategori', 'material.kategori_id', 'kategori.id_kategori')
            ->join('admin','material.admin_id','admin.id_admin')
            ->get();

        return view('admin.material.index', compact('data'));

    }
    public function create() {
        $kategori = Kategori::all();
        return view('admin.material.create',compact('kategori'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_material' => 'required|max:100',
            'harga_satuan' => 'required',
            'stok_material' => 'required',
            'kategori_id' => 'required',
        ]);

        Material::create([
            'nama_material' => $request->nama_material,
            'harga_satuan' => $request->harga_satuan,
            'stok_material' => $request->stok_material,
            'kategori_id' => $request->kategori_id,
            'admin_id'=>Auth::guard('admin')->user()->id_admin,
        ]);

        return redirect(route('admin.material.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Menambah Material']);
    }

    public function edit($id) {
        $data = Material::findOrFail($id);
        $kategori = Kategori::get();
        return view('admin.material.edit', compact('data','kategori'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_material' => 'required|max:100',
            'harga_satuan' => 'required',
            'stok_material' => 'required',
            'kategori_id' => 'required',
        ]);

        $data = Material::find($id);
        $data->update([
            'nama_material' => $request->nama_material,
            'harga_satuan' => $request->harga_satuan,
            'stok_material' => $request->stok_material,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect(route('admin.material.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Mengubah Data Material']);
    }

    public function destroy($id)
    {
        Material::findOrFail($id)->delete();

        return redirect(route('admin.material.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Hapus Data Material']);
    }

}
