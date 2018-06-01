@extends('layouts.app')

@section('content')
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $tasklist->id }}</td>
        </tr>
        <tr>
            <th>状況</th>
            <td>{{ $tasklist->status }}</td>
        </tr>
        <tr>
            <th>タスク</th>
            <td>{{ $tasklist->content }}</td>
        </tr>
    </table>

    
    
<!-- Write content for each page here -->

    {!! link_to_route('tasklists.edit', 'このタスクリストを編集', ['id' => $tasklist->id],['class'=>'btn btn-default']) !!}

    {!! Form::model($tasklist, ['route' => ['tasklists.destroy', $tasklist->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除',['class' =>'btn btn-danger']) !!}
    {!! Form::close() !!}


@endsection