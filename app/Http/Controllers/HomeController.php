<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Muzzaki;
use App\Model\Petugas;
use App\User;
use App\Model\Transaksi_penerimaan;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function sync()
    {
        // echo 'Sync';
        $this->sync_muzzaki();
        $this->sync_transaksi();
    }

    public function sync_muzzaki()
    {
        $mz=Muzzaki::all();
        $data=objectToArrayId($mz);
        $muz=$this->getmuzzaki();
        $d=array();
        foreach($muz as $k=>$v)
        {
            if(!isset($data[$k]))
            {
                $sv=new Muzzaki;
                $sv->id	= $v->id;
                $sv->nama	= $v->nama;
                $sv->alamat	= $v->alamat;
                $sv->telp	= $v->telp;
                $sv->email	= $v->email;
                $sv->flag	= $v->flag;
                $sv->created_at	= $v->created_at;
                $sv->updated_at = $v->updated_at;
                $sv->save();
            }
        }
    }
    public function sync_transaksi()
    {
        $tr=Transaksi_penerimaan::all();
        $data=objectToArrayId($tr);
        $trans=$this->gettransaksi();
        // $d=array();
        // return $trans;
        foreach($trans as $k=>$v)
        {
            // echo $k;
            if(!isset($data[$k]))
            {
                // $d=$data[$k];

                $sv=new Transaksi_penerimaan;
                $sv->id=$v->id;
                $sv->tanggal_transaksi=$v->tanggal_transaksi;
                $sv->id_penerima=$v->id_penerima;
                $sv->id_penyetor=$v->id_penyetor;
                $sv->id_jenis_setoran=$v->id_jenis_setoran;
                $sv->jumlah_setoran=$v->jumlah_setoran;
                $sv->no_kwitansi=$v->no_kwitansi;
                $sv->flag=$v->flag;
                $sv->penerima=$v->penerima;
                $sv->penyetor=$v->penyetor;
                $sv->jenis=$v->jenis;
                $sv->keterangan=$v->keterangan;
                $sv->status=$v->status;
                $sv->beras=$v->beras;
                $sv->created_at=$v->created_at;
                $sv->updated_at=$v->updated_at;
                $sv->save();
            }
        }
    }

    public function json_muzzaki()
    {
        $muz=Muzzaki::all();
        $mz=array();
        foreach($muz as $k=>$v)
        {
            $mz[$v->id]=$v;
        }
        return $mz;
    }
    public function json_transaksi()
    {
        $muz=Transaksi_penerimaan::all();
        $mz=array();
        foreach($muz as $k=>$v)
        {
            $mz[$v->id]=$v;
        }
        return $mz;
    }
    public function json_user()
    {
        $muz=User::all();
        $mz=array();
        foreach($muz as $k=>$v)
        {
            $mz[$v->id]=$v;
        }
        return $mz;
    }
    public function json_petugas()
    {
        $muz=Petugas::all();
        $mz=array();
        foreach($muz as $k=>$v)
        {
            $mz[$v->id]=$v;
        }
        return $mz;
    }
}
