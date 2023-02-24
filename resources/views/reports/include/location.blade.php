<div class="form-group">
    <label for="name">Location</label>
    <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
        <option value="">Select One</option>
        @if(count($location) >0)
            @foreach($location as $loc)
                <option
                    value="{{$loc->id}}" {{ old('status') === $loc->id ? 'selected' : ''}}>{{$loc->location_name}}</option>
            @endforeach
        @endif

    </select>
    @error('name')
    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
    @enderror
</div>
