@extends('layouts.admin')

@section('title', 'Edit Price Level')
@section('content-header', 'Edit Price Level')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('price_level.update', $price_level->price_level_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description" value="{{ old('description', $price_level->description) }}">
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Locations</label>

                @foreach ($locations as $loc)
                @php
                $checked = false;
                foreach ($price_level_locations as $pll){
                    if(($pll->price_level_id == $price_level->price_level_id) && ($pll->location_id == $loc->location_id)){
                    $checked = true;
                    break;
                    }
                }
                @endphp
                <div class="checkbox">
                    <input type="checkbox" name="location_id[]" value="{{$loc->location_id}}" {{$checked ? 'checked' : ''}}>&nbsp;{{$loc->location_name}}
                </div>
                @endforeach

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