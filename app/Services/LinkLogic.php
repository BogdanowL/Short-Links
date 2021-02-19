<?php


namespace App\Services;


use App\Facades\HelpService;
use App\Models\Links;
use App\Models\User;
use Illuminate\Support\Str;

class LinkLogic
{




    public function createLink($data)
    {
        Links::create([
            'user_id' =>  $data['user_id'],
            'old_link' => $data['link'],
            'new_link' => $data['root'] . '/go/' . Str::random(8)
        ]);
    }


    public function updateLink($data, $id)
    {
        $link = Links::find($id);
        $link->update([
            'old_link' => $data['oldLink'],
            'new_link' =>$data['newLink']
        ]);
    }

    public function deleteLink($id)
    {
        Links::find($id)->delete();
    }

    public function getUserWithLinks()
    {
        return  User::with('links')->latest()->paginate(5);
    }




}
