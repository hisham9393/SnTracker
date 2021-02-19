@extends('adminPanel.app')

@section('main-content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit details of {{$admin->name}}</div>

        <div class="card-body">
            @include('multiauth::message')
            <form action="{{route('admin.update',[$admin->id])}}" method="post">
                @csrf @method('patch')
                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-right">Name</label>
                    <input type="text" value="{{ $admin->name }}" name="name" class="form-control col-md-6" id="role">
                </div>

                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-right">Email</label>
                    <input type="text" value="{{ $admin->email }}" name="email" class="form-control col-md-6" id="role">
                </div>

                <div class="form-group row">
                    <label for="role_id" class="col-md-4 col-form-label text-md-right">Assign Role</label>

                    <div class="card-body">

                        @foreach($roles as $role)

                        <ul>
                            <input type="checkbox" name="role_id[]" class="form-check-input" value="{{ $role->id }}" id="role_id" @if (in_array($role->id,$admin->roles->pluck('id')->toArray()))
                            checked
                            @endif>
                            <label for="{{$role->id}}" class="form-check-label">{{$role->name}}</label>
                        </ul>

                        @endforeach

                    </div>
                </div>
                @if ($errors->has('role_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('role_id') }}</strong>
                </span>
                @endif
        </div>



        <div class="form-group row">
            <label for="active" class="col-md-4 col-form-label text-md-right">Active</label>
            <input type="checkbox" value="1" {{ $admin->active ? 'checked':'' }} name="activation" class="form-control col-md-6" id="active">
        </div>

    </div>


    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-sm btn-primary">
                Change
            </button>
            <a href="{{ route('admin.show') }}" class="btn btn-danger btn-sm float-right">Back</a>
        </div>
    </div>
    </form>
</div>
</div>
</div>
@endsection