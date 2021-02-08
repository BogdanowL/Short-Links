<?php

namespace App\Http\Controllers;

use App\Models\Links;
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

    public function shortenLink(Request $request, $code)
    {
        $find = Links::where('new_link', $request->root() . '/go/' . $code)->first();
        return redirect($find->old_link);
    }


}
