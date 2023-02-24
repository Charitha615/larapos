@extends('layouts.admin')

@section('title', 'Add Printer Group')
@section('content-header', 'Add Printer Group')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('printer_group.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="type">Type</label>
                <input type="number" name="type" class="form-control @error('description') is-invalid @enderror" id="type" placeholder="Type" value="0" hidden>
                @error('type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Name</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Name" value="{{ old('description') }}">
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="client_print_order">Client Print Order</label>
                <input type="number" name="client_print_order" class="form-control @error('client_print_order') is-invalid @enderror" id="client_print_order" placeholder="Client Print Order" value="{{ old('client_print_order') }}">
                @error('client_print_order')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Add</button>
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