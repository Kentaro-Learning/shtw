@extends('layouts.app')


@section('content')


    @include('selectform',['characters' => $characters])  
        
@endsection        