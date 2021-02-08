<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class LinksController extends Controller
{

    public function index()
    {

        $user = User::with('links')->find(Auth::user()->id);
        return json_encode($user);

    }



}