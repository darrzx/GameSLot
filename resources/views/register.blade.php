@extends('layout.master')
@section('title', 'Register')

@section('content')
    <style>
        .signUp-container{
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 3vmax;
        }
        .signUp-container h3{
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
        <div class="signUp-container">
            <h2 style="color: black">Game<span style="color: red">SLot</span></h2>
            <h3>Sign Up Your Account</h3>
            <div class="form-container" style="margin-top: 2vmax">
                <form action="/signUp" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="content inp">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control" id="name" name="name">
                    </div>
                    <div class="content inp">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="content inp">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="content inp">
                        <label for="Gender" class="form-label gender">Gender</label>
                        <div class="radio_button_gender">
                            <input type="radio" class="form-control-gender" id="gender" name="gender" value="Male"> Male
                            <input type="radio" class="form-control-gender" id="gender" name="gender" value="Female"> Female
                        </div>
                    </div>
                    <div class="content inp">
                        <label for="dob" class="form-label">Date of birth</label>
                        <input type="date" class="form-control" id="dob" name="dob">
                    </div>
                    <button type="submit" class="btn">Sign Up</button>
                    @if ($errors->any())
                        <div style="color:red">{{ $errors->first() }}</div>
                    @endif
                </form>
            </div>
        </div>
@endsection
