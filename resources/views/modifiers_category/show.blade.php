@extends('layouts.admin')

@section('title', 'Modifiers Category Details')
@section('content-header', 'Modifiers Category Details')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('modifier.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="modifiers_category_id">Modifiers Category</label>
                <select name="modifiers_category_id" class="form-control @error('modifiers_category_id') is-invalid @enderror" id="modifiers_category_id">
                    @foreach($modifiers_category_list as $category)
                    <option value="{{$category->modifiers_category_id}}" {{$category->modifiers_category_id == $modifiers_category->modifiers_category_id ? 'selected' : ''}}>{{$category->description}}</option>
                    @endforeach
                </select>
                @error('modifiers_category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="card" id="modifiers_category_details_card_main" style="display: none;">
                <div class="card-body" id="modifiers_category_details_card_body">
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="button" id="btn_expand" onclick="toggleDivVisibility()">Add Modifier</button>
            </div>

            <div class="form-group" id="modifier_card_main" style="display: none;">
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
                    <label for="price_x_tax">Price ex. tax</label>
                    <input type="number" min="0" step="0.01" name="price_x_tax" class="form-control @error('price_x_tax') is-invalid @enderror" id="price_x_tax" placeholder="Price ex. Tax" value="{{ old('price_x_tax') }}">
                    @error('price_x_tax')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price_inc_tax">Price inc. tax</label>
                    <input type="number" min="0" step="0.01" name="price_inc_tax" class="form-control @error('price_inc_tax') is-invalid @enderror" id="price_inc_tax" placeholder="Price inc. Tax" value="{{ old('price_inc_tax') }}">
                    @error('price_inc_tax')
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
        // Retrieve modifier category details
        retrieveModifiersCategoryDetails(document.getElementById("modifiers_category_id").value);

        $('#modifiers_category_id').on('change', function(e) {
            let modifiersCategoryId = e.target.value;
            retrieveModifiersCategoryDetails(modifiersCategoryId);
        });
    });

    function retrieveModifiersCategoryDetails(modifiersCategoryId) {
        // alert(modifiersCategoryId);
        $.ajax({
            url: "{{ route('modifiers_category.new_modifiers_category') }}",
            type: "GET",
            dataType: "JSON",
            data: {
                "_token": "{{ csrf_token() }}",
                "modifiers_category_id": modifiersCategoryId
            },
            success: function(response) {
                // alert("Response: " + response);
                // alert("Response: " + JSON.parse(JSON.stringify(response)));
                let jsonData = JSON.parse(JSON.stringify(response));
                // alert(jsonData.modifiers_category.description + " : " + jsonData.modifiers.length);
                populateModifiersCategoryDetails(jsonData.modifiers_category, jsonData.modifiers);
            }
        })
    }

    function populateModifiersCategoryDetails(modifiersCategory, modifiers) {

        let table = document.createElement('table');
        table.className = 'table';

        if (modifiers.length > 0) {
            // Populate html table to display modifiers info
            // Display heading
            table.appendChild(getThead());
            // Display rows
            table.appendChild(getTbody(modifiers));
            enableDelete(modifiersCategory.modifiers_category_id);
            document.getElementById("modifiers_category_details_card_body").innerHTML = "";
            document.getElementById("modifiers_category_details_card_body").appendChild(table);
            document.getElementById("modifiers_category_details_card_main").style.display = "block";
        } else {
            document.getElementById("modifiers_category_details_card_main").style.display = "none";
        }
    }

    function getThead() {
        let thead = document.createElement('thead');

        let tr = document.createElement('tr');

        let td1 = document.createElement('td');
        let td2 = document.createElement('td');
        let td3 = document.createElement('td');
        let td4 = document.createElement('td');

        td1.appendChild(boldHTML("Name"));
        td2.appendChild(boldHTML("Price ex. Tax"));
        td3.appendChild(boldHTML("Price inc. Tax"));
        td4.appendChild(boldHTML("Actions"));

        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);

        thead.appendChild(tr);
        return thead;
    }

    function getTbody(modifiers) {
        let tbody = document.createElement('tbody');
        for (let key in modifiers) {
            let tr = document.createElement('tr');

            let td1 = document.createElement('td');
            let td2 = document.createElement('td');
            let td3 = document.createElement('td');
            let td4 = document.createElement('td');

            let text1 = document.createTextNode(modifiers[key]["description"]);
            let text2 = document.createTextNode(modifiers[key]["price_x_tax"]);
            let text3 = document.createTextNode(modifiers[key]["price_inc_tax"]);

            td1.appendChild(text1);
            td2.appendChild(text2);
            td3.appendChild(text3);

            // Create action buttons
            // Anchor for edit
            let iconEdit = document.createElement("i");
            iconEdit.setAttribute("class", "fas fa-edit");

            let urlEdit = '{{ route("modifier.edit", ":slug") }}';
            urlEdit = urlEdit.replace(':slug', modifiers[key]["modifier_id"]);

            let anchor = document.createElement("a");
            anchor.setAttribute("class", "btn btn-primary");
            anchor.setAttribute("href", urlEdit);
            // anchor.href = urlEdit;
            anchor.appendChild(iconEdit);
            td4.appendChild(anchor);

            // Button for delete
            let iconDelete = document.createElement("i");
            iconDelete.setAttribute("class", "fas fa-trash");

            let urlDelete = '{{ route("modifier.destroy", ":slug") }}';
            urlDelete = urlDelete.replace(':slug', modifiers[key]["modifier_id"]);

            let button = document.createElement("button");
            button.setAttribute("type", "button");
            button.setAttribute("class", "btn btn-danger btn-delete");
            button.setAttribute("data-url", urlDelete);
            button.appendChild(iconDelete);
            td4.appendChild(button);

            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);

            tbody.appendChild(tr);
        }
        return tbody;
    }

    function enableDelete(modifiersCategoryId) {
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
                text: "Do you really want to delete this modifier?",
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
                            // let url = "{{ route('modifiers_category.show', ':slug') }}";
                            // url = url.replace(':slug', modifiersCategoryId);
                            // document.modifiers_category.href = url;
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
        let x = document.getElementById("modifier_card_main");
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