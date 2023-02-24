@extends('layouts.admin')

@section('title', 'Reports')
@section('content-header', 'Sub Department Sales Report')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('report.report-generate',$slug)}}" method="post">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">  @include('reports.include.location')</div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">  @include('reports.include.terminal')</div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"> @include('reports.include.from_to_date')</div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">@include('reports.include.shorting')</div>
                </div>
                <div class="col-md-12 text-center" >
                    <button type="submit" class="btn btn-sm btn-primary" style="width: 33%">Search</button>
                </div>
            </form>
        </div>
    </div>
@endsection
