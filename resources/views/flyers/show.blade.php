@extends('layout')

@section('content')

    <div class="row">

        <div class="col-md-4">

            <h1 class="text-center">{{ $flyer->street }}</h1>

            <h2 class="text-center">{{ $flyer->price }}</h2>

            <div class="description">{!! nl2br($flyer->description) !!}</div>

        </div>

        <div class="col-md-8">
            
            @foreach ($flyer->photos->chunk(4) as $row)
                <div class="row">
                   @foreach ($row as $photo)
                   <div class="col-md-3">
                        <a href="{{ asset($photo->path) }}">
                            <img src="{{ asset($photo->thumbnail_path) }}" alt="Image of {{ $flyer->street }}" class="flyer">
                        </a>
                    </div>
                @endforeach 
                </div>
            @endforeach

            @if ($user && $user->owns($flyer))

            <hr>

            <h2 class="text-center">Add Your Photos</h2>

            <form action="{{ add_photo_path($flyer) }}" method="POST" class="dropzone" id="addPhotosForm">
            
                {{ csrf_field() }}

            </form>

    @endif

        </div>

    </div>


    @section('scripts-footer')

        <script>
            Dropzone.options.addPhotosForm = {
                paramName: 'photo',
                maxFileSize: 3,
                acceptedFiles: '.jpg, .jpeg, .png, .bmp'
            };

        </script>

    @endsection

@endsection