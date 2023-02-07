@extends('home')

@section('content')
    <div class="container"> 
        <form action="{{route('update', $todoList->id)}}" method="POST">
            @csrf

            <div id="newtask" class="row">
                <div class="col-6">
                    <input type="text" name="content"  placeholder="Add your new Todo" value="{{$todoList->content}}">
                    @if ($errors->has('content'))
                        <span class="text-danger">{{ $errors->first('content') }}</span>
                    @endif
                </div>
                <div class="col-3">
                    <select name="priority_id" class="form-select">
                        @foreach ($priorities as $priority)
                          <option value="{{$priority->id}}" @if($priority->importance==$todoList->priority->importance) selected @endif>{{$priority->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                    <button id="push">Edit</button>
                </div>              
            </div>
        </form>
    </div>

    @stop