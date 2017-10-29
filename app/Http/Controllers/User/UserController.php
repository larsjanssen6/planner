<?php

namespace App\Http\Controllers\User;

use App\Domain\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = DB::table('users')->orderBy('name', 'ASC')->paginate(10);

        return view('user.index')->with(['users' => $users]);
    }
}
