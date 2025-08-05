@extends('admin.layouts.app')
@section('content')
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Edit Profile</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
            </ol>

        </div>
        <div class="row ">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Profile</h3>
                    </div>
                    <div class="card-body">
                        <form name="profile" method="post" autocomplete="off">
                            <div class="row mb-2">
                                <div class="col-auto">
                                    <img class="avatar brround avatar-xl" src="{{asset('assets/images/users/male/25.jpg')}}" alt="Avatar-img">
                                </div>
                                <div class="col">
                                    <h3 class="mb-1 ">{{ $user->name }}</h3>
                                    <p class="mb-4 ">{{  $user->email }}</p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input value="{{ $user->name }}" class="form-control" placeholder="your-email@domain.com" name="name"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email-Address</label>
                                <input class="form-control" placeholder="your-email@domain.com" name="email" value="{{ $user->email }}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="********" name="password"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password Confirm</label>
                                <input type="password" class="form-control" placeholder="********" name="confirm_password"/>
                            </div>
                            <div class="form-footer">
                                <button class="btn btn-primary btn-block">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection