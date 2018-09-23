@extends('layouts.app')


@section('content')

    <div class="text-center">
        <h1>新規投稿</h1>
    </div>
    
    {!! Form::model($win_menber, ['route' => 'Win_menbers.pre_store']) !!} 
        <h2>こちらの編成を選択</h2>   
        <ul class="image_list">
        <p>前衛</p>
        @foreach ($characters as $character)
            @if ($character->position == 1)
                <li><div class="image_box form-group" >
                    <label>
                    <img class="thumbnail" src="{{ secure_asset($character->image) }}">
                    {{Form::checkbox('my_menber[]', $character->id, null,  ['class' => 'disabled_checkbox'])}}
                    {{$character->name}}</label>
                 </div></li>   
            @endif
        @endforeach
        <p>中衛</p>
        @foreach ($characters as $character)
            @if ($character->position == 2)
                <li><div class="image_box form-group" >
                    <label>
                    <img class="thumbnail" src="{{ secure_asset($character->image) }}">
                    {{Form::checkbox('my_menber[]', $character->id, null,  ['class' => 'disabled_checkbox'])}}
                    {{$character->name}}</label>
                 </div></li>   
            @endif
        @endforeach
        <p>後衛</p>
        @foreach ($characters as $character)
            @if ($character->position == 3)
                <li><div class="image_box form-group" >
                    <label>
                    <img class="thumbnail" src="{{ secure_asset($character->image) }}">
                    {{Form::checkbox('my_menber[]', $character->id, null,  ['class' => 'disabled_checkbox'])}}
                    {{$character->name}}</label>
                 </div></li>   
            @endif
        @endforeach
        
        <h2>敵の編成を選択</h2>    
        <p>前衛</p>
        @foreach ($characters as $character)
            @if ($character->position == 1)
                <li><div class="image_box form-group" >
                    <label>
                    <img class="thumbnail" src="{{ secure_asset($character->image) }}">
                    {{Form::checkbox('enemy_menber[]', $character->id, null,  ['class' => 'disabled_checkbox'])}}
                    {{$character->name}}</label>
                 </div></li>   
            @endif
        @endforeach
        <p>中衛</p>
        @foreach ($characters as $character)
            @if ($character->position == 2)
                <li><div class="image_box form-group" >
                    <label>
                    <img class="thumbnail" src="{{ secure_asset($character->image) }}">
                    {{Form::checkbox('enemy_menber[]', $character->id, null,  ['class' => 'disabled_checkbox'])}}
                    {{$character->name}}</label>
                 </div></li>   
            @endif
        @endforeach
        <p>後衛</p>
        @foreach ($characters as $character)
            @if ($character->position == 3)
                <li><div class="image_box form-group" >
                    <label>
                    <img class="thumbnail" src="{{ secure_asset($character->image) }}">
                    {{Form::checkbox('enemy_menber[]', $character->id, null,  ['class' => 'disabled_checkbox'])}}
                    {{$character->name}}</label>
                 </div></li>   
            @endif
        @endforeach
        </ul>
        {!! Form::submit('次に進む', ['class' => 'btn btn-primary btn-block']) !!}
     
    {!! Form::close() !!}    
    <script src="../js/base.js"></script> 
@endsection        