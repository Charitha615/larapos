@extends('layouts.admin')

@section('title', 'Add Department')
@section('content-header', 'Add Department')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('department.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="parent_department_id">Main Department</label>
                <select name="parent_department_id" class="form-control @error('parent_department_id') is-invalid @enderror" id="parent_department_id">
                    <option value="" selected>Select Main Department</option>
                    @foreach($department_list as $dept)
                
                    <option value="{{$dept->department_id}}" {{$dept->parent_department_id > 0 ? 'hidden' : ''}}>{{$dept->department_name}}</option>
                    
                    @endforeach
                </select>
                @error('parent_department_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="department_name">Department / Sub-Department </label>
                <input type="text" name="department_name" class="form-control @error('department_name') is-invalid @enderror" id="department_name" placeholder="Department /If Main Depatment selected this will be a Sub-Department" value="{{ old('department_name') }}">
                @error('department_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description">{{ old('description') }}</textarea>
                @error('description')
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