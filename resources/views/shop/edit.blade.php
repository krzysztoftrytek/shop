@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row gutters justify-content-center d-flex">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <form method="post" class="card-body" action="{{ route('shop.update',$user->id)}}">
                        @csrf
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-3 text-primary">Personal Details</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Full Name</label>
                                    <input type="text" class="form-control" id="fullName"  name="personal[name]" placeholder="{{$user->name}}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Full Name</label>
                                    <input type="text" class="form-control" id="fullName"  name="personal[surname]" placeholder="{{$user->surname}}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="eMail">Email</label>
                                    <input type="email" class="form-control" id="eMail" name="personal[email]" placeholder="{{$user->email}}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="personal[phone_number]" placeholder={{$user->phone_number}}r">
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-3 text-primary">Address</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="Street">Street</label>
                                    <input type="name" class="form-control" id="Street"  name="address[street]" placeholder="{{$user->address->street}}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="ciTy">City</label>
                                    <input type="name" class="form-control" id="ciTy" name="address[city]" placeholder="{{$user->address->city}}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="zIp">Zip Code</label>
                                    <input type="text" class="form-control" id="zIp" name="address[zip_code]" placeholder="{{$user->address->zip_code}}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="zIp">Street Number</label>
                                    <input type="text" class="form-control" id="street_no"  name="address[street_no]" placeholder="{{$user->address->street_no}}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="zIp">Home Number</label>
                                    <input type="text" class="form-control" id="home_no" name="address[home_no]" placeholder="{{$user->address->home_no}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5 d-flex justify-content-center">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
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
