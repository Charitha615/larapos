@extends('layouts.admin')

@section('title', 'Reports')
@section('content-header', 'Reports Generate')

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>Report Type</th>
                    <th>Generate Report</th>
                </tr>
                </thead>
                @foreach($data as $item)
                    <tr>
                        <td>{{$item['name']}}</td>
                        <td>
                            <a class="btn btn-sm btn-link btn-info" href="{{route('report.action',$item['route'])}}"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

@endsection
