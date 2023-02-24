@extends('layouts.admin')

@section('title', 'Add Modifier')
@section('content-header', 'Add Modifier')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('modifier.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="modifiers_category_id">Modifier Category</label>
                <select name="modifiers_category_id" class="form-control @error('modifiers_category_id') is-invalid @enderror" id="modifiers_category_id">
                    <option value="" selected desabled>Select a Category</option>
                    @foreach($modifierCategories as $cat)
                    <option value="{{$cat->modifiers_category_id}}" {{$cat->modifiers_category_id < 0 ? 'hidden' : ''}}>{{$cat->description}}</option>
                    @endforeach
                </select>
                @error('modifiers_category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="department_name">Price_Inc_Tax</label>
                <input type="number" name="price_inc_tax" class="form-control @error('price_inc_tax') is-invalid @enderror" id="price_inc_tax" placeholder="price_inc_tax" value="0.00">
                @error('price_inc_tax')
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

            <button class="btn btn-primary" type="submit">Add Modifier</button>
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