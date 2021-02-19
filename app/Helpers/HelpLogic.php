<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Auth;

class HelpLogic
{
    public function getDataArray($data)
    {
        $data = [
            'root' => request()->root(),
            'link' => $data['link'],
            'user_id' => Auth::user()->id
          ];
        return $data;
    }







}
