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
<<<<<<< HEAD
        return User::with('links')->find(Auth::user()->id);

=======
        $user = User::with('links')->find(Auth::user()->id);
        return json_encode($user);
>>>>>>> 03be0f083c4495686deb16b0d3e6a1f149d1beaf
    }

    public function shortenLink(Request $request, $code)
    {
        $find = Links::where('new_link', $request->root() . '/go/' . $code)->first();
        return redirect($find->old_link);
    }


}
