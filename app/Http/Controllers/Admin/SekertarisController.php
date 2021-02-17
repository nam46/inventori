<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Sekertaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SekertarisController extends Controller
{
    public function index() {
        $data = Sekertaris::select('sekertaris.*', 'admin.*')
        ->join('admin', 'sekertaris.admin_id', 'admin.id_admin')
        ->get();
        return view('admin.sekertaris.index', compact('data'));

    }

    public function create() {
        return view('admin.sekertaris.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_sekertaris' => 'required|max:50',
            'username' => 'unique:sekertaris|required|max:25',
            'password' => 'required|min:6',
            'alamat_sekertaris' => 'required',
            'no_telfon_sekertaris' => 'required',
        ]);

        Sekertaris::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama_sekertaris' => $request->nama_sekertaris,
            'alamat_sekertaris' => $request->alamat_sekertaris,
            'no_telfon_sekertaris' => $request->no_telfon_sekertaris,
            'admin_id'=>Auth::guard('admin')->user()->id_admin,
        ]);

        return redirect(route('admin.sekertaris.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Menambah Sekertaris']);
    }

    public function edit($id) {
        $data = Sekertaris::findOrFail($id);
        return view('admin.sekertaris.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_sekertaris' => 'required|max:50',
            'username' => 'required|max:25',
            'alamat_sekertaris' => 'required',
            'no_telfon_sekertaris' => 'required',
        ]);

        $data = Sekertaris::find($id);
        $data->update([
            'username' => $request->username,
            'nama_sekertaris' => $request->nama_sekertaris,
            'alamat_sekertaris' => $request->alamat_sekertaris,
            'no_telfon_sekertaris' => $request->no_telfon_sekertaris,
        ]);

        if(!empty($request->password)){
            $request->validate([
                'password'  => 'required|min:6'
            ]);
            $data->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect(route('admin.sekertaris.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Mengubah Data Sekertaris']);
    }

    public function destroy($id)
    {
        Sekertaris::findOrFail($id)->delete();

        return redirect(route('admin.sekertaris.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Hapus Data Sekertaris']);
    }
}
