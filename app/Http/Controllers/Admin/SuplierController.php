<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Suplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SuplierController extends Controller
{
    public function index() {
        $data = Suplier::select('suplier.*', 'admin.*')
        ->join('admin', 'suplier.admin_id', 'admin.id_admin')
        ->get();
        return view('admin.suplier.index', compact('data'));

    }
    public function create() {
        return view('admin.suplier.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_suplier' => 'required|max:50',
        ]);

        Suplier::create([
            'nama_suplier' => $request->nama_suplier,
            'admin_id'=>Auth::guard('admin')->user()->id_admin,
        ]);

        return redirect(route('admin.suplier.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Menambah Suplier']);
    }

    public function edit($id) {
        $data = Suplier::findOrFail($id);
        return view('admin.suplier.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_suplier' => 'required|max:50',
        ]);

        $data = Suplier::find($id);
        $data->update([
            'nama_suplier' => $request->nama_suplier,
        ]);

        return redirect(route('admin.suplier.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Mengubah Data Suplier']);
    }

    public function destroy($id)
    {
        Suplier::findOrFail($id)->delete();

        return redirect(route('admin.suplier.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Hapus Data Suplier']);
    }

}
