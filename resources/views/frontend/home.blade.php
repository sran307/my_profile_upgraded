@extends("layouts.layout")
@section("title")
Home
@endsection
@section("content")

    <section id="home">
        <div class="container">
            <div class="home-card">
                <h2 class="home-text">welcome to</h2>
                <h1 class="home-text">My profile</h1>
                <p class="home-text">a perfect place for managing your earnings and expenses. </p>
            </div>
            <div class="row">
               <div class="col-lg-6 col-md-6 home-buttons">
                    <p>if you are new here</p>
                    <a href="{{route('register')}}"><button type="button" class="special-button special">Register Now</button></a>
                </div>
                <div class="col-lg-6 col-md-6 home-buttons">
                    <p>already a user</p>
                    <a href="{{route('login')}}"><button type="button" class="special-button special">Login Here</button></a>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            @if(session()->has("message"))
            <p class="alert {{session()->get('alert-class')}}">
                {{session()->get("message")}}
            </p>
            @endif
        </div>
    </section>
    
@endsection
