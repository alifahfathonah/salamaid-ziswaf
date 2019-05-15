<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Muzzaki;
use App\Model\Siswa;
use App\Model\V_batch_siswa;
use App\Model\Batch_siswa;
class MuzzakiController extends Controller
{
    public function index()
    {
        return view('pages.muzzaki.index');
    }

    public function show($id=-1)
    {
        $muz=array();
        if($id!=-1)
        {
            $muz=Muzzaki::find($id);
        }
        return view('pages.muzzaki.form')
            ->with('det',$muz)
            ->with('id',$id);
    }

    public function data()
    {
        $muz=Muzzaki::where('flag',1)->get();
        return view('pages.muzzaki.data')
            ->with('muz',$muz);
    }

    public function store(Request $request)
    {
        $data=$request->all();
        $create=Muzzaki::create($data);
        
        return response()->json([$create]);
    }
    
    public function update(Request $request,$id)
    {
        $data=$request->all();
        $update=Muzzaki::find($id)->update($data);
        
        return response()->json([$update]);
    }
    public function destroy($id)
    {
        $del=Muzzaki::find($id);
        $del->flag=0;
        $c=$del->save();
        return response()->json([$c]);
    }

    public function siswa_by_kelas($idkelas)
    {
        $siswa=V_batch_siswa::where('id_batch',$idkelas)->orderBy('nama_murid')->get();
        echo '<select class="form-control" name="siswa" id="siswa" data-placeholder="Pilih Siswa">
                <option value="0">Pilih Siswa</option>';
        
        foreach($siswa as $k=>$v)
        {
            echo '<option value="'.$v->id.'--'.$v->nama_murid.'">'.$v->nama_murid.' :: '.$v->nisn.'</option>';
        }
        echo '</select> ';
    }
}
