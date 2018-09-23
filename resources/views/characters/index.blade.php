@extends('layouts.app')


@section('content')

    <div class="text-center">
        <h1>キャラ一覧</h1>
    </div>

        @foreach ($characters as $character)
            <div>
                {!! Form::label('name', $character->name) !!}
                {!! link_to_route('characters.show', 'このキャラを編集', ['id' => $character->id], ['class' => 'btn btn-default']) !!}
            </div>
        @endforeach

    {!! link_to_route('characters.create', '新規キャラを作成', ['id' => $character->id], ['class' => 'btn btn-info']) !!}
    
@endsection        