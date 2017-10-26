<?php

namespace App\Http\Controllers\Opleiding;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OpleidingController extends Controller
{
    public function index()
    {
        return view('opleiding.index');
    }
}
