@extends('layouts.admin')

@section('title', 'Item List')
@section('content-header', 'Item List')
@section('content-actions')
<a href="{{route('item.create')}}" class="btn btn-primary">Add Item</a>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>@sortablelink('description')</th>
                    <th>@sortablelink('plu_no')</th>
                    <th>Department</th>
                    <th>Price Inc-tax</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{$item->description}}</td>
                    <td>{{$item->plu_no}}</td>
                    <td>{{$item->department_id > 0 ? $departments->firstWhere('department_id', $item->department_id)->department_name : ""}}</td>
                    <td>{{count($itemPriceLevelLocations) > 0 ? $itemPriceLevelLocations->firstWhere('item_id', $item->item_id)->inc_tax : ''}}</td>
                    <td>
                        <a href="{{ route('item.edit', $item) }}" class="btn btn-sm btn-link"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-sm btn-link btn-delete" data-url="{{route('item.destroy', $item)}}"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $items->render() }}
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        enableSearch();
        
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
                text: "Do you really want to delete this Item with all associated details?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                reverseButtons: false
            }).then((result) => {
                if (result.value) {
                    $.post($this.data('url'), {
                        _method: 'DELETE',
                        _token: '{{csrf_token()}}'
                    }, function(res) {
                        $this.closest('tr').fadeOut(500, function() {
                            $(this).remove();
                        })
                    })
                }
            })
        })
    })

    function enableSearch() {
        let formSearch = document.getElementById("form_search");
        formSearch.style.display = "block";
        let actionIndex = "{{ route('item.search') }}";
        formSearch.setAttribute("action", actionIndex);
    }
    $('#search').on('keyup',function(){
        let timer;
        clearTimeout(timer);
        timer = setTimeout(function(){
            if ($('#search').val()) {
                document.getElementById("form_search").submit();
            }
        }, 2000);
    });
</script>
@endsection