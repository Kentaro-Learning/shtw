@extends('layouts.app')


@section('content')

    <div class="text-center">
        <h1>キャラ一覧</h1>
    </div>

        @foreach ($characters as $character)
            {{Form::radio('character', $character->id)}}
            {!! Form::label('name', $character->name) !!}
            {!! link_to_route('characters.show', '選択したキャラを編集', ['id' => $character->id], ['class' => 'btn btn-default']) !!}
        @endforeach

@endsection        