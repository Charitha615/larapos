@extends('layouts.admin')

@section('title', 'Accounts List')
@section('content-header', 'Accounts List')
@section('content-actions')
<a href="{{route('account.create')}}" class="btn btn-primary">Add Account</a>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Card Number</th>
                    <th>Store Credit</th>
                    <th>Phone No</th>
                    <th>Mobile No</th>
                    <th>Email Address</th>
                    <th>Discount ()%</th>
                    <th>Address</th>
                    <th>Suburb</th>
                    <th>State</th>
                    <th>Post Code</th>
                    <th>Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                <tr>
                    <td>{{$account->first_name}}</td>
                    <td>{{$account->last_name}}</td>
                    <td>{{$account->card_number}}</td>
                    <td>{{$account->store_credit}}</td>
                    <td>{{$account->phone_no}}</td>
                    <td>{{$account->mobile_no}}</td>
                    <td>{{$account->email_address}}</td>
                    <td>{{$account->discount}}</td>
                    <td>{{$account->address}}</td>
                    <td>{{$account->suburb}}</td>
                    <td>{{$account->state}}</td>
                    <td>{{$account->post_code}}</td>
                    <td>{{$account->notes}}</td>
                    <td>
                        <a href="{{ route('account.edit', $account) }}" class="btn btn-sm btn-link"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-sm btn-link btn-delete" data-url="{{route('account.destroy', $account)}}"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $accounts->render() }}
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
                text: "Do you really want to delete this Account?",
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