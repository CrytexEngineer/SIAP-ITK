<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiksatController extends Controller
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
     * @return \Illuminate\Contracts\Support\\Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
