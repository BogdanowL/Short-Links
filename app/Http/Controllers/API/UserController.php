<?php

namespace App\Http\Controllers\API;

use App\Facades\LinkService;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        LinkService::getUserWithLinks();
    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
