<?php

namespace App\Http\Controllers\API;

use App\Facades\HelpService;
use App\Facades\LinkService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLink;
use App\Http\Requests\UpdateLinkRequest;

<<<<<<< HEAD
=======
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
            'new_link' => $request->root() . '/go/' . Str::random(8)
        ]);
>>>>>>> 03be0f083c4495686deb16b0d3e6a1f149d1beaf


class ShortLinkController extends Controller
{

    public function store(StoreLink $request)
    {
        $data = HelpService::getDataArray($request->validated());
        LinkService::createLink($data);
    }

    public function update(UpdateLinkRequest $request, $id)
    {
<<<<<<< HEAD
        LinkService::updateLink($request->validated(), $id);
=======
        $request->validate([
            'oldLink' => 'required|url',
            'newLink' => 'required'
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
>>>>>>> 03be0f083c4495686deb16b0d3e6a1f149d1beaf
    }


    public function destroy($id)
    {
        LinkService::deleteLink($id);
    }
}
