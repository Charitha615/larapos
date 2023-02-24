@extends('layouts.admin')

@section('title', 'Advertisements List')
@section('content-header', 'Advertisements List')
@section('content-actions')
<a href="{{route('advertisement.create')}}" class="btn btn-primary">Add Advertisement</a>
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
                    <th>Display Effect</th>
                    <th>No End Date</th>
                    <th>Start Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($advertisements as $advertisement)
                <tr>
                    <td>{{$advertisement->name}}</td>
                    <td>{{ucfirst($advertisement->display_effect)}}</td>
                    <td>{{$advertisement->no_end_date == 1 ? '✓' : ''}}</td>
                    <td>{{date_format(date_create($advertisement->start_date),"Y/m/d H:i:s")}}</td>
                    <td>
                        <a href="{{ route('advertisement.show', $advertisement->advertisement_id) }}" class="btn btn-sm btn-link"><i class="fas fa-info"></i></a>
                        <a href="{{ route('advertisement.edit', $advertisement) }}" class="btn btn-sm btn-link"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-sm btn-link btn-delete" data-url="{{route('advertisement.destroy', $advertisement)}}"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $advertisements->render() }}
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
                text: "Do you really want to delete this Advertisement?",
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
        let actionIndex = "{{ route('account.search') }}";
        formSearch.setAttribute("action", actionIndex);
    }
</script>
@endsection