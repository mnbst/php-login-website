<?php

namespace App\Http\Controllers;

use Hamcrest\Arrays\IsArray;
use Illuminate\Support\Facades\Auth;
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $todo = DB::table('todos')->where([['user_id', '=', Auth::id()], ['completed', '=', false]])->get();
        $done = DB::table('todos')->where([['user_id', '=', Auth::id()], ['completed', '=', true]])->get();

        if (isset($todo)) {
            $t_count = count($todo);
        } else {
            $t_count = 0;
        }
        if (isset($done)) {
            $d_count = count($done);
        } else {
            $d_count = 0;
        }

        return view('home', ['todos' => $todo, 't_count' => $t_count, 'dones' => $done, 'd_count' => $d_count]);
    }
}
