@extends('layout')

@section('content')

    <h1 class="text-center">Selling your Home?</h1>

    <div class="row">


        <div class="col-md-8 col-md-offset-2">

            <hr class="create_flyer_title">

            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            <form action="{{ action('FlyersController@store') }}" method="POST" enctype="multipart/form-data">

                @include('flyers.partials._form')

            </form>

        </div>

    </div>

@endsection