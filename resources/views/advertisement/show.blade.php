@extends('layouts.admin')

@section('title', 'Advertisement Details')
@section('content-header', 'Advertisement Details')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <strong>Name</strong><br>
                <p>{{ $advertisement->name }}</p>
            </div>
            <div class="col-md-4">
                <strong>Terminal</strong><br>
                <p>{{ $terminal_name }}</p>
            </div>
            <div class="col-md-4">
                <strong>Display Effect</strong><br>
                <p>{{ ucfirst($advertisement->display_effect) }}</p>
            </div>
            <div class="col-md-4">
                <strong>Duration</strong><br>
                <p>{{ $advertisement->duration }} Seconds</p>
            </div>
            <div class="col-md-4">
                <strong>Unlimited</strong><br>
                <p>{{ ($advertisement->no_end_date == 1) ? 'Yes' : 'No' }}</p>
            </div>
            <div class="col-md-4">
                <strong>Start Date</strong><br>
                <p>{{ date_format(date_create($advertisement->start_date),"Y/m/d H:i:s") }}</p>
            </div>
            @if ($advertisement->no_end_date == 1)
            <div class="col-md-4">
                <strong>End Date</strong><br>
                <p>{{ date_format(date_create($advertisement->end_date),"Y/m/d H:i:s") }}</p>
            </div>
            @endif
            <div class="col-md-4">
                <strong>Status</strong><br>
                <p>{{ ucfirst($advertisement->status) }}</p>
            </div>
            <div class="col-md-12">
                <strong>Contents</strong><br>
                <div class="row">
                    @php
                        $contents = json_decode($advertisement->contents);
                    @endphp
                    @if ($contents != null)
                    @foreach ($contents as $content)
                        <div class="col-md-3">
                            <img src="{{ asset('/contents/'.$content) }}" alt="" style="width: 100%; height: 100%;">
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection