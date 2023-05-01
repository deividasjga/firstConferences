@extends('layouts.app')

@section('content')
    <h2>{{ trans('app.list') }}</h2>
    @guest
    @else
    @if(session('status'))
        <div style="background-color: green; color: lime;">{{ session('status') }}</div>
    @endif
    <a href="{{ route('articles.create') }}"><button type="button" class="button">Create a conference</button></a>
    @endguest
    @each('articles.partials.list', $articles, 'article')
@endsection