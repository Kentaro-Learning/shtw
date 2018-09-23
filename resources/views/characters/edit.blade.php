@extends('layouts.app')


@section('content')

    <div class="text-center">
        <h1>キャラ編集</h1>
    </div>
    

    <div class="row">
        <div class="col-xs-6">
            {!! Form::model($character, ['route' => ['characters.update', $character->id], 'method' => 'put', 'files' => true]) !!}

                <div class="form-group">
                    {!! Form::label('name', 'キャラ名:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('position', '位置:') !!}
                    {{ Form::select('position', ['' => '位置', '1' => '前衛', '2' => '中衛', '3' => '後衛'], null, ['class' => 'form', 'id' => 'position']) }}
                </div>
                <div class="form-group">
                    {!! Form::label('order', '前から:') !!}
                    {!! Form::number('order', null) !!}
                    {!! Form::label('order', '番目') !!}
                </div>

                <div class="form-group">
                    <img class="thumbnail" src="{{ secure_asset($character->image) }}">
                    {!! Form::label('image', 'Upload a file') !!}
                    {!! Form::file('image', null) !!}
                </div>

                {!! Form::submit('編集', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>


@endsection        