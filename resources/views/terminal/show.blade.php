@extends('layouts.admin')

@section('title', 'Terminal Detail')
@section('content-header', 'Terminal Detail')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('terminal_option.update', $terminal->terminal_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!--
            <div class="form-group">
                <label for="terminal_id">Name</label>
                <select name="terminal_id" class="form-control @error('terminal_id') is-invalid @enderror" id="terminal_id">
                    @foreach($terminals as $ter)
                    <option value="{{$ter->terminal_id}}" {{$ter->terminal_id == $terminal->terminal_id ? 'selected' : ''}}>{{$ter->description}}</option>
                    @endforeach
                </select>
                @error('terminal_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="card" id="printer_group_details_card_main" style="display: none;">
                <div class="card-body" id="printer_group_details_card_body">
                </div>
            </div>

            <div class="form-group" id="printer_card_main" style="display: none;">
            </div>
            -->

            <div class="form-group">
                <div style="display:flex; flex-direction: row; justify-content: left; align-items: center">
                    <p><strong>Name:&nbsp;&nbsp;</strong></p>
                    <p name="description" id="description">{{$terminal->description}}</p>
                </div>
            </div>

            <div class="form-group">
                <div style="display:flex; flex-direction: row; justify-content: left; align-items: center">
                    <p><strong>Location:&nbsp;&nbsp;</strong></p>
                    <p name="location" id="location">{{$location->location_name}}</p>
                </div>
            </div>

            <div class="form-group">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Option</th>
                                    <th>Value</th>
                                    <th>Purpose</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($terminal_option_details as $detail)
                                @php
                                $terminal_option = $terminal_options->firstWhere('terminal_option_detail_id', $detail->terminal_option_detail_id);
                                
                                $terminal_option_id = "";
                                $terminal_value = "";
                                $terminal_purpose = "";

                                if ($terminal_option != null) {
                                    $terminal_option_id = $terminal_option->terminal_option_id;
                                    $terminal_value = $terminal_option->terminal_value;
                                    $terminal_purpose = $terminal_option->terminal_purpose;
                                }
                                @endphp
                                <tr>
                                    <td>
                                        {{$detail->description}}
                                        <input type="hidden" name="terminal_option_id[]" value="{{$terminal_option_id}}">
                                    </td>
                                    <td><input type="text" name="terminal_option[terminal_value][{{$terminal_option_id}}]" class="form-control" placeholder="" value="{{$terminal_value}}"></td>
                                    <td><input type="text" name="terminal_option[terminal_purpose][{{$terminal_option_id}}]" class="form-control" placeholder="" value="{{$terminal_purpose}}"></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Save</button>
    </div>
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