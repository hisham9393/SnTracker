@extends('adminPanel.app')
@section('head')

<!-- DataTables -->
<link rel="stylesheet" href="{{asset('adminLinks/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="{{asset('adminLinks/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}" />
@endsection
@section('main-content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Customer List
            @permitTo('CreateCustomer')
            <span class="float-right">
                <a href="{{route('customer.create')}}" class="btn btn-sm btn-success">New Customer</a>
            </span>
            @endpermitTo
        </div>
        <div class="card-body">
            @include('multiauth::message')

            <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Status</th>
                        @permitTo('DeleteCustomer')
                        <th style="width: 40px">Delete</th>
                        @endpermitTo
                        @permitTo('UpdateCustomer')
                        <th style="width: 40px">Edit</th>
                        @endpermitTo
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $customer->code }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->active? 'Active' : 'Inactive' }}</td>
                        @permitTo('DeleteCustomer')
                        <td><a href="#" class="btn btn-sm btn-danger mr-3" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $customer->id }}').submit();">Delete</a>
                            <form id="delete-form-{{ $customer->id }}" action="{{ route('customer.destroy',[$customer->id]) }}" method="POST" style="display: none;">
                                @csrf @method('delete')
                            </form>
                        </td>
                        @endpermitTo



                        @permitTo('UpdateCustomer')
                        <td>
                            <a href="{{route('customer.edit',[$customer->id])}}" class="btn btn-sm btn-primary mr-3 ">Edit</a>
                        </td>
                        @endpermitTo

                        @endforeach @if($customers->count()==0)
                        <p>No {{ config('multiauth.prefix') }} created Yet, only super {{ config('multiauth.prefix') }} is available.</p>
                        @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('footer')
<!-- DataTables -->
<script src="{{asset('adminLinks/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminLinks/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminLinks/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminLinks/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            responsive: true,
            autoWidth: false,
        });
        $("#example2").DataTable({
            paging: true,
            lengthChange: false,
            searching: false,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
        });
    });
</script>
@endsection