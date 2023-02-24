@extends('layouts.admin')

@section('title', 'Edit Item')
@section('content-header', 'Edit Item')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('item.update', $item->item_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="description">Name</label>
                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Name" value="{{ old('description', $item->description) }}">
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="plu_no">PLU No.</label>
                    <input type="number" min="1" name="plu_no" readonly class="form-control @error('plu_no') is-invalid @enderror" id="plu_no" placeholder="PLU No." value="{{ old('plu_no', $item->plu_no) }}">
                    @error('plu_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="department_id">Department</label>
                    <select name="department_id" class="form-control @error('department_id') is-invalid @enderror" id="department_id">
                        <option value="" selected>Select</option>
                        @foreach($departments as $dept)
                        <option value="{{$dept->department_id}}" {{$dept->department_id == $item->department_id ? 'selected' : ''}}>{{$dept->department_name}}</option>
                        @endforeach
                    </select>
                    @error('department_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="supplier_id">Supplier</label>
                    <select name="supplier_id" class="form-control" id="supplier_id">
                        <option value="" selected>Select</option>
                        @foreach($suppliers as $supp)
                        <option value="{{$supp->supplier_id}}" {{$supp->supplier_id == $item->supplier_id ? 'selected' : ''}}>{{$supp->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="unit_id">Unit</label>
                    <select name="unit_id" class="form-control @error('unit_id') is-invalid @enderror" id="unit_id">
                        <option value="" selected>Select</option>
                        @foreach($units as $u)
                        <option value="{{$u->unit_id}}" {{$u->unit_id == $item->unit_id ? 'selected' : ''}}>{{$u->description}}</option>
                        @endforeach
                    </select>
                    @error('unit_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="number_of_units">Number of Units</label>
                    <input type="number" min="1" name="number_of_units" class="form-control" id="number_of_units" placeholder="Number of Units" value="{{ old('number_of_units', $item->number_of_units) }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tax_id">Tax</label>
                    <select name="tax_id" class="form-control @error('tax_id') is-invalid @enderror" id="tax_id">
                        <option value="" selected>Select</option>
                        @foreach($taxes as $t)
                        <option value="{{$t->tax_id}}" {{$t->tax_id == $item->tax_id ? 'selected' : ''}}>{{$t->description}} - {{$t->rate}}</option>
                        @endforeach
                    </select>
                    @error('tax_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="carton_cost">Carton Cost</label>
                    <input type="number" min="0" step="0.01" name="carton_cost" class="form-control" id="carton_cost" placeholder="Carton Cost" value="{{ old('carton_cost', $item->carton_cost) }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="checkbox">
                        <input type="checkbox" name="open_price" id="open_price" value="0" {{old('open_price', $item->open_price) == '1' ? 'checked' : ''}}>
                        &nbsp;<label for="open_price">Open Price</label>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="checkbox">
                        <input type="checkbox" name="open_description" id="open_description" value="0" {{old('open_description', $item->open_description) == '1' ? 'checked' : ''}}>
                        &nbsp;<label for="open_description">Open Description</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center">Price Level</th>
                                    <th class="text-center">Inc Tax</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($price_levels as $level)
                                @php
                                // $x_tax = $inc_tax = "";
                                if(isset($item_price_level_locations)){
                                // $item_price_level_location_id = $item_price_level_locations->firstWhere('price_level_id', $level->price_level_id)->item_price_level_location_id;
                                $x_tax = $item_price_level_locations->firstWhere('price_level_id', $level->price_level_id)->x_tax ?? "";
                                $inc_tax = $item_price_level_locations->firstWhere('price_level_id', $level->price_level_id)->inc_tax ?? "";
                                }
                                @endphp
                                <tr>
                                    <td>
                                        {{$level->description}}
                                        <input type="hidden" name="price_level_id[]" value="{{$level->price_level_id}}">
                                    </td>
                                    <td><input type="number" min="0" step="0.01" name="item_price_level[inc_tax][{{$level->price_level_id}}]" class="form-control" placeholder="" value="{{$inc_tax}}"></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center">Printer Group</th>
                                    <th class="text-center">Printers</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($printer_groups as $group)
                                <tr>
                                    <td>
                                        {{$group->description}}
                                    </td>
                                    @foreach ($printers as $printer)
                                    @php
                                    if($printer->printer_group_id == $group->printer_group_id){
                                    $checked = false;
                                    foreach ($item_printers as $ip){
                                    if(($ip->printer_id == $printer->printer_id)){
                                    $checked = true;
                                    break;
                                    }
                                    }
                                    @endphp
                                    <td>
                                        <div class="checkbox">
                                            <input type="checkbox" name="printer_id[]" value="{{$printer->printer_id}}" {{$checked ? 'checked' : ''}}>
                                            &nbsp;{{ $printer->description }}
                                        </div>
                                    </td>
                                    @php
                                    }
                                    @endphp
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="checkbox">
                        <input type="checkbox" name="modifier_popup" id="modifier_popup" value="0" {{old('modifier_popup', $item->modifier_popup) == '1' ? 'checked' : ''}}>
                        &nbsp;<label for="modifier_popup">Modifier Popup</label>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="checkbox">
                        <input type="checkbox" name="inc_price_in_kp" id="inc_price_in_kp" value="0" {{old('inc_price_in_kp', $item->inc_price_in_kp) == '1' ? 'checked' : ''}}>
                        &nbsp;<label for="inc_price_in_kp">Include Prices in KP Slip</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="card">
                    <div class="card-body">
                        <label>Modifiers</label>
                        <ul class="list-unstyled">
                            @foreach ($modifiers_categories as $categories)
                            @php
                            $checked = false;
                            foreach ($item_modifiers_categories as $im){
                            if(($im->modifiers_category_id == $categories->modifiers_category_id)){
                            $checked = true;
                            break;
                            }
                            }
                            @endphp
                            <li>
                                <input type="checkbox" name="modifiers_category_id[]" value="{{$categories->modifiers_category_id}}" {{$checked ? 'checked' : ''}}>
                                &nbsp;{{ $categories->description }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="no_of_dockets">Number of Dockets</label>
                    <input type="number" min="1" name="no_of_dockets" class="form-control" id="no_of_dockets" placeholder="Number of Dockets" value="{{ old('no_of_dockets', $item->no_of_dockets) }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="kp_description">KP Description</label>
                    <input type="text" name="kp_description" class="form-control @error('kp_description') is-invalid @enderror" id="kp_description" placeholder="KP Description" value="{{ old('kp_description', $item->kp_description) }}">
                    @error('kp_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Update</button>
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