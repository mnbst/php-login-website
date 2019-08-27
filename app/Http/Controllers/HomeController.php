<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

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
    function index()
    {
        return view('home');
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            $t_output = '';
            $d_output = '';
            $keyword = $request->get('query');
            if ($keyword != '') {
                $todo = Todo::where(function ($query) use ($keyword) {
                    $query->orWhere('title', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('text', 'LIKE', '%' . $keyword . '%');
                })->where([['user_id', '=', Auth::id()], ['completed', '=', false]])->get();

                $done = Todo::where(function ($query) use ($keyword) {
                    $query->orWhere('title', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('text', 'LIKE', '%' . $keyword . '%');
                })->where([['user_id', '=', Auth::id()], ['completed', '=', true]])->get();
            } else {
                $todo = Todo::where([['user_id', '=', Auth::id()], ['completed', '=', false]])->get();
                $done = Todo::where([['user_id', '=', Auth::id()], ['completed', '=', true]])->get();
            }
        }

        $t_count = '<small>'.$todo->count().' list items</small>';
        $d_count = '<small>'.$done->count().' list items</small>';

        foreach ($todo as $t) {
            $t_output .= '
            <li ontouchstart="" class="list-group-item text-wrap">
            <h4 class="list listgroup-item-heading">' . $t->title . '</h4>
            <p class="list-group-item-text">' . $t->text . '</p>
            <div class="buttons">
                <button ontouchstart="" type="button" class="btn btn-info btn-xs show-edit-modal" data-toggle="modal" data-target="#edit-modal" title="Edit">
                    <i class="fas fa-edit fa-xs" aria-hidden="true"></i>
                </button>
                <button ontouchstart="" type="button" class="btn btn-danger btn-xs move-done" title="Done">
                    <i class="fas fa-check fa-xs class-change" aria-hidden="true"></i>
                </button>
            </div>
            </li>
            ';
        }

        foreach ($done as $d) {
            $d_output .= '
            <li ontouchstart="" class="list-group-item">
            <h4 class="list listgroup-item-heading">' . $d->title . '</h4>
            <p class="list-group-item-text">' . $d->text . '</p>
            <div class="buttons">
                <button ontouchstart="" type="button" class="btn btn-danger btn-xs delete-done" title="Delete">
                    <i class="fas fa-minus fa-xs" aria-hidden="true"></i>
                </button>
            </div>
            </li>
            ';
        }

        $data = [
            'todo' => $t_output,
            'done' => $d_output,
            't_count' => $t_count,
            'd_count' => $d_count
        ];

        echo json_encode($data);
    }
}
