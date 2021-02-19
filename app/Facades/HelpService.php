<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class HelpService extends Facade
{

        protected static function getFacadeAccessor()
        {
           return 'helpService';
        }

}
