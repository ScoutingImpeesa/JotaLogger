@extends('layout')

@section('css')
    <style>
        img {
            width: 100%;
            height: auto;
        }
    </style>
@endsection

@section('header')
    {{ $page->title }}
@endsection

@section('content')
    {!! $page->body !!}
@endsection
