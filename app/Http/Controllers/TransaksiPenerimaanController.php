<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Muzzaki;
use App\Model\Siswa;
use App\Model\Batch_kelas;
use App\Model\Jenissetoran;
use App\Model\Batch_siswa;
use App\Model\Transaksi_penerimaan;
use App\Model\V_batch_kelas;
use App\Model\V_batch_siswa;
use Auth;
class TransaksiPenerimaanController extends Controller
{
    public function zakatsiswa()
    {
        $jenis="siswa";
        return view('pages.zis.index')->with('jenis',$jenis);
    }
    public function zakatmuzzaki()
    {
        $jenis="muzzaki";
        return view('pages.zis.index')->with('jenis',$jenis);
    }

    public function data($jenis)
    {
        if($jenis=='siswa')
            $flag=1;
        else
            $flag=2;

        if(date('n')>=7 && date('n')<=12)
        {
            $tahun_ajaran = date('Y').' / '.(date('Y')+1);
        }
        else
        {
            $tahun_ajaran = (date('Y')-1).' / '.(date('Y'));
        }
        $v_b=V_batch_siswa::where('tahun_ajaran','=',$tahun_ajaran)->where('active',1)->where('st_tbk','t')->get();
        $v_batch=array();
        foreach($v_b as $k=>$v)
        {
            $v_batch[$v->id]=$v;
        }
        $trans=Transaksi_penerimaan::where('flag',$flag)->with('siswatrans')->with('muzzaki')->orderBy('tanggal_transaksi')->get();
        return view('pages.zis.data')
                ->with('v_batch',$v_batch)
                ->with('jenis',$jenis)
                ->with('tahun_ajaran',$tahun_ajaran)
                ->with('trans',$trans);
    }

    public function form($jenis,$id)
    {
        if(date('n')>=7 && date('n')<=12)
        {
            $tahun_ajaran = date('Y').' / '.(date('Y')+1);
        }
        else
        {
            $tahun_ajaran = (date('Y')-1).' / '.(date('Y'));
        }
        $kelas=V_batch_kelas::where('tahun_ajaran','=',$tahun_ajaran)->where('st_batch','t')->orderBy('id_level')->get();
        $muz=Muzzaki::where('flag',1)->get();

        if($jenis=='siswa')
        {
            $jenissetoran=Jenissetoran::whereIn('jenis',["Infak/Sedekah","Zakat Fitrah"])->get();
        }
        else
        {
            $jenissetoran=Jenissetoran::where('flag',1)->get();
        }

        return view('pages.zis.form-'.$jenis)
            ->with('kelas',$kelas)
            ->with('muz',$muz)
            ->with('jenissetoran',$jenissetoran)
            ->with('jenis',$jenis)
            ->with('id',$id);       
    }

    public function store(Request $request, $jenis)
    {
        $data=$request->all();
        if($jenis=='siswa')
        {
            list($idsiswa,$namasiswa)=explode('--',$request->siswa);
            list($idjenis,$nmjenis)=explode('--',$request->jenis);
            $tr=new Transaksi_penerimaan;
            $tr->tanggal_transaksi=date('Y-m-d H:i:s');
            $tr->id_penerima=Auth::user()->id;
            $tr->id_penyetor=$idsiswa;
            
            if($request->jumlah!='')
                $tr->jumlah_setoran=str_replace(array(',','.'),'',$request->jumlah);
            else
                $tr->jumlah_setoran=0;

            if($request->beras!='')
                $tr->beras=str_replace(array(',','.'),'',$request->beras);
            else
                $tr->beras=0;

            $tr->no_kwitansi=$request->kwitansi;
            $tr->penyetor=$namasiswa;
            $tr->id_jenis_setoran=$idjenis;
            $tr->jenis=$nmjenis;
            $tr->penerima=Auth::user()->name;
            $tr->flag=1;
            $c=$tr->save();
            return response()->json([$c]);
        }
        elseif($jenis=='muzzaki')
        {
            // dd($data);
            list($idmuz,$muz)=explode('--',$request->muzzaki);
            list($idjenis,$nmjenis)=explode('--',$request->jenis);
            $tr=new Transaksi_penerimaan;
            $tr->tanggal_transaksi=date('Y-m-d H:i:s');
            $tr->id_penerima=Auth::user()->id;
            $tr->id_penyetor=$idmuz;
            if($request->jumlah!='')
                $tr->jumlah_setoran=str_replace(array(',','.'),'',$request->jumlah);
            else
                $tr->jumlah_setoran=0;

            if($request->beras!='')
                $tr->beras=str_replace(array(',','.'),'',$request->beras);
            else
                $tr->beras=0;
            $tr->no_kwitansi=$request->kwitansi;
            $tr->penyetor=$muz;
            $tr->id_jenis_setoran=$idjenis;
            $tr->jenis=$nmjenis;
            $tr->keterangan=$request->keterangan;
            $tr->penerima=Auth::user()->name;
            $tr->flag=2;
            $c=$tr->save();
            return response()->json([$c]);
        }


        // "kwitansi" => "20180523559"
        // "muzzaki" => "5--Widya Wuri Handayani"
        // "jenis" => "4--Infak Program"
        // "jumlah" => "10,000"
        // dd($data);
        // "kelas" => "45"
        // "siswa" => "370--Aisyah Humairah"
        // "jenis" => "2--Zakat Fitrah"
        // "jumlah" => "35,000"
        

    }

    public function cetakkwitansi($nokwitansi,$id)
    {
        
        $batch=array();
        if($id!=-1)
        {
            $batch=V_batch_kelas::where('id_batch',$id)->first();
        }
        $trans=Transaksi_penerimaan::where('no_kwitansi',$nokwitansi)->with('muzzaki')->first();
        return view('pages.zis.print')->with('trans',$trans)
            ->with('kwitansi',$nokwitansi)
            ->with('batch',$batch)
            ->with('id',$id);
    }

    public function destroy($id)
    {
        $tr=Transaksi_penerimaan::find($id)->delete();
        return response()->json(["done"]);
    }
}
