@extends('layouts.app')


@section('content')
    <h1>このサイトについて</h1>
    <div><p>
        ソーシャルゲーム「プリンセスコネクト Re:Dive」のアリーナで勝利した編成を共有することで</br>
        戦績を上げていくことを目指すためのサイトです
    </p></div>

    @include('selectform',['characters' => $characters])  
        
@endsection        