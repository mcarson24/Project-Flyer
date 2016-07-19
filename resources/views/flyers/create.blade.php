@inject('countries', 'App\Http\Utilities\Country')

@extends('layout')

@section('content')

    <h1 class="text-center">Selling your Home?</h1>

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
        
            <hr class="create_flyer_title">
            
            @include('flyers.partials._form')

        </div>

    </div>

@endsection