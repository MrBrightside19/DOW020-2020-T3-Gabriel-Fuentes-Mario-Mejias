<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function __construct() {
        $this->middleware('auth')->except('login');
    }

    public function index()
    {
        return view('home.index');
    }

    public function login()
    {
        return view('home.login');
    }

    public function faq()
    {
        return view('faq.index');
    }
}
