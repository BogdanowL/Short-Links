<?php

namespace App\Http\Controllers\API;

use App\Facades\HelpService;
use App\Facades\LinkService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLink;
use App\Http\Requests\UpdateLinkRequest;



class ShortLinkController extends Controller
{

    public function store(StoreLink $request)
    {
        $data = HelpService::getDataArray($request->validated());
        LinkService::createLink($data);
    }

    public function update(UpdateLinkRequest $request, $id)
    {
        LinkService::updateLink($request->validated(), $id);
    }


    public function destroy($id)
    {
        LinkService::deleteLink($id);
    }
}
