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
            {{ ucfirst(config('multiauth.prefix')) }} List
            @permitToParent('Admin')
            <span class="float-right">
                <a href="{{route('admin.register')}}" class="btn btn-sm btn-success">New {{ ucfirst(config('multiauth.prefix')) }}</a>
            </span>
            @endpermitTo
        </div>
        <div class="card-body">
            @include('multiauth::message')

            <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Admin Name</th>
                        <th>Admin Mail</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th style="width: 40px">Delete</th>
                        <th style="width: 40px">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td> <span class="badge">
                                @foreach ($admin->roles as $role)
                                <span class="badge-warning badge-pill ml-2">
                                    {{ $role->name }}
                                </span> @endforeach
                            </span></td>
                        <td>{{ $admin->active? 'Active' : 'Inactive' }}</td>
                        <td> @if($admin->name <>'Super Admin')
                                <a href="#" class="btn btn-sm btn-secondary mr-3" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();">Delete</a>
                                <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.delete',[$admin->id]) }}" method="POST" style="display: none;">
                                    @csrf @method('delete')
                                </form>
                                @else
                                <a href="#" class="btn btn-sm btn-secondary mr-3 disabled" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();">Delete</a>
                                <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.delete',[$admin->id]) }}" method="POST" style="display: none;">
                                    @csrf @method('delete')
                                </form>
                                @endif
                        </td>
                        <td>

                            @if($admin->name <>'Super Admin')
                                <a href="{{route('admin.edit',[$admin->id])}}" class="btn btn-sm btn-primary mr-3 ">Edit</a>
                                @else
                                <a href="{{route('admin.edit',[$admin->id])}}" class="btn btn-sm btn-primary mr-3 disabled ">Edit</a>
                                @endif
                        </td>
                    </tr>
                    @endforeach @if($admins->count()==0)
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