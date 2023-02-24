<div class="form-group">
    <label for="name">Short By Description</label>
    <select name="short" class="form-control @error('status') is-invalid @enderror" id="status">
        <option value="">Select One</option>
        @foreach(shorting() as $key=>$short)
            <option value="{{$key}}">{{$short}}</option>
        @endforeach
    </select>
    @error('name')
    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
    @enderror
</div>
