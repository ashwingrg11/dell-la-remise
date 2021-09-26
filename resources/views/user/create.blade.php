@extends('admin.layout.layout')

@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Create User</h2>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($user) ? 'Edit' : 'Create' }} User</h6>
        </div>
        <div class="card-body">
            <div class="col-md-10 col-lg-6 p-0">
                <form action="{{ isset($user) ? @route('users.update', $user->id): @route('users.store') }}"
                    method="POST">
                    @csrf
                    @isset($user)
                        <input name="_method" type="hidden" value="PUT">
                    @endisset
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input class="form-control" type="text" name="fullname" id="name"
                            value="{{ $user->name ??  old('fullname') }}">
                        @if($errors->has('fullname'))
                        <div class="error">{{ $errors->first('fullname') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input class="form-control" type="email" name="email" id="email" value="{{ $user->email ??  old('email') }}">
                        @if($errors->has('email'))
                            <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    @isset($user)
                        <div class="form-group status-group">
                            <label for="status">Status</label>
                            <div class="custom-control">
                                <input class="" type="radio" name="status" value="1" id="active"
                                {{ ($user->status == 1) ? 'checked': '' }}>
                                <label class="" for="active">Active</label>
                            </div>
                            <div class="custom-control">
                                <input class="" type="radio" name="status" value="0" id="inactive"
                                {{ ($user->status == 0) ? 'checked': '' }}>
                                <label class="" for="inactive">InActive</label>
                            </div>
                        </div>
                    @endisset
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
