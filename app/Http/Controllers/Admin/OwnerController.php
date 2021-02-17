<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    public function index() {
        $data = Owner::select('owner.*', 'admin.*')
            ->join('admin', 'owner.admin_id', 'admin.id_admin')
            ->get();

        return view('admin.owner.index', compact('data'));

    }

    public function create() {
        return view('admin.owner.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_owner' => 'required|max:50',
            'username' => 'unique:owner|required|max:25',
            'password' => 'required|min:6',
            'alamat_owner' => 'required',
            'no_telfon_owner' => 'required',
        ]);

        Owner::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama_owner' => $request->nama_owner,
            'alamat_owner' => $request->alamat_owner,
            'no_telfon_owner' => $request->no_telfon_owner,
        ]);

        return redirect(route('admin.owner.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Menambah Owner']);
    }

    public function edit($id) {
        $data = Owner::findOrFail($id);
        return view('admin.owner.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_owner' => 'required|max:50',
            'username' => 'required|max:25',
            'alamat_owner' => 'required',
            'no_telfon_owner' => 'required',
        ]);

        $data = Owner::find($id);
        $data->update([
            'username' => $request->username,
            'nama_owner' => $request->nama_owner,
            'alamat_owner' => $request->alamat_owner,
            'no_telfon_owner' => $request->no_telfon_owner,
        ]);

        if(!empty($request->password)){
            $request->validate([
                'password'  => 'required|min:6'
            ]);
            $data->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect(route('admin.owner.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Mengubah Data Owner']);
    }

    public function destroy($id)
    {
        Owner::findOrFail($id)->delete();

        return redirect(route('admin.owner.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Hapus Data Owner']);
    }
}
