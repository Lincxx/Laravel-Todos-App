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

    public function show(Todo $todo)
    {
        //dd() is the same as die(var_dump())
        //dd($todoId);
        //$todo = Todo::find($todoId);

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
            'name' => 'required|min:6|max:12',
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

        session()->flash('success', 'Todo created successfully');

        return redirect('/todos');

    }

    public function edit(Todo $todo)
    {
        //dd($todoId);

        //$todo = Todo::find($todoId);

        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Todo $todo)
    {
         //validate
         $this->validate(request(), [
            'name' => 'required|min:6|max:12',
            'description' => 'required'
        ]);

        $data = request()->all();


        //$todo = Todo::find($todoId);

        $todo->name = $data['name'];
        $todo->description = $data['description'];

        //Save to db
        $todo->save();

        session()->flash('success', 'Todo updated successfully');

        return redirect('/todos');

    }

    public function destroy(Todo $todo)
    {
        //$todo = Todo::find($todoId);

        $todo->delete();

        session()->flash('success', 'Todo deleted successfully');

        return redirect('/todos');
    }

    public function complete(Todo $todo)
    {
        $data = request()->all();

        $todo->completed = true;

        //Save to db
        $todo->save();

        session()->flash('success', 'Todo completed successfully');

        return redirect('/todos');
    }
}
