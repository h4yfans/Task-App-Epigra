<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function getUsersInfo(){


        $now = Carbon::now();


        dd(        $now->toDateTimeString()
    );

        $users = \App\User::all();

        return view('users')
            ->with(['users' => $users]);
    }
}
