@extends('layouts.admin')

@section('title', 'View Department')
@section('content-header', 'Department Details')

@section('content')

<div class="card">
    <div class="card-body"> 
        <div class="text-center">
        <h3>Department Name: {{$department->department_name}}</h3>
        <h4>Sub Depatments &#x21b4;</h4>
            {{-- @if (count($subs) <= 0)
                <p class="text-danger">Has No Sub Department</p>
            @endif --}}
            @foreach($subs as $sub)
                <p>&#x2723; {{$sub->department_name}}</p>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection