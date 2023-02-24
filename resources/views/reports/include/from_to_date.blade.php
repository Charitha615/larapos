<div class="form-group">
    <label for="start_date"> From</label>
    <input type="date" name="from_date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" placeholder="Valid From" value="{{ old('start_date') }}">
    @error('start_date')
    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
    @enderror
</div>

<div class="form-group">
    <label for="end_date">To</label>
    <input type="date" name="to_date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" placeholder="Valid Until" value="{{ old('end_date') }}">
    @error('end_date')
    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
    @enderror
</div>
