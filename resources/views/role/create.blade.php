@extends('layouts.admin')

@section('title', 'Add Role')
@section('content-header', 'Add Role')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('role.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="role_name">Name</label>
                <input type="text" name="role_name" class="form-control @error('role_name') is-invalid @enderror" id="role_name" placeholder="Name" value="{{ old('role_name') }}">
                @error('role_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description" value="{{ old('description') }}">
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="display_seq">Display Sequence</label>
                <input type="number" name="display_seq" class="form-control @error('display_seq') is-invalid @enderror" id="display_seq" placeholder="Display Sequence" min="0" value="{{ old('display_seq') }}">
                @error('display_seq')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Permissions</label>
                @foreach ($permissions as $per)
                <div class="checkbox">
                    <input type="checkbox" name="permission_id[]" value="{{$per->permission_id}}">&nbsp;{{$per->controller. '@' . $per->method}}
                </div>
                @endforeach

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