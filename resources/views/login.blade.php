@extends('layout.master')
@section('title', 'Login')

@section('content')
    <style>
        .signIn-container{
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10vmax;
        }
        .signIn-container h3{
            margin-top: 0;
            margin-bottom: 0;
        }
        .form-container {
            display: flex;
            flex-direction: column;
            background-color: #F2F3F4;
            padding: 2% 3% 2% 3%;
            border-radius: 20px;
            width: 250px;
        }
        .inp{
            display: flex;
            flex-direction: column;
        }
        .btn{
            margin-top: 5%;
            padding: 4px;
            margin-bottom: 4%;
        }
        .content{
            margin: 5px 0;
        }
    </style>
        <div class="signIn-container">
            <h2 style="color: black">Game<span style="color: red">SLot</span></h2>
            <h3>Sign In To Your Account</h3>
            <div class="form-container" style="margin-top: 2vmax">
                <form action="/signIn" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="content inp">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="content inp">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="content form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                        <label class="form-check-label" for="remember_me">Remember me</label>
                    </div>
                    <button type="submit" class="btn">Sign In</button>
                    @if ($errors->any())
                        <div style="color:red">{{ $errors->first() }}</div>
                    @endif
                </form>
            </div>
        </div>
@endsection
