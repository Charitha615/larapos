@extends('layouts.admin')

@section('title', 'Keyboard Details')
@section('content-header', 'Keyboard Details')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/fstdropdown.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap-colorpalette.css') }}">
<link rel="stylesheet" href="{{ asset('css/example.css') }}">
<style>
td {
    overflow:hidden;
}

td img {
    width: 50px;
    height: 50px;
}

td div {
    width: 120px;
    height: 80px;
    overflow:hidden;
    font-size: 12px;
    border: 1px solid #fff;
    margin: 5px;
    border-radius: 5px;
    background-color: #dee3de;
}

.item-anchor {
    display: block; 
    color:#fff;
    width: 120px;
    height: 80px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
}

div p {
    text-align: center;
    justify-content: center;
}

</style>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-4">
                <strong>Keyboard Name: </strong>
                {{ $data['keyboard_description'] }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Department Name: </strong>
                {{ $data['keyboard_department_name'] }} 
            </div>
            <div class="col-md-6">
                <strong>Sub Department Name: </strong>
                {{ $data['keyboard_sub_department_name'] }}  
            </div>
        </div>
        <table>
            <tbody>
               <tr>                   
                   @for ($i = 0; $i < 6; $i++)
                        @if ($i <= (sizeof($data['keyboard_sub_departments']) - 1))
                            <td 
                                ondblclick="onSubDepartmentGridClick('{{ $data['keyboard_sub_departments'][$i]->keyboard_sub_department_id }}')">
                                <div style="background-color:#98adf5;">
                                    <p class="item-anchor">
                                        <span onclick="subDepClick('{{$data['keyboard_id']}}','{{ $data['keyboard_department_id'] }}', '{{$data['keyboard_sub_departments'][$i]->keyboard_sub_department_id}}')">
                                            {{ $data['keyboard_sub_departments'][$i]->sub_department_name }}
                                        </span>    
                                    </p>
                                </div>
                            </td> 
                        @elseif ($i == 5)
                            <td></td>
                        @else
                            <td ondblclick="onSubDepartmentGridClick('', '{{ $i }}')">
                                <div style="background-color:#98adf5;"></div>
                            </td> 
                        @endif
                    @endfor
                </tr>
                @php
                    $count = 0;
                @endphp
               @for ($i = 0; $i < 8; $i++) 
               @if ($i <= (sizeof($data['keyboard_departments']) - 1))
                    <tr>
                       @for ($j = 0; $j < 6; $j++)
                        @if ($j == 5)
                            <td 
                                ondblclick="onDepartmentGridClick('{{ $data['keyboard_departments'][$i]->keyboard_department_id }}','{{$count}}')">
                                <div style="background-color:#50ba4e;">
    
                                    <p class="item-anchor" >
                                        <span onclick="depClick('{{$data['keyboard_id']}}', '{{$data['keyboard_departments'][$i]->keyboard_department_id}}')">
                                            {{ $data['keyboard_departments'][$i]->department_name }}
                                        </span>
                                    </p>
                                </div>
                                </div>
                            </td>
                        @else
                            @php
                                $caption = "";
                                $keyboard_item_id = "";
                                $css = "";
                            @endphp
                            @foreach ($data['keyboard_items'] as $keyboard_item)
                                @if ($keyboard_item->position == $count) 
                                    @php
                                        $keyboard_item_id = $keyboard_item->keyboard_item_id;
                                        $caption = $keyboard_item->caption;

                                        $color = '#' . $keyboard_item->color;

                                        $bg_image = $keyboard_item->key_image;
                                        $modify_option = $keyboard_item->modify_option;

                                        if ($modify_option == 'image') 
                                            $css = "background-image: url(".asset('/keyboard_item_images/'.$bg_image)."); background-size: cover; background-repeat: no-repeat;";
                                        else if ($modify_option == 'color')
                                            $css = "background-color: ".$color;
                                        else
                                            $css = "background-color: #dee3de";
                                    @endphp
                                @endif 
                            @endforeach
                            <td 
                                ondblclick="onItemGridClick('{{ $keyboard_item_id }}', '{{ $count }}')">
                                <div style="{{ $css }}">
                                    <p  class="item-anchor text-dark">{{ $caption }}</p>
                                </div>
                            </td>
                         @php
                          $count++;
                         @endphp
                        @endif
                       @endfor
                    </tr>
               @else
                    <tr>
                       @for ($j = 0; $j < 6; $j++)
                            @if ($j == 5)
                                <td></td>
                            @else
                                @php
                                    $caption = "";
                                    $keyboard_item_id = "";
                                    $css = "";
                                @endphp
                                @foreach ($data['keyboard_items'] as $keyboard_item)
                                    @if ($keyboard_item->position == $count) 
                                        @php
                                        $keyboard_item_id = $keyboard_item->keyboard_item_id;
                                        $caption = $keyboard_item->caption;

                                        $color = '#' . $keyboard_item->color;

                                        $bg_image = $keyboard_item->key_image;
                                        $modify_option = $keyboard_item->modify_option;

                                        if ($modify_option == 'image') 
                                            $css = "background-image: url(".asset('/keyboard_item_images/'.$bg_image)."); background-size: cover; background-repeat: no-repeat;";
                                        else if ($modify_option == 'color')
                                            $css = "background-color: ".$color;
                                        else
                                            $css = "background-color: #dee3de";
                                        @endphp
                                    @endif 
                                @endforeach
                                <td 
                                    ondblclick="onItemGridClick('{{ $keyboard_item_id }}', '{{ $count }}')">
                                    <div style="{{ $css }}">
                                        <p>{{ $caption }}</p>
                                    </div>
                                </td>
                                @php
                                    $count++;
                                @endphp
                            @endif
                       @endfor
                    </tr>
               @endif
               @endfor
            </tbody>
        </table>
    </div>
</div>

<!-- ------------------- Modals----------------------- -->

<!-- Sub-Department Modal Start  -->
<div class="modal fade" id="set_sub_department_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Set Sub Department</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="POST" id="keyboard_sub_department_form">
                @csrf
                <input type="hidden" id="sub_dep_id" name="sub_dep_id">
                <input type="hidden" id="position" name="position">
                <div class="form-group">
                    <label for="sub_department" class="col-form-label">Sub Department Name:</label>
                    <input type="text" class="form-control" id="sub_department" name="sub_department_name">
                </div>
                <div class="row modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="onDeleteClick('subDep')">Delete</button>
                    <button type="submit" class="btn btn-primary">Set</button>
                </div>
            </form>
        </div>
      </div>
    </div>
    <input type="hidden" id="keyboard_sub_department_id_txt">
</div>
<!-- Sub-Department Modal End  -->

<!-- Department Modal Start  -->
<div class="modal fade" id="set_department_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Set Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="keyboard_department_form">
            @csrf
            <input type="hidden" id="dep_id" name="dep_id">
          <div class="form-group">
            <label for="department" class="col-form-label">Department Name:</label>
            <input type="text" class="form-control" id="department" name="department_name">
          </div>
          <div class="row modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="onDeleteClick('dep')">Delete</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <input type="hidden" id="keyboard_department_id_txt">
</div>
<!-- Department Modal End  -->

<!-- Item Modal Start  -->
<div class="modal fade" id="set_item_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Set Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="POST" enctype="multipart/form-data" 
              id="keyboard_item_form">
              @csrf
  
              <input type="hidden" id="keyboard_id" name="keyboard_id"
                  value="{{ $data['keyboard_id'] }}">
  
              <input type="hidden" id="keyboard_department_id" name="keyboard_department_id"
                  value="{{ $data['keyboard_department_id'] }}">
  
              <input type="hidden" id="keyboard_sub_depatment_id" name="keyboard_sub_depatment_id"
                  value="{{ $data['keyboard_sub_department_id'] }}">
  
              <input type="hidden" id="position_id" name="position"
                  value="">
              <input type="hidden" id="item_text" name="item_text"
                  value="">
              <input type="hidden" id="old_img" name="old_img"
                  value="">

            <div class="form-group">
              <label for="item" class="col-form-label">Item</label>
              <select class="fstdropdown-select" id="item" name="item_id" onchange="setItemText()">
                  @foreach ($data['items'] as $item)
                      <option value="{{ $item->item_id }}">{{ $item->description }}</option>
                  @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="caption" class="col-form-label">Caption:</label>
              <input type="text" class="form-control" id="caption" name="caption">
            </div>
            <div class="form-group">
              <label for="background_color" class="col-form-label">Background Color:</label>
              <input id="background_color" name="color">
              <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown">Color</a>
              <ul class="dropdown-menu">
                  <li><div id="colorpalette1"></div></li>
              </ul>
            </div>
            <div class="form-group">
              <label for="background_image" class="col-form-label">Background Image:</label>
              <input type="file" class="form-control" id="background_image" name="key_image" value="">
            </div>
            <div class="form-group">
              <label for="modify_option" class="col-form-label">Modify Option:</label><br>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="modify_option" id="color" value="color"
                  checked>
                  <label class="form-check-label" for="color">
                      Color
                  </label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="modify_option" id="image" value="image">
                  <label class="form-check-label" for="image">
                      Image
                  </label>
              </div>
              <div class="form-check form-check-inline">
              <button type="button" class="btn btn-dark" onclick="onClearClick()">Clear</button>
              </div>
            </div>
            <div class="row modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="onDeleteClick('item')">Delete</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <input type="hidden" id="keyboard_item_id_txt">
</div>
<!-- Item Modal End  -->


@endsection

@section('js')
<script src="{{ asset('js/fstdropdown.js') }}"></script>
<script src="{{ asset('js/bootstrap-colorpalette.js') }}"></script>

<script type="text/javascript">
    $('#colorpalette1').colorPalette()
        .on('selectColor', function(e) {
        $('#background_color').val(e.color);
    });

    function onSubDepartmentGridClick(keyboard_sub_department_id, position) {
        if (keyboard_sub_department_id != "") {
            //get keyboard sub depatment data
            $.ajax({
                url: "/admin/get_sub_department/" + keyboard_sub_department_id,
                type: "GET",
                dataType: "JSON",
                success: function(response) {
                    let jsonData = response.data;
                    $("#sub_department").val(jsonData.sub_department_name);
                    
                }
            });
            //change form action to update data
            $('#keyboard_sub_department_form').attr('action', '/admin/update_keyboard_sub_department');
            $("#keyboard_sub_department_id_txt").val(keyboard_sub_department_id);
            $("#sub_dep_id").val(keyboard_sub_department_id);
        } else {
            $("#sub_department").val("");
            $("#position").val(position);
            $("#sub_dep_id").val('{{ $data['keyboard_department_id'] }}');
            //change form action to add data
            $('#keyboard_sub_department_form').attr('action', '/admin/store_keyboard_sub_department');
        }
        $("#set_sub_department_model").modal("show");
    }

    function onDepartmentGridClick(keyboard_department_id,count) {
        event.stopImmediatePropagation();
        if (keyboard_department_id != "") {
            //get keyboard depatment data
            $.ajax({
                url: "/admin/get_department/" + keyboard_department_id,
                type: "GET",
                dataType: "JSON",
                success: function(response) {
                    let jsonData = response.data;
                    $("#department").val(jsonData.department_name);
                    console.log(jsonData.department_name);
                    
                }
            });
            //change form action to update data
            $('#keyboard_department_form').attr('action', '/admin/update_keyboard_department');
        }
        $("#keyboard_department_id_txt").val(keyboard_department_id);
        $("#dep_id").val(keyboard_department_id);
        $("#set_department_model").modal("show");
    }

    function onItemGridClick(keyboard_item_id, position) {
        if (keyboard_item_id != "") {
            //get keyboard item data
            $.ajax({
                url: "/admin/keyboard_item/" + keyboard_item_id,
                type: "GET",
                dataType: "JSON",
                success: function(response) {
                    let jsonData = response.keyboard_item;
                    // document.getElementById("item").fstdropdown.setValue(jsonData.item_id);

                    $("#caption").val(jsonData.caption);
                    
                    if (jsonData.color == "")
                        $("#background_color").val("#ffffff");
                    else 
                        $("#background_color").val("#" + jsonData.color);

                    $("input[name=modify_option][value=" + jsonData.modify_option + "]").prop('checked', true);

                    //set old image
                    $("#old_img").val(jsonData.key_image);
                }
            });

            //change form action to update data
            $('#keyboard_item_form').attr('action', '/admin/keyboard_item/'+ keyboard_item_id);
            $("#keyboard_item_id_txt").val(keyboard_item_id);
            $("#position_id").val(position);
        } else {
            //change form action to add data
            $('#keyboard_item_form').attr('action', '/admin/keyboard_item');
            $("#position_id").val(position);
            //set old image
            $("#old_img").val("");
        }

        $("#set_item_model").modal("show");
    }
    function setItemText() {
        $("#item_text").val($("#item option:selected").text());
    }

    function onDeleteClick(toDelete) {
        if (toDelete == 'subDep') {
            let keyboard_sub_dep_id = $("#sub_dep_id").val();
            console.log(keyboard_sub_dep_id);
            if (keyboard_sub_dep_id != "") {
                $('#keyboard_sub_department_form').attr('action', '/admin/keyboard_sub_department/delete/' + keyboard_sub_dep_id);
                $('#keyboard_sub_department_form').submit();
            } 
        } else if (toDelete == 'dep') {
            let keyboard_dep_id = $("#keyboard_department_id_txt").val();
            if (keyboard_dep_id != "") {
                $('#keyboard_department_form').attr('action', '/admin/delete_department/' + keyboard_dep_id);
                $('#keyboard_department_form').submit();
            }
        } else if (toDelete == 'item') {
            let keyboard_item_id = $("#keyboard_item_id_txt").val();
            if (keyboard_item_id != "") {
                $('#keyboard_item_form').attr('action', '/admin/keyboard_item/delete/' + keyboard_item_id);
                $('#keyboard_item_form').submit();
            }
        }
        
    }

    function onClearClick() {
        $('input[name=modify_option]').prop('checked',false);
    }

    function subDepClick(keyboardId,depId,subDepId) {
        let route = "{{ route('keyboard.get_sub_departments', ':keyboardId') }}";
        let url = route.replace(':keyboardId', keyboardId);
        url = url + '/' + depId + '/'+ subDepId;
        window.location.href = url;
    }

    function depClick(keyboardId,depId) {
        let route = "{{ route( 'keyboard.get_sub_departments', ':keyboardId' ) }}";
        let url = route.replace(':keyboardId', keyboardId);
        url = url + '/' + depId;
        window.location.href = url;
    }

</script>
@endsection