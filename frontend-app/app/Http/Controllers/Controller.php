<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function adminUrl()
    {
        return  "http://127.0.0.1:8081/";
    }

}
