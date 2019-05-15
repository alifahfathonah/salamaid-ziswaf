<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Muzzaki extends Model
{
    protected $table = 'muzzaki';
    protected $fillable = ['nama','alamat','telp','email','flag','created_at'];

}

