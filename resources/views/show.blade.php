@php
    /**
    * @var \App\Models\News $news
    */
@endphp
@extends('layouts.app')

@section('title', $news->title)

@section('content')
    <h2>{{$news->category->title}}</h2>
    <div>{{$news->date->format('Y-m-d H:i:s')}}</div>

    @if($news->file !== null)
        <img class="mx-auto d-block" src="{{$news->file->url}}" alt="$news->title">
    @endif

    <div>
        {!! $news->desc !!}
    </div>



@endsection
