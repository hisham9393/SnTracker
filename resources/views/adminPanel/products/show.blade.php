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
            @permitTo('CreateProduct')
            <span class="float-right">
                <a href="{{route('product.create')}}" class="btn btn-sm btn-success">New Product</a>
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
                        @permitTo('DeleteProduct')
                        <th style="width: 40px">Delete</th>
                        @endpermitTo
                        @permitTo('UpdateProduct')
                        <th style="width: 40px">Edit</th>
                        @endpermitTo
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->status? 'Active' : 'Inactive' }}</td>
                        @permitTo('DeleteProduct')
                        <td><a href="#" class="btn btn-sm btn-danger mr-3" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();">Delete</a>
                            <form id="delete-form-{{ $product->id }}" action="{{ route('product.destroy',[$product->id]) }}" method="POST" style="display: none;">
                                @csrf @method('delete')
                            </form>
                        </td>
                        @endpermitTo



                        @permitTo('UpdateProduct')
                        <td>
                            <a href="{{route('product.edit',[$product->id])}}" class="btn btn-sm btn-primary mr-3 ">Edit</a>
                        </td>
                        @endpermitTo

                        @endforeach @if($products->count()==0)
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