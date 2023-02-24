<div class="form-group">
    <label for="name">Terminal</label>
    <select name="terminal" class="form-control @error('status') is-invalid @enderror" id="status">
        <option value="">Select One</option>
        @if(count($terminal) >0)
            @foreach($terminal as $ter)
                <option
                    value="{{$ter->id}}" {{ old('status') === $ter->id ? 'selected' : ''}}>{{$ter->description}}</option>
            @endforeach
        @endif
    </select>
    @error('name')
    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
    @enderror
</div>
