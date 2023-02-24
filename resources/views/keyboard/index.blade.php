@extends('layouts.admin')

@section('title', 'Keyboard List')
@section('content-header', 'Keyboard List')
@section('content-actions')
<a href="{{route('keyboard.create')}}" class="btn btn-primary">Add Keyboard</a>
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
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keyboards as $keyboard)
                <tr>
                    <td>{{$keyboard->description}}</td>
                    <td>
                        <a href="{{ route('keyboard.edit', $keyboard) }}" class="btn btn-sm btn-link"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('keyboard.get_sub_departments', 
                                    ['keyboard_id' => $keyboard->keyboard_id] ) }}" class="btn btn-sm btn-link"><i class="fas fa-eye"></i></a>
                        <button class="btn btn-sm btn-link btn-delete" data-url="{{route('keyboard.destroy', $keyboard)}}"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $keyboards->render() }}
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
                text: "Do you really want to delete this Keyboard?",
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
        let actionIndex = "{{ route('keyboard.search') }}";
        formSearch.setAttribute("action", actionIndex);
    }
</script>
@endsection