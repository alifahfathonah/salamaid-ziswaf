<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaksi_penerimaan extends Model
{
    protected $table = 'transaksi_penerimaan';
    protected $fillable = ['tanggal_transaksi','id_penerima','id_penyetor','id_jenis_setoran','jumlah_setoran','no_kwitansi','flag','penerima','penyetor','jenis','status'];

    function muzzaki()
    {
        return $this->belongsTo('App\Model\Muzzaki','id_penyetor');
    }
    function siswatrans()
    {
        return $this->belongsTo('App\Model\Siswa','id_penyetor');
    }
    function jenis()
    {
        return $this->belongTo('App\Model\Jenissetoran','jenis');
    }
}

