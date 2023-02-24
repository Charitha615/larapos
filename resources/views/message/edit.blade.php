@extends('layouts.admin')

@section('title', 'Edit Message')
@section('content-header', 'Edit Message')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('message.update', $message) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" id="type" placeholder="Type" value="0" hidden>
                @error('rate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Message</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Message" value="{{ old('description', $message->description) }}">
                @error('description')
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