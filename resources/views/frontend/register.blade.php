@extends ("layouts.layout")
@section("title")
Registration
@endsection
@section("content")
{{--In this registration form, I am  using ajax for validation and checking whether the email id and
user name alreaddy taken or not. If it is not taken then data is registered in to the database--}}
<section id="registration">
        <div class="container">
            @if(session()->has("message"))
            <span class="alert {{session()->get('alert-class')}}">{{session()->get("message")}}</span>
            @endif
            <form action="{{route('register_form')}}" method="post" enctype="multipart/form-data">
                @csrf 
                <legend class="col-form-label">Registration Form</legend>
                <div class="row form-group">
                    <label for="name" class="col-form-label col-sm-2">Name</label>
                    <div class="col-md-5 col-sm-5 my-2">
                        <input type="text" class="form-control" placeholder="Enter your first name" name="first_name" value="{{old('first_name')}}">
                        @if($errors->has("first_name"))
                            <p class="alert alert-danger my-2">{{$errors->first("first_name")}}</p>
                        @endif
                    </div>
                    <div class="col-md-5 col-sm-5 my-2">
                        <input type="text" class="form-control" placeholder="Enter your last name" name="last_name" value="{{old('last_name')}}">
                        @if($errors->has("last_name"))
                        <p class="alert alert-danger my-2">{{$errors->first("last_name")}}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-form-label col-sm-2">Email Id</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" placeholder="Enter your email id" name="email" value="{{old('email')}}">
                       @if($errors->has("email"))
                       <p class="alert alert-danger my-2">{{($errors->first("email"))}}</p>
                       @endif
                    </div>
                </div>
                <div class="row form-group">
                    <label for="phone_number" class="col-form-label col-sm-2">Mobile Number</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" placeholder="Enter your mobile number" name="mobile_number" value="{{old('mobile_number')}}">
                        @if($errors->has("mobile_number"))
                        <p class="alert alert-danger my-2">{{$errors->first('mobile_number')}}</p>
                        @endif
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="gender" class="col-form-label pt-0">Gender</label>
                        </div>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="gender" value="male">
                                <label for="male" class="form-check-label">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="gender" value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            @if($errors->has("gender"))
                            <p class="alert alert-danger my-2">{{$errors->first("gender")}}</p>
                            @endif
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="col-form-label" for="interest">Interests</label>
                        </div>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" name="interest[]" value="movies">
                                <label class="form-check-label" for="movies">Movies</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" name="interest[]" value="music">
                                <label for="music" class="form-check-label">Music</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" name="interest[]" value="books">
                                <label for="books" class="form-check-label">Books</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" name="interest[]" value="games">
                                <label for="games" class="form-check-label">Games</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" name="interest[]" value="travel">
                                <label for="travel" class="form-check-label">Travel</label>
                            </div>
                           @if($errors->has("interest"))
                           <p class="alert alert-danger my-2">{{$errors->first("interest")}}</p>
                           @endif
                        </div>
                    </div>
                </fieldset>
                <div class="row form-group">
                    <label for="job" class="col-sm-2 col-form-label">Job Title</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="job" value="{{old('job')}}">
                            <option value="">Select any one</option>
                            <option value="employee">Employee</option>
                            <option value="employer">Employer</option>
                            <option value="student">Student</option>
                        </select>
                       @if($errors->has("job"))
                       <p class="alert alert-danger my-2">{{$errors->first("job")}}</p>
                       @endif
                    </div>
                </div>
                <div class="row form-group">
                    <label for="user_id" class="col-form-label col-sm-2">User Id</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Create your user id" name="user_id" value="{{old('user_id')}}">
                        @if($errors->has('user_id'))
                        <p class="alert alert-danger my-2">{{$errors->first('user_id')}}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-form-label col-sm-2">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" placeholder="Create your password" name="password" value="{{old('password')}}">
                        @if($errors->has("password"))
                        <p class="alert alert-danger my-2">{{$errors->first("password")}}</p>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <label for="confirm_password" class="col-form-label col-sm-2">profile image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" placeholder="Upload your profile image" name="image" value="{{old('image')}}">
                        @if($errors->has("image"))
                        <p class="alert alert-danger my-2">{{$errors->first("image")}}</p>
                        @endif
                    </div>
                </div>
                <fieldset class="text-center">
                    <button type="submit">Register</button>
                </fieldset>
            </form>
            <h5 class="success_register"></h5> 
        </div>
    </section>
@endsection