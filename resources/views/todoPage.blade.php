@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="d-flex bd-highlight mb-4">
            <div class="p-2 w-100 bd-highlight">
                <h2>Laravel AJAX Example</h2>
            </div>
            <div class="p-2 flex-shrink-0 bd-highlight">
                <button class="btn btn-success" id="btn-add">
                    Add Todo
                </button>
            </div>
        </div>

        <div>
            <table class="table table-inverse">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody id="todos-list" name="todos-list">
                @foreach ($todo as $data)
                    <tr id="todo{{$data->id}}">
                        <td>{{$data->id}}</td>
                        <td>{{$data->title}}</td>
                        <td>{{$data->description}}</td>
                    </tr>
                @endforeach
                    <tr>
                        <td> Total Number of Item in the database</td>
                        <td colspan="2">{{count($todo)}}</td>
                    </tr>
                </tbody>
            </table>

            @component('layouts.components.modal', [
                'form' => 'true',
                'divId' => 'formModal',
                'formAction' => 'todo.store',
                'formMethod' => 'POST',
                'formId' => 'myForm',
                'formName' => 'myForm',
                'class' => 'form-horizontal',
                'formHeader' => 'multipart/form-data',
                'title' => "Let's Go Todo"

                ])
            @endcomponent

        </div>
    </div>

@endsection
