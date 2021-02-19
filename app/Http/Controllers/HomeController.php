<?php

namespace App\Http\Controllers;


use App\Facades\HelpService;
use App\Facades\LinkService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{



    public function index()
    {

        return view('home');
    }
}
