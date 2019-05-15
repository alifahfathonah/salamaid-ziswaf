<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Transaksi_penerimaan;
use App\Model\Jenissetoran;
class DashboardController extends Controller
{
    public function index()
    {
        $data3=$d3=$data=$jll=array();
        $trans=Transaksi_penerimaan::all();
        $sis=$muz=0;
        $jlhsis=$jlhmuz=$jlhuang=$jlhberas=0;
        foreach($trans as $k => $v)
        {
            $data[$v->jenis][]=$v->jumlah_setoran;
            if($v->flag==1)
            {
                // $sis++;
                $jlhsis+=$v->jumlah_setoran;
                $jll[$v->penyetor]=$v->penyetor;
            }
            else 
            {
                $muz++;
                $jlhmuz+=$v->jumlah_setoran;
            }
           
            $jlhuang+=$v->jumlah_setoran;     
            $jlhberas+=$v->beras;     
        }
        $sis=count($jll);
        $d2=array(
                'sis'=>array('Siswa','Muzzaki Umum'),
                'jlh'=>array($sis,$muz),
                'jlhzakat'=>array($jlhsis,$jlhmuz)
        );
        $d3=array(
                'jns'=>array('Jumlah Uang (.000)','Jumlah Beras (Kg)'),
                'jlhjns'=>array($jlhuang,$jlhberas)
        );
        $jenis_setoran=Jenissetoran::all();
        $jumlah_total=0;
    
        foreach($jenis_setoran as $k => $v)
        {      
                if(isset($data[$v->jenis]))
                {
                    $data3[$v->jenis]=array_sum($data[$v->jenis]);
                }
                else
                {
                    $data3[$v->jenis]=0;
                }       
        }
        $dd=array(
            'data'=>$data3,
            'title'=>"Jumlah Penerimaan Keseluruhan ",
            'data2'=>$d2
        );
        // dd($d3);
        return view('pages.dashboard.index')
            ->with('data2',$d2)
            ->with('data3',$d3)
            ->with('data',$dd);
    }
}
