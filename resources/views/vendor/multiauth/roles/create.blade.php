@extends('adminPanel.app')

@section('main-content')
<div class="container">

    <div class="card">
        <div class="card-header bg-info text-white">Add New Role</div>

        <div class="card-body">
            @include('multiauth::message')
            <form action="{{ route('admin.role.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="role">Role Name</label>
                    <input type="text" placeholder="Give an awesome name for role" name="name" class="form-control" id="role" required>
                </div>

                <div class="form-group">
                    <label for="role">Assign Permissions</label>
                    <div class="container">
                        <div class="card-body pl-5">
                            <label><input class="form-check-input" id="checkall" type="checkbox">
                                Select All
                            </label>
                        </div>
                        <div class="row">
                            <div class="row">
                                @foreach($permissions as $key => $value)
                                <div class="col-lg-12 mb-12">
                                    <div class="card-body">
                                        <div class="card-body p-0">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="table-success w-23">{{$key}}

                                                        </th>
                                                        <th class="table-success ">
                                                            <div class="pr-2">
                                                                <input class="form-check-input" id="" type="checkbox">
                                                                <label class="form-check-label">All</label>
                                                            </div>
                                                        </th>
                                                        @foreach($value as $permission)
                                                        <th class=" pl-4">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input checkitem" value="{{$permission->id}}" id="{{$permission->id}}">
                                                            <!-- <input class="form-check-input" type="checkbox" checked> -->
                                                            <label for="{{$permission->id}}" class="form-check-label">{{$permission->name}}</label>
                                                        </th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>

                                                        <!-- <td></td>
                                                    <td></td> -->

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Store</button>
                <a href="{{ route('admin.roles') }}" class="btn btn-sm btn-danger float-right">Back</a>
            </form>
        </div>

    </div>
    <!-- <div class="checkbox">
        <input type="checkbox" id="checkall">
        <label class="form-check-label">All</label>
    </div>
    <hr>
    <div class="checkbox">
        <input class="checkitem" type="checkbox">
        <label class="form-check-label">item 1</label>
    </div>
    <div class="checkbox">
        <input class="checkitem" type="checkbox">
        <label class="form-check-label">item 2</label>
    </div>
    <div class="checkbox">
        <input class="checkitem" type="checkbox">
        <label class="form-check-label">item 3</label>
    </div>
</div> -->
    @endsection
    @section('footer')
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script>
        $("#checkall").change(function() {
            $(".checkitem").prop("checked", $(this).prop("checked"))
        })
        $(".checkitem").change(function() {
            if ($(this).prop("checked") == false) {
                $("#checkall").prop("checked", false)
            }
            if ($(".checkitem:checked").length == $(".checkitem").length) {
                $("#checkall").prop("checked", true)
            }
        })
    </script>

    @endsection