@extends('layouts.admin')

@section('title', 'User List')
@section('content-header', 'User List')
@section('content-actions')
<a href="{{route('user.create')}}" class="btn btn-primary">Add User</a>
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
                    <th>Employee Number</th>
                    <th>Name</th>
                    <th>Branch</th>
                    <th>User Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user_list as $user)
                <tr>
                    <td>{{$user->employee_number}}</td>
                    <td>{{$user->first_name}}&nbsp;{{$user->last_name}}</td>
                    <td>{{$branch_list->firstWhere('branch_id', $user->branch_id)->branch_name}}</td>
                    <td>{{$role_list->firstWhere('role_id', $user->role_id)->role_name}}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-link"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-sm btn-link btn-delete" data-url="{{ route('user.destroy', $user->id) }}"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $user_list->render() }}
        <form action="{{ route('logout') }}" method="POST" id="logout-form">
            @csrf
        </form>
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
            var loginId = <?php echo $login_id; ?>;
            var swalText = "Do you really want to delete this User details?"
            if ($(this).attr('data-url').endsWith("/" + loginId)) {
                var swalText = "Do you really want to delete YOURSELF?";
            }
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: swalText,
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
                            let jsonData = JSON.parse(JSON.stringify(res));
                            if (loginId == jsonData.deleted_id) {
                                // alert("Deleted ID is SAME as Logged in ID!");
                                document.getElementById('logout-form').submit();
                            }
                        })
                    })
                }
            })
        })
    })

    function enableSearch() {
        let formSearch = document.getElementById("form_search");
        formSearch.style.display = "block";
        let actionIndex = "{{ route('user.search') }}";
        formSearch.setAttribute("action", actionIndex);
    }
</script>
@endsection