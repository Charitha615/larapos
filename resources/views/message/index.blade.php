@extends('layouts.admin')

@section('title', 'Message List')
@section('content-header', 'Message List')
@section('content-actions')
<a href="{{route('message.create')}}" class="btn btn-primary">Add Message</a>
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
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                <tr>
                    <td>{{$message->description}}</td>
                    <td>
                        <a href="{{ route('message.edit', $message) }}" class="btn btn-sm btn-link"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-sm btn-link btn-delete" data-url="{{route('message.destroy', $message)}}"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $messages->render() }}
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
                text: "Do you really want to delete this Message?",
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
        let actionIndex = "{{ route('message.search') }}";
        formSearch.setAttribute("action", actionIndex);
    }
</script>
@endsection