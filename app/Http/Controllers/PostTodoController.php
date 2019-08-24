<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
    App\Http\Controllers\Controller;

class PostTodoController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->session()->get('id');
        print_r($id);
        print_r('success');
    }
}
