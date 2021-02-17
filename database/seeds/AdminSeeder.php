<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Owner;
        $user->username="owner";
        $user->nama_owner="owner";
        $user->password=Hash::make("owner");
        $user->save();

        $user = new \App\Admin;
        $user->username="admin";
        $user->nama_admin="Rizal Arianto";
        $user->owner_id= 1;
        $user->password=Hash::make("admin");
        $user->save();

        $user = new \App\Admin;
        $user->username="muslim";
        $user->nama_admin="Muslim";
        $user->owner_id= 1;
        $user->password=Hash::make("admin");
        $user->save();

        $user = new \App\Sekertaris;
        $user->username="sekertaris";
        $user->nama_sekertaris="sekertaris";
        $user->owner_id= 1;
        $user->password=Hash::make("sekertaris");
        $user->save();

//-------------------------------users------------------------------------------------------

        $user = new \App\Kategori;
        $user->nama_kategori="besi";
        $user->admin_id="1";
        $user->save();


        $user = new \App\Kategori;
        $user->nama_kategori="alumunium";
        $user->admin_id="2";
        $user->save();

        $user = new \App\Suplier;
        $user->nama_suplier="UD.MAKMUR";
        $user->admin_id="1";
        $user->save();

        $user = new \App\Suplier;
        $user->nama_suplier="UD.MAKIN JAYA";
        $user->admin_id="2";
        $user->save();

        $user = new \App\Material;
        $user->nama_material="Besi 11x11";
        $user->harga_satuan=100000;
        $user->stok_material=10;
        $user->kategori_id=1;
        $user->admin_id="1";
        $user->save();

        $user = new \App\Material;
        $user->nama_material="Alumunium 2x2";
        $user->harga_satuan=15000;
        $user->stok_material=5;
        $user->kategori_id=2;
        $user->admin_id="2";
        $user->save();

    }
}
