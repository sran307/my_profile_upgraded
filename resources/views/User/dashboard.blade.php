@extends("layouts.layout")
@section("title", "Dashboard")
@section("content")
<div class="container">
    @if(session()->has("message"))
        <p class="alert {{session()->get('alert-class')}}">
            {{session()->get("message") }}
        </p>
    @endif
</div>
<h6>this is user dashboard</h6>
@endsection