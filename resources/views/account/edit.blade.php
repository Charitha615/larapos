@extends('layouts.admin')

@section('title', 'Edit Account')
@section('content-header', 'Edit Account')

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('account.update', $account) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" placeholder="First Name" value="{{ old('first_name', $account->first_name) }}">
                @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" placeholder="Last Name" value="{{ old('last_name', $account->last_name) }}">
                @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="card_number">Card No.</label>
                <input type="text" name="card_number" class="form-control @error('card_number') is-invalid @enderror" id="card_number" placeholder="Card Number" value="{{ old('card_number', $account->card_number) }}">
                @error('card_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="store_credit">Store Credit</label>
                <input type="text" name="store_credit" class="form-control @error('store_credit') is-invalid @enderror" id="store_credit" placeholder="Store Credit" value="{{ old('store_credit', $account->store_credit) }}">
                @error('store_credit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone_no">Phone No</label>
                <input type="text" name="phone_no" class="form-control @error('phone_no') is-invalid @enderror" id="phone_no" placeholder="Phone No" value="{{ old('phone_no', $account->phone_no) }}">
                @error('phone_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="mobile_no">Mobile No</label>
                <input type="text" name="mobile_no" class="form-control @error('mobile_no') is-invalid @enderror" id="mobile_no" placeholder="Mobile No" value="{{ old('mobile_no', $account->mobile_no) }}">
                @error('mobile_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email_address">Email Address</label>
                <input type="text" name="email_address" class="form-control @error('email_address') is-invalid @enderror" id="email_address" placeholder="Email Address" value="{{ old('email_address', $account->email_address) }}">
                @error('email_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="discount">Discount (%)</label>
                <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror" id="discount" placeholder="Discount" value="{{ old('discount', $account->discount) }}">
                @error('discount')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Address" value="{{ old('address', $account->address) }}">
                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="suburb">Suburb</label>
                <input type="text" name="suburb" class="form-control @error('suburb') is-invalid @enderror" id="suburb" placeholder="Suburb" value="{{ old('suburb', $account->suburb) }}">
                @error('suburb')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" name="suburb" class="form-control @error('state') is-invalid @enderror" id="state" placeholder="State" value="{{ old('state', $account->state) }}">
                @error('state')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="post_code">Post Code</label>
                <input type="text" name="post_code" class="form-control @error('post_code') is-invalid @enderror" id="post_code" placeholder="PostCode" value="{{ old('post_code', $account->post_code) }}">
                @error('post_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="notes">Notes</label>
                <input type="text" name="notes" class="form-control @error('notes') is-invalid @enderror" id="notes" placeholder="Notes" value="{{ old('notes', $account->notes) }}">
                @error('notes')
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