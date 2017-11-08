<?php

namespace App\Http\Controllers\Info;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    /**
     * Display info of the application
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('info.index');
    }
}
