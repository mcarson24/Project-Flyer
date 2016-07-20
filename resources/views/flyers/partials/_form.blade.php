@inject('countries', 'App\Http\Utilities\Country')

    {{ csrf_field() }}

    <div class="form-group">
        <label for="street">Street:</label>
        <input type="text" id="street" name="street" class="form-control {{ $errors->has('street') ? 'inputError1' : '' }}" value="{{ old('street') }}" required>
        @if ($errors->has('street'))
            <span class="help-block">{{ $errors->first('street') }}</span>

        @endif
    </div>

    <div class="form-group">
        <label for="city">City:</label>
        <input type="text" id="city" name="city" class="form-control {{ $errors->has('city') ? 'inputError1' : '' }}" value="{{ old('city') }}" required>
        @if ($errors->has('city'))
            <span class="help-block">{{ $errors->first('city') }}</span>

        @endif
    </div>

    <div class="form-group">
        <label for="zip">Zip\Postal Code:</label>
        <input type="text" id="zip" name="zip" class="form-control {{ $errors->has('zip') ? 'inputError1' : '' }}" value="{{ old('zip') }}" required>
        @if ($errors->has('zip'))
            <span class="help-block">{{ $errors->first('zip') }}</span>

        @endif
    </div>

    <div class="form-group">
        <label for="state">State:</label>
        <input type="text" id="state" name="state" class="form-control {{ $errors->has('state') ? 'inputError1' : '' }}" value="{{ old('state') }}" required>
        @if ($errors->has('state'))
            <span class="help-block">{{ $errors->first('state') }}</span>

        @endif
    </div>

    <div class="form-group">
        <label for="country">Country:</label>
        <select name="country" id="country" class="form-control {{ $errors->has('country') ? 'inputError1' : '' }}" value="{{ old('country') }}" required>
            <option disabled selected>Select A Country...</option>
            @foreach ($countries::all() as $code => $country)
                <option value="{{ $code }}">{{ $country }}</option>
            @endforeach
        </select>
        @if ($errors->has('country'))
            <span class="help-block">{{ $errors->first('country') }}</span>

        @endif
    </div>

    <div class="form-group">
        <label for="price">Sale Price:</label>
        <input type="text" id="price" name="price" class="form-control {{ $errors->has('price') ? 'inputError1' : '' }}" value="{{ old('price') }}" required>
        @if ($errors->has('price'))
            <span class="help-block">{{ $errors->first('price') }}</span>

        @endif
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control {{ $errors->has('description') ? 'inputError1' : '' }}" required>{{ old('description') }}</textarea>
        @if ($errors->has('description'))
            <span class="help-block">{{ $errors->first('description') }}</span>

        @endif
    </div>

    <div class="form-group">
        <label for="photos">Photos:</label>
        <input type="file" id="photos" name="photos">
    </div>

    <button type="submit" class="btn btn-primary form-control">Create Flyer</button>

