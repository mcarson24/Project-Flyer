@extends('layout')

@section('content')

    <h1 class="text-center">Selling your Home?</h1>

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
        
            <hr class="create_flyer_title">
            
            <form action="{{ action('FlyersController@store') }}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}
        
                <div class="form-group">
                    <label for="street">Street:</label>
                    <input type="text" id="street" name="street" class="form-control" vale="{{ old('street') }}">
                </div>

                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control" vale="{{ old('city') }}">
                </div>

                <div class="form-group">
                    <label for="zip">Zip\Postal Code:</label>
                    <input type="text" id="zip" name="zip" class="form-control" vale="{{ old('zip') }}">
                </div>

                <div class="form-group">
                    <label for="state">State:</label>
                    <input type="text" id="state" name="state" class="form-control" vale="{{ old('state') }}">
                </div>

                <div class="form-group">
                    <label for="country">Country:</label>
                    <select name="country" id="country" class="form-control" vale="{{ old('country') }}">
                        
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Sale Price:</label>
                    <input type="text" id="price" name="price" class="form-control" vale="{{ old('price') }}">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" vale="{{ old('description') }}"></textarea>
                </div>

                <div class="form-group">
                    <label for="photos">Photos:</label>
                    <input type="file" id="photos" name="photos">
                </div>

                <button type="submit" class="btn btn-primary form-control">Create Flyer</button>

            </form>

        </div>

    </div>

@endsection