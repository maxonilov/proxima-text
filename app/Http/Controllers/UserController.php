<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
       return view('users.index',  [
           'users'  => User::query()->orderBy('followers','desc')->paginate(10)
       ]);
    }
}
