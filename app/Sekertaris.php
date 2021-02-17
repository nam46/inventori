<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Sekertaris extends User
{
    protected $table = 'sekertaris';
    protected $primaryKey = 'id_sekertaris';
    protected $guarded =[];
}
