@extends('layouts.admin')

@section('title', 'Edit Terminal Option Detail')
@section('content-header', 'Edit Terminal Option Detail')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('terminal_option_detail.update', $terminal_option_detail) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description" value="{{ old('description', $terminal_option_detail->description) }}">
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" id="type" placeholder="Type" value="{{ old('type', $terminal_option_detail->type) }}">
                @error('type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="purpose">Purpose</label>
                <input type="text" name="purpose" class="form-control @error('type') is-invalid @enderror" id="purpose" placeholder="Purpose" value="{{ old('purpose', $terminal_option_detail->purpose) }}" disabled>
                @error('purpose')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>
@endsection