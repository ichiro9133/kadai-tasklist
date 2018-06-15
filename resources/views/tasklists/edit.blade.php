@extends('layouts.app')

@section('content')
@if (Auth::id() == $tasklist->user_id)

    <h1>id: {{ $tasklist->id }} のタスクリスト編集ページ</h1>

<div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
    {!! Form::model($tasklist, ['route' => ['tasklists.update', $tasklist->id], 'method' => 'put']) !!}
        <div class="form-group">
            {!! Form::label('status', '状況:') !!}
            {!! Form::text('status',null,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('content', 'タスクリスト:') !!}
            {!! Form::text('content', null, ['class' =>'form-control']) !!}
        </div>
        
        {!! Form::submit('更新',['class'=> 'btn btn-default']) !!}

    {!! Form::close() !!}
    @else
    {!! redirect('/'); !!}
    
    @endif
    </div>
</div>

@endsection

