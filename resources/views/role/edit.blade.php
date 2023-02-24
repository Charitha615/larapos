@extends('layouts.admin')

@section('title', 'Edit Role')
@section('content-header', 'Edit Role')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('role.update', $role->role_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="role_name">Name</label>
                <input type="text" name="role_name" class="form-control @error('role_name') is-invalid @enderror" id="role_name" placeholder="Name" value="{{ old('role_name', $role->role_name) }}">
                @error('role_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description" value="{{ old('description', $role->description) }}">
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="display_seq">Display Sequence</label>
                <input type="number" name="display_seq" class="form-control @error('display_seq') is-invalid @enderror" id="display_seq" placeholder="Display Sequence" value="{{ old('display_seq', $role->display_seq) }}">
                @error('display_seq')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Permissions</label>
                @foreach ($permissions as $per)
                @php
                $checked = false;
                foreach ($role_permissions as $rp){
                if(($rp->role_id == $role->role_id) && ($rp->permission_id == $per->permission_id)){
                $checked = true;
                break;
                }
                }
                @endphp
                <div class="checkbox">
                    <input type="checkbox" name="permission_id[]" value="{{$per->permission_id}}" {{$checked ? 'checked' : ''}}>&nbsp;{{$per->controller. '@' . $per->method}}
                </div>
                @endforeach

            </div>

            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>
</div>
@endsection



