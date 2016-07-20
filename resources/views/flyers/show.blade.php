@extends('layout')

@section('content')

    <h1 class="text-center">{{ $flyer->street }}</h1>

    <h2 class="text-center">{{ $flyer->price }}</h2>

    <div class="description">{!! nl2br($flyer->description) !!}</div>

@endsection