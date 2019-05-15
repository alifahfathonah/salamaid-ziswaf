<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\User;
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
        Auth::login($user);
        return redirect('/');
    }
}
