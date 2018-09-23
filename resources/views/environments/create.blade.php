@extends('layouts.app')


@section('content')

    <div class="text-center">
        <h1>新規環境作成</h1>
    </div>

    <div class="row">
        <div class="col-xs-6">
            {!! Form::model(['route' => 'environments.store', 'method' => 'post']) !!}

            <div class="form-group">
                <?php $today = \Carbon\Carbon::now(); ?>
                {!! Form::label('date', '戦闘した日付') !!}
                {{Form::selectRange('year', 2015, 2018, $today->year)}}年
                {{Form::selectRange('month', 1, 12, $today->month)}}月
                {{Form::selectRange('day', 1, 31, $today->day)}}日
            </div>
            <div class="form-group">
                {!! Form::label('equip_rank', '最高装備ランク:') !!}
                {!! Form::number('equip_rank', null) !!}
            </div>
            <div class="form-group">
                {!! Form::label('level', '最高レベル:') !!}
                {!! Form::number('level', null) !!}
            </div>



             {!! Form::submit('作成', ['class' => 'btn btn-primary']) !!}

         {!! Form::close() !!}

        </div>
    </div>


@endsection    