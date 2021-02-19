<?php

namespace App\Http\Controllers;

use App\Models\Links;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LinksController extends Controller
{

    public function index()
    {
        return User::with('links')->find(Auth::user()->id);

    }

    public function shortenLink(Request $request, $code)
    {
        $find = Links::where('new_link', $request->root() . '/go/' . $code)->first();
        return redirect($find->old_link);
    }


}
