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
    }
}
