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
            @permitTo('CreateSerialNumber')
            <span class="float-right">
                <a href="{{route('SerialNumber.create')}}" class="btn btn-sm btn-success">New Serial Number</a>
            </span>
            @endpermitTo
        </div>
        <div class="card-body">
            @include('multiauth::message')

            <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Invoice#</th>
                        <th>Serial Number</th>
                        <th>Product</th>
                        @permitTo('DeleteSerialNumber')
                        <th style="width: 40px">Delete</th>
                        @endpermitTo
                        @permitTo('UpdateSerialNumber')
                        <th style="width: 40px">Edit</th>
                        @endpermitTo
                    </tr>
                </thead>
                <tbody>
                    @foreach ($SerialNumbers as $SerialNumber)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $SerialNumber->invoice }}</td>
                        <td>{{ $SerialNumber->SerialNumber }}</td>

                        <td>
                            @foreach ($SerialNumber->products as $product)
                            {{ $product->name }}
                            @endforeach
                        </td>
                        </td>
                        @permitTo('DeleteSerialNumber')
                        <td><a href="#" class="btn btn-sm btn-danger mr-3" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $SerialNumber->id }}').submit();">Delete</a>
                            <form id="delete-form-{{ $SerialNumber->id }}" action="{{ route('SerialNumber.destroy',[$SerialNumber->id]) }}" method="POST" style="display: none;">
                                @csrf @method('delete')
                            </form>
                        </td>
                        @endpermitTo



                        @permitTo('UpdateSerialNumber')
                        <td>
                            <a href="{{route('SerialNumber.edit',[$SerialNumber->id])}}" class="btn btn-sm btn-primary mr-3 ">Edit</a>
                        </td>
                        @endpermitTo

                        @endforeach @if($SerialNumbers->count()==0)
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