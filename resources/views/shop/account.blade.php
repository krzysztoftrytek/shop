@extends('layouts.app')

@section('content')
    @if(Session::has("success"))
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
<div class="container mt-5">
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Maxwell Admin">
                            </div>
                            <h5 class="user-name">{{ $user->name }}</h5>
                            <h6 class="user-email">y{{ $user->email }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-3 text-primary">Personal Details</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input type="text" class="form-control" id="fullName"  name="name" value="{{$user->name}}" disabled>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input type="text" class="form-control" id="fullName"  name="surname" value="{{$user->surname}}" disabled>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="eMail">Email</label>
                                <input type="email" class="form-control" id="eMail" name="email" value="{{$user->email}}" disabled>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone_number" value={{$user->phone_number}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters>">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-3 text-primary">Address</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="Street">Street</label>
                                <input type="name" class="form-control" id="Street"  name="street" value="{{$user->address->street}}" disabled>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="ciTy">City</label>
                                <input type="name" class="form-control" id="ciTy" name="city" value="{{$user->address->city}}" disabled>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="zIp">Zip Code</label>
                                <input type="text" class="form-control" id="zIp" name="zip_code" value="{{$user->address->zip_code}}" disabled>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="zIp">Street Number</label>
                                <input type="text" class="form-control" id="street_no"  name="street_no" value="{{$user->address->street_no}}" disabled>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="zIp">Home Number</label>
                                <input type="text" class="form-control" id="home_no" name="home_no" value="{{$user->address->home_no}}" disabled>
                            </div>
                        </div>
                    </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5 d-flex justify-content-center" disabled>
                            <div class="text-right">
                                <a href="{{ route('shop.edit',$user->id) }}" class="btn btn-primary">Update</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




{{--<div class="row mb-3">--}}
{{--    <label for="user_image"--}}
{{--           class="col-md-4 col-form-label text-md-end">User image</label>--}}

{{--    <div class="col-md-6">--}}
{{--        <input id="user_image" type="file"--}}
{{--               class="form-control" name="user_image">--}}

{{--        @error('user_image')--}}
{{--        <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}
