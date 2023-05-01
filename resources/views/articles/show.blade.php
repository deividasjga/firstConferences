@extends('layouts.app')

@section('content')
    @if(session('status'))
        <div style="background-color: green; color: lime;">{{ session('status') }}</div>
    @endif




    <h1>{{ $articles['title'] }}</h1>
    <p>{{ $articles['content'] }}</p>
    <p>{{ $articles['date'] }}</p>
    <p>{{ $articles['address'] }}</p>
@endsection