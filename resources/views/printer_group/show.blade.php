@extends('layouts.admin')

@section('title', 'Printer Group Details')
@section('content-header', 'Printer Group Details')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('printer.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="printer_group_id">Printer Group</label>
                <select name="printer_group_id" class="form-control @error('printer_group_id') is-invalid @enderror" id="printer_group_id">
                    @foreach($printer_group_list as $group)
                    <option value="{{$group->printer_group_id}}" {{$group->printer_group_id == $printer_group->printer_group_id ? 'selected' : ''}}>{{$group->description}}</option>
                    @endforeach
                </select>
                @error('printer_group_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="card" id="printer_group_details_card_main" style="display: none;">
                <div class="card-body" id="printer_group_details_card_body">
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="button" id="btn_expand" onclick="toggleDivVisibility()">Add Printer</button>
            </div>

            <div class="form-group" id="printer_card_main" style="display: none;">
                <div class="form-group">
                    <label for="description">Name</label>
                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Name" value="{{ old('description') }}">
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="path">Path</label>
                    <input type="text" name="path" class="form-control @error('path') is-invalid @enderror" id="path" placeholder="Path" value="{{ old('path') }}">
                    @error('path')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Add</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        bsCustomFileInput.init();
        // Retrieve printer category details
        retrievePrinterGroupDetails(document.getElementById("printer_group_id").value);

        $('#printer_group_id').on('change', function(e) {
            let printerGroupId = e.target.value;
            retrievePrinterGroupDetails(printerGroupId);
        });
    });

    function retrievePrinterGroupDetails(printerGroupId) {
        // alert(printerGroupId);
        $.ajax({
            url: "{{ route('printer_group.new_printer_group') }}",
            type: "GET",
            dataType: "JSON",
            data: {
                "_token": "{{ csrf_token() }}",
                "printer_group_id": printerGroupId
            },
            success: function(response) {
                // alert("Response: " + response);
                // alert("Response: " + JSON.parse(JSON.stringify(response)));
                let jsonData = JSON.parse(JSON.stringify(response));
                // alert(jsonData.printer_group.description + " : " + jsonData.printers.length);
                populatePrinterGroupDetails(jsonData.printer_group, jsonData.printers);
            }
        })
    }

    function populatePrinterGroupDetails(printerGroup, printers) {

        let table = document.createElement('table');
        table.className = 'table';

        if (printers.length > 0) {
            // Populate html table to display printers info
            // Display heading
            table.appendChild(getThead());
            // Display rows
            table.appendChild(getTbody(printers));
            enableDelete(printerGroup.printer_group_id);
            document.getElementById("printer_group_details_card_body").innerHTML = "";
            document.getElementById("printer_group_details_card_body").appendChild(table);
            document.getElementById("printer_group_details_card_main").style.display = "block";
        } else {
            document.getElementById("printer_group_details_card_main").style.display = "none";
        }
    }

    function getThead() {
        let thead = document.createElement('thead');

        let tr = document.createElement('tr');

        let td1 = document.createElement('td');
        let td2 = document.createElement('td');
        let td3 = document.createElement('td');

        td1.appendChild(boldHTML("Name"));
        td2.appendChild(boldHTML("Path"));
        td3.appendChild(boldHTML("Actions"));

        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);

        thead.appendChild(tr);
        return thead;
    }

    function getTbody(printers) {
        let tbody = document.createElement('tbody');
        for (let key in printers) {
            let tr = document.createElement('tr');

            let td1 = document.createElement('td');
            let td2 = document.createElement('td');
            let td3 = document.createElement('td');

            let text1 = document.createTextNode(printers[key]["description"]);
            let text2 = document.createTextNode(printers[key]["path"]);

            td1.appendChild(text1);
            td2.appendChild(text2);

            // Create action buttons
            // Anchor for edit
            let iconEdit = document.createElement("i");
            iconEdit.setAttribute("class", "fas fa-edit");

            let urlEdit = '{{ route("printer.edit", ":slug") }}';
            urlEdit = urlEdit.replace(':slug', printers[key]["printer_id"]);

            let anchor = document.createElement("a");
            anchor.setAttribute("class", "btn btn-primary");
            anchor.setAttribute("href", urlEdit);
            // anchor.href = urlEdit;
            anchor.appendChild(iconEdit);
            td3.appendChild(anchor);

            // Button for delete
            let iconDelete = document.createElement("i");
            iconDelete.setAttribute("class", "fas fa-trash");

            let urlDelete = '{{ route("printer.destroy", ":slug") }}';
            urlDelete = urlDelete.replace(':slug', printers[key]["printer_id"]);

            let button = document.createElement("button");
            button.setAttribute("type", "button");
            button.setAttribute("class", "btn btn-danger btn-delete");
            button.setAttribute("data-url", urlDelete);
            button.appendChild(iconDelete);
            td3.appendChild(button);

            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);

            tbody.appendChild(tr);
        }
        return tbody;
    }

    function enableDelete(printerGroupId) {
        $(document).on('click', '.btn-delete', function() {
            $this = $(this);
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "Do you really want to delete this printer?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                reverseButtons: false
            }).then((result) => {
                if (result.value) {
                    $.post($this.data('url'), {
                        _method: 'DELETE',
                        _token: '{{ csrf_token() }}'
                    }, function(res) {
                        $this.closest('tr').fadeOut(500, function() {
                            $(this).remove();
                            // let url = "{{ route('printer_group.show', ':slug') }}";
                            // url = url.replace(':slug', printerGroupId);
                            // document.printer_group.href = url;
                        })
                    })
                }
            })
        })
    }

    function boldHTML(text) {
        var element = document.createElement("b");
        element.innerHTML = text;
        return element;
    }

    function toggleDivVisibility() {
        let x = document.getElementById("printer_card_main");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function createElementFromHTML(htmlString) {
        var div = document.createElement('div');
        div.innerHTML = htmlString.trim();

        // Change this to div.childNodes to support multiple top-level nodes
        return div.firstChild;
    }
</script>

@endsection