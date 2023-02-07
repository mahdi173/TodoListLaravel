<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TodoListController extends Controller
{
   
    public function index()
    {
        $todoLists= TodoList::all();
        $priorities= Priority::all();
        return view('TodoList/index', compact('todoLists','priorities'));
    }

    public function store(Request $request)
    {
        $data= $request->validate(
            [
                'content'=> 'required|string',
                'priority_id'=> 'required'
            ], 
            [
                'content.required' => 'Content is required'
            ]
        );

        TodoList::create($data);
        return Redirect::route('TodoList');
    }

    public function edit($id)
    {
        $todoList= TodoList::find($id);
        $priorities= Priority::all();
        return view('TodoList/edit', compact('todoList','priorities'));
    }

    public function update(Request $request, $id)
    {
        $todoList= TodoList::find($id); 

        $request->validate(
            [
                'content'=> 'required|string',
                'priority_id'=> 'required'
            ], 
            [
                'content.required' => 'Content is required'
            ]
        );

        $todoList->update($request->all());
        return Redirect::route('TodoList');
    }

    public function destroy($id)
    {
        $todoList= TodoList::find($id);
        $todoList->delete();
        return Redirect::route('TodoList');
    }
}
