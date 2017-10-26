<?php

namespace App\Http\Controllers\Education;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EducationController extends Controller
{
    public function index()
    {
        $educations = DB::table('education')->get();

        return view('education.index', ['educations' => $educations]);
    }
}
