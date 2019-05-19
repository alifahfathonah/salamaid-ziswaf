<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\User;
use App\Model\Muzzaki;
use App\Model\Petugas;
use Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function register()
    {
        if(Auth::user()->level==1)
            return view('auth.register');
        else
            return redirect('/');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $us=new User;
        $us->name = $request->name;
        $us->email = $request->email;
        $us->password = bcrypt($request->password);
        $us->level = $request->level;
        $us->save();

        $user=User::where('email',$request->email)->first();
        // Auth::login($user);

        $ptg=new Petugas;
        $ptg->nama = $request->name;
        $ptg->email = $request->email;
        $ptg->password = sha1($request->password);
        $ptg->flag = 1;
        $ptg->hp = '-';
        $ptg->created_at = date('Y-m-d H:i:s');
        $ptg->updated_at = date('Y-m-d H:i:s');
        $ptg->save();

        file_get_contents('http://keuangan.sekolahalambogor.id/json/syncdatauser');

        return redirect('/');
    }

    public function getmuzzaki()
    {
        try
        {
            $url='https://keuangan.sekolahalambogor.id/json/json_t_muzzaki';
            $client = new Client();
            $result = $client->request('GET', $url);
            $data = json_decode($result->getBody()->getContents());
            
            $k=collect($data);
        }
        catch(\Exception $e)
        {
            $k=array();
        }

        // $kontak=array();
        // foreach($k as $i =>$v)
        // {
        //     $kontak[str_slug($v->nama)]=$v->value;
        // }
        return $k;
    }
    public function gettransaksi()
    {
        try
        {
            $url='https://keuangan.sekolahalambogor.id/json/json_t_transaksi';
            $client = new Client();
            $result = $client->request('GET', $url);
            $data = json_decode($result->getBody()->getContents());
            
            $k=collect($data);
        }
        catch(\Exception $e)
        {
            $k=array();
        }

        // $kontak=array();
        // foreach($k as $i =>$v)
        // {
        //     $kontak[str_slug($v->nama)]=$v->value;
        // }
        return $k;
    }

    
}
