<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request,
    App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PatchTodoController extends Controller
{
    public function AjaxPatch(Request $request)
    {
        /*update:json*/
        try {
            Todo::where([['user_id', '=', Auth::id()], ['title', '=', $request->input('title')], ['text', '=', $request->input('text')], ['completed', '=', false]])->update(['completed' => true]);
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
        }

        $todo = Todo::where([['user_id', '=', Auth::id()], ['completed', '=', false]])->get();
        $done = Todo::where([['user_id', '=', Auth::id()], ['completed', '=', true]])->get();

        $t_count = '<small>' . $todo->count() . ' list items</small>';
        $d_count = '<small>' . $done->count() . ' list items</small>';

        $output = '
        <li ontouchstart="" class="list-group-item">
        <h4 class="list listgroup-item-heading">' . $request->input('title') . '</h4>
        <p class="list-group-item-text">' . $request->input('text') . '</p>
        <div class="buttons">
            <button ontouchstart="" type="button" class="btn btn-danger btn-xs delete-done" title="Delete">
                <i class="fas fa-minus fa-xs" aria-hidden="true"></i>
            </button>
        </div>
        </li>
        ';

        $data = ['done' => $output, 't_count' => $t_count, 'd_count' => $d_count];
        echo json_encode($data);
    }
}
