@extends('layouts.admin')

@section('title', 'Edit Advertisement')
@section('content-header', 'Edit Advertisement')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('advertisement.update', $advertisement->advertisement_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="first_name">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" value="{{ old('name', $advertisement->name) }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="last_name">Content Type</label>
                <p>jpg, gif and png image file types only. Leave it as empty if you don't want to change content images </p>
            </div>
            <div class="form-group">
                <label for="content">Content (Picture size 1024 x 768)</label>
                <div class="row">
                    <div class="col-md-10">
                        <input type="file" name="content[]" class="form-control">
                    </div>
                </div>
                <div id="new_input_fields">

                </div>
                <div class="row mt-2 text-center">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-success" onclick="addNewInput()">Add New</button>
                    </div>
                </div>
                <input type="hidden" name="old_content" value="{{ $advertisement->contents }}">
            </div>
            <div class="form-group">
                <label for="terminal">Terminal</label>
                <select name="terminal" id="terminal" class="form-control @error('terminal') is-invalid @enderror">
                    @foreach ($terminals as $terminal)
                        <option value="{{ $terminal->terminal_id }}"
                           {{ ($terminal->terminal_id == $advertisement->terminal) ? 'selected' : '' }}   
                        >{{ $terminal->description }}</option>
                    @endforeach
                </select>
                @error('terminal')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="display_effect">Display Effect</label>
                <select name="display_effect" id="display_effect" class="form-control @error('display_effect') is-invalid @enderror">
                    <option value="fade">Fade</option>
                </select>
                @error('display_effect')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="duration">Duration (Seconds)</label>
                <input type="text" name="duration" class="form-control @error('duration') is-invalid @enderror" id="duration" placeholder="Duration" value="{{ old('duration', $advertisement->duration) }}">
                @error('duration')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="text" name="start_date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" placeholder="Start Date" value="{{ old('start_date', $advertisement->start_date) }}">
                @error('start_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="no_end_date" name="no_end_date" 
                 onclick="onNoEndDateClick()"
                    {{ ($advertisement->no_end_date == 1) ? 'checked' : '' }}  
                >
                <label for="no_end_date">
                    No End Date
                </label>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="text" name="end_date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" placeholder="End Date" value="{{ old('end_date', $advertisement->end_date) }}"
                {{ ($advertisement->no_end_date == 1) ? 'disabled' : '' }}
                >
                @error('end_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="enable" {{ ($advertisement->status == 'enable') ? 'selected' : '' }}>Enable</option>
                    <option value="disable" {{ ($advertisement->status == 'disable') ? 'selected' : '' }}>Disable</option>
                </select>
                @error('terminal')
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>

<script>
    $(function () {
        $('#start_date').datetimepicker({
            sideBySide:true,
        });
        $('#end_date').datetimepicker({
            sideBySide:true,
        });
    });
    
    var count = 0;
    function addNewInput() {
        $("#new_input_fields").append(
            "<div class='row mt-1' id='dv_"+count+"'>"+
                "<div class='col-md-10'>"+
                    "<input type='file' name='content[]' class='form-control'>"+
                "</div>"+
                "<div class='col-md-2'>"+
                    "<button type='button' class='btn btn-danger' onclick='removeElement(&apos;dv_"+count+"&apos;)'>Remove</button>"+
                "</div>"+
            "</div>"
        );

        count++;
    }

    function removeElement(params) {
        console.log(params);
        $("#"+params).remove();
    }

    function onNoEndDateClick() {
        if($("#no_end_date").prop('checked')) {
            $("#end_date").prop('disabled', true);
        } else {
            $("#end_date").prop('disabled', false);
        }
    }
</script>
@endsection
