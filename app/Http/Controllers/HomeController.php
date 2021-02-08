<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{



    public function index()
    {

        return view('home');
    }
}
