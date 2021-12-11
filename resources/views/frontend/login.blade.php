@extends("layouts.layout")
@section("title")
Login
@endsection
@section("content")
<section id="login">
        <div class="container">
        @if(session()->has("message"))
            <span class="alert {{session()->get('alert-class')}}">{{session()->get("message")}}</span>
        @endif
      
            <form action="{{route('login_form')}}" method="post">
            @csrf
                <legend class="col-form-label">Login</legend>
                <fieldset class="form-group fontuser">
                    <input type="text" placeholder="Enter your User Id or Email Id" name="email" class="form-control col-lg-6">
                    <i class="fa fa-user fa-lg"></i>
                </fieldset>
                @if($errors->has("email"))
                <p class="alert alert-danger d-inline">{{$errors->first("email")}}</p>
                @endif
                <fieldset class="form-group fontpass my-3">
                    <input type="password" placeholder="Enter your password" name="password" class="form-control col-lg-6">
                    <i class="fa fa-key fa-lg"></i>
                </fieldset>
                @if($errors->has("password"))
                <p class="alert alert-danger d-inline">{{$errors->first("password")}}</p>
                @endif
                <fieldset class="my-2">
                    <input type="checkbox" name="check" value="agree">
                    <label> I agree terms and conditions</label>
                </fieldset>
                <fieldset class="form-group text-center">
                    <button type="submit">Login</button>
                </fieldset>
            </form>
            
    </section>

@endsection