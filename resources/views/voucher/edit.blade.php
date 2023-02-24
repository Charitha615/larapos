@extends('layouts.admin')

@section('title', 'Edit Voucher')
@section('content-header', 'Edit Voucher')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('voucher.update', $voucher->voucher_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="voucher_type_id">Voucher Type</label>
                <select name="voucher_type_id" class="form-control @error('voucher_type_id') is-invalid @enderror" id="voucher_type_id">
                    @foreach($voucher_types as $type)
                    <option value="{{$type->voucher_type_id}}" {{$type->voucher_type_id == $voucher->voucher_type_id ? 'selected' : ''}}>{{$type->description}}</option>
                    @endforeach
                </select>
                @error('voucher_type_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description" value="{{ old('description', $voucher->description) }}">
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="value">Value</label>
                <input type="number" min="0" step="0.01" name="value" class="form-control @error('value') is-invalid @enderror" id="value" placeholder="Value" value="{{ old('value', $voucher->value) }}">
                @error('value')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="checkbox">
                <input type="checkbox" name="unlimited" id="unlimited" value="1" {{old('unlimited', $voucher->unlimited) == '1' ? 'checked' : ''}}>
                &nbsp;<label for="unlimited">Unlimited</label>
            </div>

            <div class="form-group">
                <label for="start_date">Valid From</label>
                <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" placeholder="Valid From" value="{{ old('start_date', $voucher->start_date) }}">
                @error('start_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="end_date">Valid Until</label>
                <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" placeholder="Valid Until" value="{{ old('end_date', $voucher->end_date) }}">
                @error('end_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Terminals</label>

                @foreach ($terminals as $t)
                @php
                $checked = false;
                foreach ($voucher_terminals as $vt){
                if(($vt->voucher_id == $voucher->voucher_id) && ($vt->terminal_id == $t->terminal_id)){
                $checked = true;
                break;
                }
                }
                @endphp
                <div class="checkbox">
                    <input type="checkbox" name="terminal_id[]" value="{{$t->terminal_id}}" {{$checked ? 'checked' : ''}}>
                    &nbsp;{{$t->description}}
                </div>
                @endforeach

            </div>

            <div class="checkbox">
                <input type="checkbox" name="print_receipt" id="print_receipt" value="1" {{old('print_receipt', $voucher->print_receipt) == '1' ? 'checked' : ''}}>
                &nbsp;<label for="print_receipt">Print Receipt</label>
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

        $(function() {
            $("#start_date").datepicker({
                dateFormat: 'yy-mm-dd'
            });
            $("#end_date").datepicker({
                dateFormat: 'yy-mm-dd'
            }).bind("change", function() {
                var minValue = $(this).val();
                minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
                minValue.setDate(minValue.getDate() + 1);
                $("#to").datepicker("option", "minDate", minValue);
            })
        });
    });
</script>
@endsection