<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jenissetoran extends Model
{
    protected $table = 'jenis_setoran';
    protected $fillable = ['jenis','kategori','flag'];
}
