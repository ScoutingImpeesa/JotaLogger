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
    Stats 
@endsection

@section('content')
<h3>Totalen:</h3>
QSOs: {{ $qsos }}<br>
Groepen: {{ $groups }}<br> 
@endsection
