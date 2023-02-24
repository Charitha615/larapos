@extends('layouts.admin')

@section('title', 'Terminal Option Detail List')
@section('content-header', 'Terminal Option Detail List')
@section('content-actions')
<!-- <a href="{{route('terminal_option_detail.create')}}" class="btn btn-primary">Add Terminal Option Detail</a> -->
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">

<style>
    #tod_value {
        width: 100%;
    }
</style>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('terminal_option_details.updatetype') }}" method="POST" enctype="multipart/form-data">
        @csrf

            <div class="form-group">
                <label for="terminal_id">Terminal</label>
                <select name="terminal_id" class="form-control @error('terminal_id') is-invalid @enderror" id="terminal_id">
                    @foreach($terminals as $terminal)
                    <option value="{{$terminal->terminal_id}}">{{$terminal->description}}</option>
                    @endforeach
                </select>
            </div>

            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Purpose</th>
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                <tbody id="terminal_option_details_tbody">
                    
                </tbody>
            </table>

            <button class="btn btn-danger" type="submit">Save</button>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(document).ready(function() {
        // enableSearch();

        // $(document).on('click', '.btn-delete', function() {
        //     $this = $(this);
        //     const swalWithBootstrapButtons = Swal.mixin({
        //         customClass: {
        //             confirmButton: 'btn btn-success',
        //             cancelButton: 'btn btn-danger'
        //         },
        //         buttonsStyling: false
        //     })

        //     swalWithBootstrapButtons.fire({
        //         title: 'Are you sure?',
        //         text: "Do you really want to delete this Terminal Option Detail?",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonText: 'Yes',
        //         cancelButtonText: 'No',
        //         reverseButtons: false
        //     }).then((result) => {
        //         if (result.value) {
        //             $.post($this.data('url'), {
        //                 _method: 'DELETE',
        //                 _token: '{{csrf_token()}}'
        //             }, function(res) {
        //                 $this.closest('tr').fadeOut(500, function() {
        //                     $(this).remove();
        //                 })
        //             })
        //         }
        //     })
        // })

        // Retrieve terminal and table details
        retrieveTerminalDetails(document.getElementById("terminal_id").value);

        $('#terminal_id').on('change', function(e) {
            let terminalId = e.target.value;
            // alert(terminalId);
            retrieveTerminalDetails(terminalId);
        });
    })

    // function enableSearch() {
    //     let formSearch = document.getElementById("form_search");
    //     formSearch.style.display = "block";
    //     let actionIndex = "{{ route('terminal_option_detail.search') }}";
    //     formSearch.setAttribute("action", actionIndex);
    // }

    function retrieveTerminalDetails(terminalId) {
        // alert(locationId);
        $.ajax({
            url: "{{ route('terminal.new_terminal') }}",
            type: "GET",
            dataType: "JSON",
            data: {
                "_token": "{{ csrf_token() }}",
                "terminal_id": terminalId
            },
            success: function(response) {
                // console.log(response.body);
                // alert("Response: " + response);
                // alert("Response: " + JSON.parse(JSON.stringify(response)));
                let jsonData = JSON.parse(JSON.stringify(response));
                console.log(jsonData);
                // alert(jsonData.location.location_name);
                populateTerminalDetails(jsonData.terminal_details, jsonData.keyboards, jsonData.price_levels);
            }
        })
    }

    function populateTerminalDetails(terminalTables, keyboards, priceLevels) {
        document.getElementById("terminal_option_details_tbody").innerHTML = '';

        for (let key in  terminalTables) {
            let tr = document.createElement('tr');

            let td1 = document.createElement('td');
            let td2 = document.createElement('td');
            let td3 = document.createElement('td');

            let data1 = document.createTextNode(terminalTables[key]["description"]);
            let data2 = setData2(terminalTables, keyboards, priceLevels, key);
            data2.style.width = "230px";
            let data3 = document.createTextNode(terminalTables[key]["terminal_purpose"]);

            //to store terminal_option_id for update
            let data4 = document.createElement('input');
            data4.name = "terminal_option_id[]";
            data4.type = "hidden";
            data4.value = terminalTables[key]['terminal_option_id'];

            td1.appendChild(data1);
            td2.appendChild(data2);
            td3.appendChild(data3);
            td3.appendChild(data4);

            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);

            document.getElementById("terminal_option_details_tbody").appendChild(tr);
        }
    }

    function setData2(terminalTables, keyboards, priceLevels, key) {
        if(terminalTables[key]["type"] == 0) {
            console.log(terminalTables);
            let select = document.createElement('select');
            select.name = "terminal_value[]";

            let option1 = document.createElement('option');
            option1.value = "Y";
            option1.text = "Y";
            if (terminalTables[key]["terminal_value"] == "Y") {
                option1.selected = 'true';
            }
            select.appendChild(option1);

            let option2 = document.createElement('option');
            option2.value = "N";
            option2.text = "N";
            if (terminalTables[key]["terminal_value"] == "N") {
                option2.selected = 'true';
            }
            select.appendChild(option2);

            return select;
        } else if(terminalTables[key]["type"] == 1) {
            let input = document.createElement('input');
            input.type = "text";
            input.name = "terminal_value[]";
            input.value = terminalTables[key]["terminal_value"];

            if (terminalTables[key]["description"] == "GATEWAYTIMEOUT" || terminalTables[key]["description"] == "SITEID") {
                input.max = "999999";
            } else {
                input.max = "9";
            }

            return input;
        } else if(terminalTables[key]["type"] == 2) {
            let select = document.createElement('select');
            select.name = "terminal_value[]";

            for(let keyboard in keyboards) {
                let option = document.createElement('option');
                option.value = keyboards[keyboard]["keyboard_id"];
                option.text = keyboards[keyboard]["description"];
                if (option.value == terminalTables[key]["terminal_value"]) {
                    option.selected = 'true';
                }

                select.appendChild(option);
            }

            return select;
        } else if(terminalTables[key]["type"] == 3) {
            let select = document.createElement('select');
            select.name = "terminal_value[]";

            let option1 = document.createElement('option');
            option1.value = "15";
            option1.text = "15";
            if (terminalTables[key]["terminal_value"] == "15") {
                option1.selected = 'true';
            }
            select.appendChild(option1);

            let option2 = document.createElement('option');
            option2.value = "30";
            option2.text = "30";
            if (terminalTables[key]["terminal_value"] == "30") {
                option1.selected = 'true';
            }
            select.appendChild(option2);

            let option3 = document.createElement('option');
            option3.value = "45";
            option3.text = "45";
            if (terminalTables[key]["terminal_value"] == "45") {
                option1.selected = 'true';
            }
            select.appendChild(option3);

            let option4 = document.createElement('option');
            option4.value = "60";
            option4.text = "60";
            if (terminalTables[key]["terminal_value"] == "60") {
                option1.selected = 'true';
            }
            select.appendChild(option4);

            return select;
        } else if(terminalTables[key]["type"] == 4) {
            let select = document.createElement('select');
            select.name = "terminal_value[]";

            for(let price_level in priceLevels) {
                let option = document.createElement('option');
                option.value = priceLevels[price_level]["price_level_id"];
                option.text = priceLevels[price_level]["description"];
                if (terminalTables[key]["terminal_value"] == option.value) {
                    option.selected = 'true';
                }

                select.appendChild(option);
            }

            return select;
        } else if(terminalTables[key]["type"] == 5) {
            let select = document.createElement('select');
            select.name = "terminal_value[]";

            let option1 = document.createElement('option');
            option1.value = "DISABLE";
            option1.text = "DISABLE";
            if (terminalTables[key]["terminal_value"] == "DISABLE") {
                option1.selected = 'true';
            }
            select.appendChild(option1);

            let option2 = document.createElement('option');
            option2.value = "OFFLINE";
            option2.text = "OFFLINE";
            if (terminalTables[key]["terminal_value"] == "OFFLINE") {
                option2.selected = 'true';
            }
            select.appendChild(option2);

            let option3 = document.createElement('option');
            option3.value = "LINKLY";
            option3.text = "LINKLY";
            if (terminalTables[key]["terminal_value"] == "LINKLY") {
                option3.selected = 'true';
            }
            select.appendChild(option3);

            let option4 = document.createElement('option');
            option4.value = "TYRO";
            option4.text = "TYRO";
            if (terminalTables[key]["terminal_value"] == "TYRO") {
                option4.selected = 'true';
            }
            select.appendChild(option4);

            let option5 = document.createElement('option');
            option5.value = "SQUARE";
            option5.text = "SQUARE";
            if (terminalTables[key]["terminal_value"] == "SQUARE") {
                option5.selected = 'true';
            }
            select.appendChild(option5);

            return select;
        }
    }
</script>
@endsection