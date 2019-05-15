<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Batch_siswa extends Model
{
    protected $table = 't_batch_siswa';

    function comment(){
		return $this->belongsTo('App\Model\Batch_kelas','id_batch');
    }
    
    function siswa(){
		return $this->belongsTo('App\Model\Siswa','id_siswa');
    }
}

