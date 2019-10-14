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

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {
        //dd(request()->all());

        //validate
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        $data = request()->all();

        //create a new todo
        $todo = new Todo();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        //save to db
        $todo->save();

        return redirect('/todos');

    }

}
