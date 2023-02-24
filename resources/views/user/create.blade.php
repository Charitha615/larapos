@extends('layouts.admin')

@section('title', 'Add User')
@section('content-header', 'Add User')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="employee_number">Employee Number</label>
                <input type="text" name="employee_number" class="form-control @error('employee_number') is-invalid @enderror" id="employee_number" placeholder="Employee Number" value="{{ old('employee_number') }}">
                @error('employee_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" placeholder="First Name" value="{{ old('first_name') }}">
                @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
                @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="branch_id">Branch</label>
                <select name="branch_id" class="form-control @error('branch_id') is-invalid @enderror" id="branch_id">
                    @foreach($branch_list as $brn)
                    <option value="{{$brn->branch_id}}">{{$brn->branch_name}}</option>
                    @endforeach
                </select>
                @error('branch_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="role_id">User Role</label>
                <select name="role_id" class="form-control @error('role_id') is-invalid @enderror" id="role_id">
                    @foreach($role_list as $usrl)
                    <option value="{{$usrl->role_id}}">{{$usrl->role_name}}</option>
                    @endforeach
                </select>
                @error('role_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" value="{{ old('password') }}">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="card_password">Card Password</label>
                <input type="password" name="card_password" class="form-control @error('card_password') is-invalid @enderror" id="card_password" placeholder="Card Password" value="{{ old('card_password') }}">
                @error('card_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="checkbox">
                <input type="checkbox" name="copy_to_accounts" id="copy_to_accounts">
                &nbsp;<label for="copy_to_accounts">Copy to Accounts?</label>
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