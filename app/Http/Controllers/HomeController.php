<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * Create a new controller instance.
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     *
     */
    public function gettodo(Request $request)
    {
        $id = $request->session()->get('id');
        $todo = DB::table('todos')->get();
        $done = DB::table('todos')->get();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
