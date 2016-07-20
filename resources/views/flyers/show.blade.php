@extends('layout')

@section('content')

    <h1 class="text-center">{{ $flyer->street }}</h1>

    <h2 class="text-center">{{ $flyer->price }}</h2>

    <div class="description">{!! nl2br($flyer->description) !!}</div>

    <form action="http://project-flyer.dev/{{ $flyer->zip }}/{{ $flyer->slug }}/photos" method="POST" class="dropzone">
    
        {{ csrf_field() }}

    </form>

    @foreach ($flyer->photos as $photo)

        <img src="{{ asset($photo->path) }}" alt="Image of {{ $flyer->street }}">
    
    @endforeach

@endsection