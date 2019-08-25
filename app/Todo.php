<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded=[];
    //Table Name
    protected $table = 'todos';

    public $primarykey = 'id';

    public $timestamp = true;
}
