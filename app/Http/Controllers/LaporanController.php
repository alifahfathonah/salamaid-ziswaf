<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Jenissetoran;
use App\Model\Transaksi_penerimaan;
use App\Model\V_batch_kelas;
use App\Model\V_batch_siswa;
class LaporanController extends Controller
{
    public function index()
    {
        return view('pages.laporan.index');
    }

    function data($tanggal=-1)
    {
        if($tanggal==-1)
            $tanggal=date('d-m-Y');

        list($tgl,$bln,$thn)=explode('-',$tanggal);
        $date=$thn.'-'.$bln.'-'.$tgl;
        $data3=array();
        $trans=Transaksi_penerimaan::where('tanggal_transaksi','like','%'.$date.'%')->get();
        foreach($trans as $k => $v)
        {
                 $data[$v->jenis][strtok($v->tanggal_transaksi,' ')][]=$v->jumlah_setoran;
            
        }
        $jenis_setoran=Jenissetoran::all();
        $jumlah_total=0;
        foreach($jenis_setoran as $k => $v)
        {
            
                if(isset($data[$v->jenis]))
                {
                    foreach($data[$v->jenis] as $kk => $vv)
                    {
                        $data3[$v->jenis]=array_sum($vv);
                    }
                }
                else
                {
                    $data3[$v->jenis]=0;
                }
           

        }

            
            //echo json_encode($data3);
            $tgll=$tgl.' '.getBulan($bln).' '.$thn;
            // echo $tgll;
            $dd=array(
                    'data'=>$data3,
                    'title'=>"Jumlah Penerimaan Tanggal : ".$tgll
                );
            
            //$this->load->view('v_grafik',$dd);
            return view('pages.laporan.grafik')->with('data',$dd);
        
    }
    public function perkelas()
    {
        return view('pages.laporan.per-kelas');
    }
    public function perkelas_data($tgl=-1)
    {
        if($tgl==-1)
            $date=date('Y-m-d');
        else
            $date=date('Y-m-d',strtotime($tgl));

        $getta=gettahunajaranbybulan(date('n'),date('Y'));

        $v_batchPkelas=V_batch_kelas::where('status_tampil','t')->where('st_batch','t')->get();
        $vbk=array();
        foreach($v_batchPkelas as $k => $v)
        {
            $vbk[$v->tahun_ajaran][$v->id_batch]=$v;
        }

        $v_batch_siswa=V_batch_siswa::where('active',1)->where('st_tbk','t')->get();
        $vbs=array();
        foreach($v_batch_siswa as $k => $v)
        {
            $vbs[$v->tahun_ajaran][$v->id]=$v;
        }

        if($tgl==-1)
            $trans=Transaksi_penerimaan::all();
        else
            $trans=Transaksi_penerimaan::where('tanggal_transaksi','like','%'.$date.'%')->get();
        
        $tr=$kelas=array();

        foreach($trans as $tr => $vv)
        {
            $bl=date('n',strtotime($vv->tanggal_transaksi));
            $th=date('Y',strtotime($vv->tanggal_transaksi));

            $getta=gettahunajaranbybulan($bl,$th);

            if($vv->flag==1)
            {
                if(isset($vbs[$getta][$vv->id_penyetor]))
                {
                    $ss=$vbs[$getta][$vv->id_penyetor];
                    if(isset($vbk[$getta][$ss->id_batch]))
                    {
                        $vb=$vbk[$getta][$ss->id_batch];
                        // $kelas[$vb->kategori][$vb->nama_level][$vb->nama_batch][$vv->id_penyetor]=$vv;
                        $kelas[$vb->kategori][$vb->nama_level][$vv->penyetor]=$vv;
                    }
                }
            }
        }
        return view('pages.laporan.perkelas-data')
            ->with('kelas',$kelas)
            ->with('ta',$getta)
            ->with('siswa',$vbs);
    }
}
