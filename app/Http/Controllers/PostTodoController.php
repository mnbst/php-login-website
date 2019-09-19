<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request,
    App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostTodoController extends Controller
{
    public function AjaxPost(Request $request)
    {
        /* post:json */


        $request->validate([
            'title'=>['required','string', 'max:255'],
            'text'=>'nullable'
        ]);

        $todo = new Todo;
        if (Auth::check()) {
            try {
                $todo->user_id = Auth::id();
                $todo->title = $request->input('title');
                $todo->text = $request->input('text');
                $todo->save();
            } catch (\Exception $e) {
                \Log::info($e->getMessage());
            }
        }
        $output='<li ontouchstart="" class="list-group-item text-wrap">
        <h4 class="list listgroup-item-heading">' . $todo->title . '</h4>
        <p class="list-group-item-text">' . $todo->text . '</p>
        <div class="buttons">
            <button ontouchstart="" type="button" class="btn btn-info btn-xs show-edit-modal" data-toggle="modal" data-target="#edit-modal" title="Edit">
                <i class="fas fa-edit fa-xs" aria-hidden="true"></i>
            </button>
            <button ontouchstart="" type="button" class="btn btn-danger btn-xs move-done" title="Done">
                <i class="fas fa-check fa-xs class-change" aria-hidden="true"></i>
            </button>
        </div>
        </li>';

        $todo = Todo::where([['user_id', '=', Auth::id()], ['completed', '=', false]])->get();
        $t_count = '<small>'.$todo->count().' list items</small>';

        $data=['new_todo'=>$output,'count'=>$t_count];
        echo json_encode($data);
    }
}
