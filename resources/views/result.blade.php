@extends('layouts.app')
<?php $select_star = [
 ''  => '星を選ぶ',
 '1' => '星1',
 '2' => '星2',
 '3' => '星3',
 '4' => '星4',
 '5' => '星5',
 ]; ?>


@section('content')
<h2>環境情報</h2>
<table class="table">
    <tr>
        <p>{{ "最高装備ランク：".$env->equip_rank}}</p>
    </tr>
    <tr>
        <p>{{ "レベル上限：".$env->level}}</p>
    </tr>
</table>

<ul class="media-list">
    <div><p class="bg-danger">敵の編成</p></div>
        {!! Form::open(['route' => 'result_more']) !!}
        <ul class="image_list">
            <li><div class="image_box form-group" >
                <img class="image" src="{{ secure_asset($characters[($results[0]->enemy5_id)-1]->image) }}">
                {{$characters[$results[0]->enemy5_id-1]->name}}
                {!!Form::hidden('more_id1', $results[0]->enemy5_id) !!}
                {{Form::select('more_star[]', $select_star, null, ['class' => 'form', 'id' => 'more_star[]']) }}
            </div></li>
            <li><div class="image_box form-group" >
                <img class="image" src="{{ secure_asset($characters[($results[0]->enemy4_id)-1]->image) }}">
                {{$characters[$results[0]->enemy4_id-1]->name}}
                {!!Form::hidden('more_id2', $results[0]->enemy4_id) !!}
                {{Form::select('more_star[]', $select_star, null, ['class' => 'form', 'id' => 'more_star[]']) }}
            </div></li>
            <li><div class="image_box form-group" >
                <img class="image" src="{{ secure_asset($characters[($results[0]->enemy3_id)-1]->image) }}">
                {{$characters[$results[0]->enemy3_id-1]->name}}
                {!!Form::hidden('more_id3', $results[0]->enemy3_id) !!}
                {{Form::select('more_star[]', $select_star, null, ['class' => 'form', 'id' => 'more_star[]']) }}
            </div></li>
            <li><div class="image_box form-group" >
                <img class="image" src="{{ secure_asset($characters[($results[0]->enemy2_id)-1]->image) }}">
                {{$characters[$results[0]->enemy2_id-1]->name}}
                {!!Form::hidden('more_id4', $results[0]->enemy2_id) !!}
                {{Form::select('more_star[]', $select_star, null, ['class' => 'form', 'id' => 'more_star[]']) }}
            </div></li>
            <li><div class="image_box form-group" >
                <img class="image" src="{{ secure_asset($characters[($results[0]->enemy1_id)-1]->image) }}">
                {{$characters[$results[0]->enemy1_id-1]->name}}
                {!!Form::hidden('more_id5', $results[0]->enemy1_id) !!}
                {{Form::select('more_star[]', $select_star, null, ['class' => 'form', 'id' => 'more_star[]']) }}
            </div></li>
            {!!Form::hidden('env_id', $results[0]->env_id) !!}
            <li>
                {!! Form::submit('絞り込み検索', ['class' => 'btn btn-primary btn-block']) !!}
            </li>
        </ul>
    {!! Form::close() !!} 
</ul>


<table class="media-list table table-bordered" style="table-layout:fixed;">
    <div class="row"><p class="bg-info">こちらの編成</p></div>
    @foreach ($results as $result)
        <tr class="image_list">
            <td><div class="image_box form-group" >
                <img class="image img-responsive" src="{{ secure_asset($characters[($result->my5_id)-1]->image) }}">
                {!! nl2br(e($characters[$result->my5_id-1]->name)) !!}
                {!! nl2br(e("【星".$result->my5_star."】")) !!}
            </div></td>
            <td><div class="image_box form-group" >
                <img class="image img-responsive" src="{{ secure_asset($characters[($result->my4_id)-1]->image) }}">
                {!! nl2br(e($characters[$result->my4_id-1]->name)) !!}
                {!! nl2br(e("【星".$result->my4_star."】")) !!}
            </div></td>
            <td><div class="image_box form-group" >
                <img class="image img-responsive" src="{{ secure_asset($characters[($result->my3_id)-1]->image) }}">
                {!! nl2br(e($characters[$result->my3_id-1]->name)) !!}
                {!! nl2br(e("【星".$result->my3_star."】")) !!}
            </div></td>
            <td><div class="image_box form-group" >
                <img class="image img-responsive" src="{{ secure_asset($characters[($result->my2_id)-1]->image) }}">            
                {!! nl2br(e($characters[$result->my2_id-1]->name)) !!}
                {!! nl2br(e("【星".$result->my2_star."】")) !!}
            </div></td>
            <td><div class="image_box form-group" >
                <img class="image img-responsive" src="{{ secure_asset($characters[($result->my1_id)-1]->image) }}">            
                {!! nl2br(e($characters[$result->my1_id-1]->name)) !!}
                {!! nl2br(e("【星".$result->my1_star."】")) !!}
            </div></td>
        </tr>
    @endforeach
</table>



{{--{!! $results->render() !!}--}}
    @include('selectform',['characters' => $characters])
@endsection