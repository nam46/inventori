<?php

namespace App\Http\Controllers\Owner;
use App\Http\Controllers\Controller;
use App\Sekertaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SekertarisController extends Controller
{
    public function index() {
        $data = Sekertaris::select('sekertaris.*', 'owner.nama_owner')
        ->join('owner', 'sekertaris.owner_id', 'owner.id_owner')
        ->get();
        return view('owner.sekertaris.index', compact('data'));

    }

    public function create() {
        return view('owner.sekertaris.create');
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
            'owner_id'=>Auth::guard('owner')->user()->id_owner,
        ]);

        return redirect(route('owner.sekertaris.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Menambah Sekertaris']);
    }

    public function edit($id) {
        $data = Sekertaris::findOrFail($id);
        return view('owner.sekertaris.edit', compact('data'));
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

        return redirect(route('owner.sekertaris.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Mengubah Data Sekertaris']);
    }

    public function destroy($id)
    {
        Sekertaris::findOrFail($id)->delete();

        return redirect(route('owner.sekertaris.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Hapus Data Sekertaris']);
    }
}
