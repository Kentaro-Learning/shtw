@extends('layouts.app')


@section('content')

    <div class="text-center">
        <h1>環境一覧</h1>
    </div>

        @foreach ($environments as $environment)
            {{Form::radio('environment', $environment->id)}}
            {!! Form::label('name', $environment->date) !!}
            {!! link_to_route('environments.show', '選択した環境を編集', ['id' => $environment->id], ['class' => 'btn btn-default']) !!}
        @endforeach
    
    <div>
        <p>新しい環境 {!! link_to_route('environments.create', '作成画面に移行') !!}</p>
    </div>    

@endsection        