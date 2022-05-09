@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br><br>
                    <img class="card-img-top" style="border-radius: 50%"
                        src="{{ !empty($user->profile_photo_path) ? url('upload/user_images/' . $user->profile_photo_path) : url('upload/no_image.jpg/') }}"><br><br>
                    <ul class="list-group list-group-flush">

                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Dashboard</a>
                    </ul>
                </div><!-- end col md 2 -->

                <div class="col-md-2">

                </div><!-- end col md 2 -->

                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Hello</span><strong>
                                {{ Auth::user()->name }} !</strong> Update Your Profile</h3>

                        <div class="card-body">
                            <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                                @csrf
                                {{-- <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name <span> </span></label>
                                <input type="text"  name="name" class="form-control" value="{{ $user->name }}">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email <span> </span></label>
                                <input type="email"  name="email" class="form-control" value="{{ $user->email }}">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone <span> </span></label>
                                <input type="text"  name="phone" class="form-control" value="{{ $user->phone}}">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">User Image <span> </span></label>
                                <input type="file"  name="profile_photo_path" class="form-control" >
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div> --}}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Name <span class="required">*</span></label>
                                        <input required="" class="form-control" name="name" type="text" value="{{ $user->name }}" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Phone Number <span class="required">*</span></label>
                                        <input required="" class="form-control" name="phone" type="phone"value="{{ $user->phone }}" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input required="" class="form-control" name="email" type="email" value="{{ $user->email }}" />
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1">User Image <span>
                                            </span></label>
                                        <input type="file" name="profile_photo_path" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit"
                                            value="Submit">Save Change</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div><!-- end col md 6 -->

            </div><!-- row -->
        </div>
    </div>
@endsection
