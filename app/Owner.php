<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Owner extends User
{
    protected $table = 'owner';
    protected $primaryKey = 'id_owner';
    protected $guarded =[];
}
