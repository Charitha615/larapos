@extends('layouts.admin')

@section('title', 'Edit Terminal')
@section('content-header', 'Edit Terminal')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('terminal.update', $terminal->terminal_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description" value="{{ old('description', $terminal->description) }}">
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="location_id">Location</label>
                <select name="location_id" class="form-control @error('location_id') is-invalid @enderror" id="location_id">
                    @foreach($location_list as $location)
                    <option value="{{$location->location_id}}" {{$location->location_id == $location_id ? 'selected' : ''}}>{{$location->location_name}}</option>
                    @endforeach
                </select>
                @error('location_id')
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



