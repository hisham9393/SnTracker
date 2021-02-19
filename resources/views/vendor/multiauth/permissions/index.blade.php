@extends('adminPanel.app')
@section('head')

<!-- DataTables -->
<link rel="stylesheet" href="{{asset('adminLinks/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="{{asset('adminLinks/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}" />
@endsection
@section('main-content')
<div class="container">

    <div class="card">
        <div class="card-header bg-info text-white">
            permissions

            <span class="float-right">
                <a href="" class="btn btn-sm btn-success">New permission</a>
            </span>

        </div>

        <div class="card-body">
            @include('multiauth::message')
            <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>permission Name</th>
                        <th>Permissions</th>
                        <th style="width: 40px">Delete</th>
                        <th style="width: 40px">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                    <tr>

                        <td>{{$loop->iteration}}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->parent }}</td>
                        <td>
                            <a href="" class="btn btn-sm btn-secondary mr-3">Delete</a>

                        <td>
                            <a href="" class="btn btn-sm btn-primary mr-3">Edit</a>


                    </tr>
                    @endforeach
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