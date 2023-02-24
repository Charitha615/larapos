@extends('layouts.admin')

@section('title', 'Modifiers Category List')
@section('content-header', 'Modifiers Category List')
@section('content-actions')
<a href="{{route('modifiers_category.create')}}" class="btn btn-primary">Add Modifiers Category</a>
<a href="{{route('modifier.create')}}" class="btn btn-primary">Add Modifier</a>
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
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($modifiers_categories as $modifiers_category)
                <tr>
                    <td>{{$modifiers_category->description}}</td>
                    <td>
                        <a href="{{ route('modifiers_category.show', $modifiers_category->modifiers_category_id) }}" class=" btn btn-sm btn-link"><i class="fas fa-info"></i></a>
                        <a href="{{route('modifier.create')}}" class=" btn btn-sm btn-link"><i class="fas fa-plus"></i></a>
                        <button class=" btn btn-sm btn-link btn-delete" data-url="{{route('modifiers_category.destroy', $modifiers_category)}}"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $modifiers_categories->render() }}
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
                text: "Do you really want to delete this Modifiers Category?",
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
        let actionIndex = "{{ route('modifiers_category.search') }}";
        formSearch.setAttribute("action", actionIndex);
    }
</script>
@endsection