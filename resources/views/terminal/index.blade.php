@extends('layouts.admin')

@section('title', 'Terminal List')
@section('content-header', 'Terminal List')
@section('content-actions')
<a href="{{route('terminal.create')}}" class="btn btn-primary">Add Terminal</a>
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
                    <th>Terminal ID</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($terminal_list as $terminal)
                <tr>
                    <td>{{$terminal->terminal_id}}</td>
                    <td>{{$terminal->description}}</td>
                    <td>{{$location_list->firstWhere('location_id', $terminal->location_id)->location_name}}</td>
                    <td>
                        <a href="{{ route('terminal.show', $terminal->terminal_id) }}" class="btn btn-sm btn-link"><i class="fas fa-info"></i></a>
                        <a href="{{ route('terminal.edit', $terminal->terminal_id) }}" class="btn btn-sm btn-link"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-sm btn-link btn-delete" data-url="{{ route('terminal.destroy', $terminal->terminal_id) }}"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $terminal_list->render() }}
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
                text: "Do you really want to delete this Terminal?",
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
        let actionIndex = "{{ route('terminal.search') }}";
        formSearch.setAttribute("action", actionIndex);
    }
</script>
@endsection