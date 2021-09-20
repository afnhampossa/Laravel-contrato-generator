<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $id = Auth::user()->id;
        $user=User::find($id);

        return view('main')->with([ 'user'=>$user, 'msg' => '']);
    }

}
