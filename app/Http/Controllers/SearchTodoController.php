<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Illuminate\Support\Facades\Auth;

class SearchTodoController extends Controller
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
    public function action(Request $request)
    {
        if ($request->ajax()) {
            $keyword = $request->input('keyword');
            if ($keyword != '') {

                $todo = Todo::where(function ($query) use ($keyword) {
                    $query->orWhere('title', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('text', 'LIKE', '%' . $keyword . '%');
                })->where([['user_id', '=', Auth::id()], ['completed', '=', false]])->get();

                $done = Todo::where(function ($query) use ($keyword) {
                    $query->orWhere('title', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('text', 'LIKE', '%' . $keyword . '%');
                })->where([['user_id', '=', Auth::id()], ['completed', '=', true]])->get();

                $t_count=$todo->count();
                $d_count=$done->count();
            }
        }

        $data=['todos' => $todo, 't_count' => $t_count, 'dones' => $done, 'd_count' => $d_count];
        echo json_encode($data);
    }
}
