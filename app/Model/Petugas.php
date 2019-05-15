<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';
    protected $fillable = ['nama','email','password','flag','hp'];
}

