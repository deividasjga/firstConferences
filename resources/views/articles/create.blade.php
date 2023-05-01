@extends('layouts.app')

@section('title', 'Conference Creation Form')

@section('content')
    <h4>{{ trans('app.create') }}</h4>
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        @include('articles.partials.form')

        <div><input type="submit" value="Create"></div>
    </form>
@endsection   
