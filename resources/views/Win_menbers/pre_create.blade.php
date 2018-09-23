@extends('layouts.app')

<?php $select_star = [
 '0' => '星を選択',
 '1' => '星1',
 '2' => '星2',
 '3' => '星3',
 '4' => '星4',
 '5' => '星5',
 ]; ?>


@section('content')

    <div class="text-center">
        <h1>新規投稿</h1>
    </div>
    {!! Form::model($win_menber, ['route' => 'Win_menbers.store']) !!} 
        <p>自分の編成</p>
        @foreach ($my_menbers as $my_menber)
            {{$my_menber->name}}
            {!!Form::hidden('my_id[]', $my_menber->id) !!}
            {{Form::select('my_star[]', $select_star, null, ['class' => 'form', 'id' => 'my_star[]']) }}
        @endforeach
        <p>相手の編成</p>
        @foreach ($enemy_menbers as $enemy_menber)
            {{$enemy_menber->name}}
            {!!Form::hidden('enemy_id[]', $enemy_menber->id) !!}
            {{Form::select('enemy_star[]', $select_star, null, ['class' => 'form', 'id' => 'enemy_star[]']) }}
        @endforeach

        <div class="form-group">
            <?php $today = \Carbon\Carbon::now(); ?>
            {!! Form::label('date', '戦闘した日付') !!}
            {{Form::selectRange('year', 2015, 2018, $today->year)}}年
            {{Form::selectRange('month', 1, 12, $today->month)}}月
            {{Form::selectRange('day', 1, 31, $today->day)}}日
        </div>
        {!! Form::submit('投稿', ['class' => 'btn btn-primary btn-block']) !!}

    {!! Form::close() !!} 

@endsection        