<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{



    public function index()
    {
//        $user = User::with('links')->find(1);
//        dd($user);


        return view('home');
    }
}
