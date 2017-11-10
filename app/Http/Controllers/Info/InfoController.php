<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    public function index()
    {
        return view('info.index');
    }
}
