<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request,
    App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DeleteTodoController extends Controller
{
    public function AjaxDelete(Request $request)
    {
        /*delete:json*/
        try {
            $data = Todo::where([['user_id', '=', Auth::id()], ['title', '=', $request->input('title')], ['text', '=', $request->input('text')], ['completed', '=', true]])->first();
            $data->delete();
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
        }
    }
}
