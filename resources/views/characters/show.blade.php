@extends('layouts.app')


@section('content')

    <div class="text-center">
        <h1>キャラid:{{$character->id}}</h1>
    </div>
    <ul></ul>
        <li>
            <a>name</a>
            <a>{{ $character->name }}</a>
        </li>
        <li>
            <a>前衛or中衛or後衛<a>
            <td>{{ $character->position }}</td>
        </li>

        <li>
            <a>画像<a>
            <td>{{ secure_asset($character->image) }}</td>
        </li>

    </ul>


    {!! link_to_route('characters.edit', 'このキャラを編集', ['id' => $character->id], ['class' => 'btn btn-default']) !!}

@endsection        