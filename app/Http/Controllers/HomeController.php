<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;


use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = new User();
                    $users = $users->orderBy('id', 'desc')
                        ->paginate(10);
        return view('home', ['users' => $users]);
    }



    
}
