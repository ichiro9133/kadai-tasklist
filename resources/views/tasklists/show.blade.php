@extends('layouts.app')

@section('content')

    <h1>id = {{$tasklist->id}}</h1>
    <p>{{$tasklist->content}}</p>
    
<!-- Write content for each page here -->

    {!! link_to_route('tasklists.edit', 'このタスクリストを編集', ['id' => $tasklist->id]) !!}

    {!! Form::model($tasklist, ['route' => ['tasklists.destroy', $tasklist->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除') !!}
    {!! Form::close() !!}


@endsection