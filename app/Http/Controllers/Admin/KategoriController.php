<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function index() {
        $data = Kategori::select('kategori.*', 'admin.*')
        ->join('admin', 'kategori.admin_id', 'admin.id_admin')
        ->get();
        return view('admin.kategori.index', compact('data'));

    }

    public function create() {
        return view('admin.kategori.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_kategori' => 'required|max:50',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'admin_id'=>Auth::guard('admin')->user()->id_admin,
        ]);

        return redirect(route('admin.kategori.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Menambah Kategori']);
    }

    public function edit($id) {
        $data = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_kategori' => 'required|max:50',
        ]);

        $data = Kategori::find($id);
        $data->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect(route('admin.kategori.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Mengubah Data Kategori']);
    }

    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();

        return redirect(route('admin.kategori.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Hapus Data Kategori']);
    }
}
