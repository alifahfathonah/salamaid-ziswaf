<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 't_siswa';

    function siswa(){
		return $this->hasMany('App\Model\Batch_siswa','id_siswa');
	}
    function siswatrans(){
		return $this->hasMany('App\Model\Transaksi_penerimaan','id_penyetor');
	}
}

