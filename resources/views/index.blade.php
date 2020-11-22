@php
/**
* @var \App\Models\News[]|\Illuminate\Support\Collection $news
*/
@endphp
@extends('layouts.app')

@section('title', 'Список новостей')

@section('content')
    <ul class="list-group">
        @foreach($news as $item)
            <li class="list-group-item">
                {{$item->title}} | {{$item->category->title ?? null}}, {{$item->date->format('Y-m-d H:i:s')}}
                <p><small>{{$item->short_desc}}</small></p>
                <a class="btn btn-outline-secondary btn-sm" href="{{route('news.show', [$item->id])}}" role="button">Подробно</a>
            </li>
        @endforeach
    </ul>


@endsection
