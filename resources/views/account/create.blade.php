@extends('layouts.admin')

@section('title', 'Add Account')
@section('content-header', 'Add Account')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('account.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" placeholder="FirstName" value="{{ old('first_name') }}">
                @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" placeholder="LastName" value="{{ old('last_name') }}">
                @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="card_number">Card No.</label>
                <input type="text" name="card_number" class="form-control @error('card_number') is-invalid @enderror" id="card_number" placeholder="CardNumber" value="{{ old('card_number') }}">
                @error('card_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="store_credit">Store Credit</label>
                <input type="text" name="store_credit" class="form-control @error('store_credit') is-invalid @enderror" id="store_credit" placeholder="StoreCredit" value="{{ old('store_credit') }}">
                @error('store_credit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone_no">Phone No</label>
                <input type="text" name="phone_no" class="form-control @error('phone_no') is-invalid @enderror" id="phone_no" placeholder="PhoneNo" value="{{ old('phone_no') }}">
                @error('phone_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="mobile_no">Mobile No</label>
                <input type="text" name="mobile_no" class="form-control @error('mobile_no') is-invalid @enderror" id="mobile_no" placeholder="MobileNo" value="{{ old('mobile_no') }}">
                @error('mobile_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email_address">Email Address</label>
                <input type="text" name="email_address" class="form-control @error('email_address') is-invalid @enderror" id="email_address" placeholder="EmailAddress" value="{{ old('email_address') }}">
                @error('email_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="discount">Discount (%)</label>
                <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror" id="discount" placeholder="Discount" value="{{ old('discount') }}">
                @error('discount')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Address" value="{{ old('address') }}">
                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="suburb">Suburb</label>
                <input type="text" name="suburb" class="form-control @error('suburb') is-invalid @enderror" id="suburb" placeholder="Suburb" value="{{ old('suburb') }}">
                @error('suburb')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" name="suburb" class="form-control @error('state') is-invalid @enderror" id="state" placeholder="State" value="{{ old('state') }}">
                @error('state')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="post_code">Post Code</label>
                <input type="text" name="post_code" class="form-control @error('post_code') is-invalid @enderror" id="post_code" placeholder="PostCode" value="{{ old('post_code') }}">
                @error('post_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="notes">Notes</label>
                <input type="text" name="notes" class="form-control @error('notes') is-invalid @enderror" id="notes" placeholder="Notes" value="{{ old('notes') }}">
                @error('notes')
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