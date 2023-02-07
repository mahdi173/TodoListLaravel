@extends('home')

@section('content')

    <div class="container"> 
        <form action="{{route('AddTodoList')}}" method="POST">
            @csrf

            <div id="newtask" class="row">
                <div class="col-6">
                    <input type="text" name="content"  placeholder="Add your new Todo">
                    @if ($errors->has('content'))
                        <span class="text-danger">{{ $errors->first('content') }}</span>
                    @endif
                </div>

                <div class="col-3">
                    <select name="priority_id" class="form-select">
                        @foreach ($priorities as $priority)
                          <option value="{{$priority->id}}">{{$priority->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                    <button id="push">Add</button>
                </div>              
            </div>
        </form>
       
        <div class="pb-3">
            

            @if (count($todoLists))
                <ul class="list-group">
                    @foreach ($todoLists as $todoList)

                        <li class="list-group-item todo-task">
                            <div class="todo-task-content">
                               
                                <span class="todo-task-text">{{$todoList->content}}</span>

                                @php
                                    $priority = $todoList->priority->importance                               
                                @endphp
                               
                                <span class="badge @if ($priority==3) badge-danger @elseif ($priority==2) badge-warning  @else badge-success  @endif">
                                    {{$todoList->priority->name}}
                                </span>

                                <div class="todo-task-btns">
                                    <a href="{{url('edit',['id'=>$todoList->id])}}" class="btn btn-primary">Modifier</a>
                                    <a href="{{url('TodoDelete',['id'=>$todoList->id])}}" class="btn btn-danger">Supprimer</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

@stop