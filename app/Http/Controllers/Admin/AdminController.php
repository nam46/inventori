<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        $data = Admin::get();
        return view('admin.admin.index', compact('data'));
    }

    public function create() {
        return view('admin.admin.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_admin' => 'required|max:50',
            'username' => 'unique:admin|required|max:25',
            'password' => 'required|min:6',
            'alamat_admin' => 'required',
            'no_telfon_admin' => 'required',
        ]);

        Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama_admin' => $request->nama_admin,
            'alamat_admin' => $request->alamat_admin,
            'no_telfon_admin' => $request->no_telfon_admin,
        ]);

        return redirect(route('admin.admin.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Menambah Admin']);
    }

    public function edit($id) {
        $data = Admin::findOrFail($id);
        return view('admin.admin.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_admin' => 'required|max:50',
            'username' => 'required|max:25',
            'alamat_admin' => 'required',
            'no_telfon_admin' => 'required',
        ]);

        $data = Admin::find($id);
        $data->update([
            'username' => $request->username,
            'nama_admin' => $request->nama_admin,
            'alamat_admin' => $request->alamat_admin,
            'no_telfon_admin' => $request->no_telfon_admin,
        ]);

        if(!empty($request->password)){
            $request->validate([
                'password'  => 'required|min:6'
            ]);
            $data->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect(route('admin.admin.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Mengubah Data Admin']);
    }

    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();

        return redirect(route('admin.admin.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Hapus Data Admin']);
    }

}
