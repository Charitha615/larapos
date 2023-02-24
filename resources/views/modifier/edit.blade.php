@extends('layouts.admin')

@section('title', 'Edit Modifier')
@section('content-header', 'Edit Modifier')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('modifier.update', $modifier_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="modifiers_category_id">Modifiers Category</label>
                <select name="modifiers_category_id" class="form-control @error('modifiers_category_id') is-invalid @enderror" id="modifiers_category_id">
                    @foreach($modifiers_category_list as $cat)
                    <option value="{{$cat->modifiers_category_id}}" {{$cat->modifiers_category_id == $modifier->modifiers_category_id ? 'selected' : ''}}>{{$cat->description}}</option>
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
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description" value="{{ old('description', $modifier->description) }}">
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="price_x_tax">Price ex. Tax</label>
                <input type="number" min="0" step="0.01" name="price_x_tax" class="form-control @error('price_x_tax') is-invalid @enderror" id="price_x_tax" placeholder="Price ex. Tax" value="{{ old('price_x_tax', $modifier->price_x_tax) }}">
                @error('price_x_tax')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="price_inc_tax">Price inc. Tax</label>
                <input type="number" min="0" step="0.01" name="price_inc_tax" class="form-control @error('price_inc_tax') is-invalid @enderror" id="price_inc_tax" placeholder="Price inc. Tax" value="{{ old('price_inc_tax', $modifier->price_inc_tax) }}">
                @error('price_inc_tax')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Update</button>
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

        td1.appendChild(boldHTML("Name"));
        td2.appendChild(boldHTML("Price ex. Tax"));
        td3.appendChild(boldHTML("Price inc. Tax"));

        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);

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

            let text1 = document.createTextNode(modifiers[key]["description"]);
            let text2 = document.createTextNode(modifiers[key]["price_x_tax"]);
            let text3 = document.createTextNode(modifiers[key]["price_inc_tax"]);

            td1.appendChild(text1);
            td2.appendChild(text2);
            td3.appendChild(text3);

            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);

            tbody.appendChild(tr);
        }
        return tbody;
    }

    function boldHTML(text) {
        var element = document.createElement("b");
        element.innerHTML = text;
        return element;
    }

    function createElementFromHTML(htmlString) {
        var div = document.createElement('div');
        div.innerHTML = htmlString.trim();

        // Change this to div.childNodes to support multiple top-level nodes
        return div.firstChild;
    }
</script>

@endsection