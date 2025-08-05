@extends('admin.layouts.app')
@section('content')
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Profile</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>

        </div>

        <div class="row">
            <div class="col-lg-5 col-xl-4">
            @if($user->image && file_exists(storage_path().'/app/public/admin/profile/'.$user->image))
                <div class="card card-profile cover-image "  data-image-src="{{ route('image.displayImage',['p'=>'admin/profile/'.$user->image]) }}">
            @else
                <div class="card card-profile cover-image "  data-image-src="{{asset('assets/images/photos/gradient3.jpg')}}">
            @endif
                    <div class="card-body text-center">
                        @if($user->image && file_exists(storage_path().'/app/public/admin/profile/'.$user->image))
                            <a target="_blank" href="{{ route('image.displayImage',['p'=>'admin/profile/'.$user->image]) }}">
                                <img class="card-profile-img" src="{{ route('image.displayImage',['p'=>'admin/profile/'.$user->image]) }}" alt="img">
                            </a>
                        @else
                        <img class="card-profile-img" src="{{asset('assets/images/users/male/25.jpg')}}" alt="img">
                        @endif
                        <h3 class="mb-1 text-white">{{$user->name}}</h3>
                        <p class="mb-2 text-white">{{$user->email}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div id="profile-log-switch">
                            <div class="fade show active " >
                                <div class="table-responsive border ">
                                    <table class="table row table-borderless w-100 m-0 ">
                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                            <tr>
                                                <td><strong>Full Name :</strong> {{$user->name}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>E-mail :</strong> {{$user->email}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Status :</strong> {{ucfirst($user->status)}}</td>
                                            </tr>
                                        </tbody>
                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                            <tr>
                                                <td><strong>Last Login :</strong>{{display_date_time($user->last_login)}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>IP :</strong> {{$user->ip}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Browser :</strong> {{$user->browser}} </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row mt-5 profie-img">
                                    <hr>
                                    <div class="col-md-12">
                                            <div class="media-heading">
                                                <h5><strong>Update Detail</strong></h5>
                                            </div>
                                            <form class="my-5" name="profile" method="post" autocomplete="off" enctype= "multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label">Profile Picture</label>
                                                    <input  class="form-control {{$errors->first('image','is-invalid state-invalid')}}" name="image"  type="file"/>
                                                    <div class="invalid-feedback">{{$errors->first('image')}}</div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Name</label>
                                                    <input value="{{ $user->name }}" class="form-control {{$errors->first('name','is-invalid state-invalid')}}" name="name" type="text"/>
                                                    <div class="invalid-feedback">{{$errors->first('name')}}</div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Email-Address</label>
                                                    <input disabled class="form-control" placeholder="your-email@domain.com" name="email" value="{{ $user->email }}"/>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Password</label>
                                                    <input type="password" class="form-control {{$errors->first('password','is-invalid state-invalid')}}" placeholder="********" name="password"/>
                                                    <div class="invalid-feedback">{{$errors->first('password')}}</div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Password Confirm</label>
                                                    <input type="password" class="form-control {{$errors->first('password_confirmation','is-invalid state-invalid')}}" placeholder="********" name="password_confirmation"/>
                                                    <div class="invalid-feedback">{{$errors->first('password_confirmation')}}</div>
                                                </div>
                                                <div class="form-footer col-md-2">
                                                    <button class="btn btn-primary btn-block">Update</button>
                                                </div>
                                            </form>
                                    </div>
								</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection