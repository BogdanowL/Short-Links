<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Links;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{

    public function index()
    {

    }


    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ],[
            'link.required' => 'Укажите ссылку которую хотите сократить',
            'link.url' => 'Ссылка должны быть в формате URL'
            ]);

        Links::create([
            'user_id' => $request->user_id,
            'old_link' => $request->link,
            'new_link' => request()->root() . '/go/' . Str::random(8)
        ]);

    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'oldLink' => 'required|url',
            'newLink' => 'required|url'
        ],[
            'oldLink.required' => 'Укажите ссылку которую хотите сократить',
            'oldLink.url' => 'Ссылка должны быть в формате URL',
            'newLink.required' => 'Укажите ссылку которую хотите сократить',
            'newLink.url' => 'Ссылка должны быть в формате URL'
        ]);


        $link = Links::find($id);
        $link->update([
            'old_link' => $request->get('oldLink'),
            'new_link' => $request->get('newLink')
        ]);
    }


    public function destroy($id)
    {
        Links::find($id)->delete();
    }
}
