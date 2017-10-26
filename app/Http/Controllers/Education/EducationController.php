<?php

namespace App\Http\Controllers\Education;

use App\Education;
use App\Http\Controllers\Controller;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::all();

        return view('education.index', ['educations' => $educations]);
    }
}
