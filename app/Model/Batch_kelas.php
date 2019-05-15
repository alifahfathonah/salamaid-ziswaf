<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Batch_kelas extends Model
{
    protected $table = 't_batch_kelas';

    function kelas(){
		return $this->hasMany('App\Model\Batch_siswa','id_batch');
	}
}

