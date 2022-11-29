<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function backdoor()
    {
        return view('templates/main');
    }
}
