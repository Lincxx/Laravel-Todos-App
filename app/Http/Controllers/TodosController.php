<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    public function index()
    {
        //fetch all todos from database
        //display them in the todos.index page

        // $todos = Todo::all();

        // return view('todos.index')->with('todos', $todos);

        //can shrink the above to this
        return view('todos.index')->with('todos', Todo::all());
    }

    public function show($todoId)
    {
        //dd() is the same as die(var_dump())
        //dd($todoId);
        $todo = Todo::find($todoId);

        return view('todos.show')->with('todo', $todo);
    }
}
