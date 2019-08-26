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
    }
}
