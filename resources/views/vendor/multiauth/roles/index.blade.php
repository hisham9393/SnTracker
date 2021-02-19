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
            Roles
            @permitTo('CreateRole')
            <span class="float-right">
                <a href="{{ route('admin.role.create') }}" class="btn btn-sm btn-success">New Role</a>
            </span>
            @endpermitTo
        </div>

        <div class="card-body">
            @include('multiauth::message')
            <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Role Name</th>
                        <th>Admins</th>
                        <th>Permissions</th>
                        <th style="width: 40px">Delete</th>
                        <th style="width: 40px">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>

                        <td>{{$loop->iteration}}</td>
                        <td>{{ $role->name }}</td>
                        <td><span class="badge badge-primary badge-pill">{{ $role->admins->count() }} {{
                                ucfirst(config('multiauth.prefix')) }}</span></td>
                        <td> <span class="badge badge-warning badge-pill">{{ $role->permissions->count() }}
                                Permissions</span></td>
                        <td>@if($role->name <>'super')
                                @permitTo('DeleteRole,UpdateRole')
                                <a href="" class="btn btn-sm btn-secondary mr-3" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">Delete</a>
                                <form id="delete-form-{{ $role->id }}" action="{{ route('admin.role.delete',$role->id) }}" method="POST" style="display: none;">
                                    @csrf @method('delete')
                                </form>
                                @endpermitTo
                                @else
                                <a href="" class="btn btn-sm btn-secondary mr-3 disabled" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">Delete</a>
                                <form id="delete-form-{{ $role->id }}" action="{{ route('admin.role.delete',$role->id) }}" method="POST" style="display: none;">
                                    @csrf @method('delete')
                                </form>
                                @endif</td>
                        <td> @if($role->name <>'super')

                                @permitTo('UpdateRole')
                                <a href="{{ route('admin.role.edit',$role->id) }}" class="btn btn-sm btn-primary mr-3">Edit</a>
                                @endpermitTo
                                @else
                                <a href="{{ route('admin.role.edit',$role->id) }}" class="btn btn-sm btn-primary mr-3 disabled ">Edit</a>
                                @endif</td>

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