@extends('layout.master')

@section('title', 'Profile')

@section('content')
    <style>
        body {
            background-color: #f9fafb;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
            padding-right: calc(15rem * 0.5);
            padding-left: calc(15rem * 0.5);
        }

        h1 {
            margin: 40px 0;
        }

        .game-image {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 30%;
        }

        .form-control {
            width: 100%;
            height: 40px;
            font-size: 18px;

            outline: none;
            border-radius: 7.5px;
            border: 2px solid #c2c2c2;

            font-family: 'Poppins', sans-serif;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .label-custom {
            width: 23% !important;
        }

        .form-label {
            width: 30%;
        }

        .form-control:focus {
            outline: none;
            border: 2px solid black;
        }

        select {
            width: 100%;
            height: 40px;
            font-size: 18px;

            font-family: 'Poppins', sans-serif;
            border-radius: 7.5px;
            padding-left: 10px;
        }

        option {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
        }

        .update {
            text-align: center;
            background-color: #8d5ef4;
            border: none;
            border-radius: 10px;
            text-decoration: none;
            padding: 8px;
            margin-left: 10px;
            margin-right: 10px;
            color: white;
            float: right;
            cursor: pointer;
        }

        textarea {
            resize: vertical;
            padding-left: 10px;
        }

        .account, .error{
            margin-top: 10%;
        }
    </style>
    <div class="container">
        <h1>Profile</h1>
        <form action="/updateUser/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>
            <div class="form-group file">
                <label for="photo" class="form-label label-custom">Photo</label>
                <img src="{{ asset('storage/User Image/' . $user->image) }}" alt="image" class="game-image">
                <input type="file" name="photo" id="photo">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="gender" class="form-label">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender" value="{{ $user->gender }}">
            </div>
            <div class="form-group">
                <label for="dob" class="form-label">Date Of Birth</label>
                <input type="text" class="form-control" id="dob" name="dob" value="{{ $user->dob }}">
            </div>
            <button type="submit" class="btn update">Update</button>
        </form>

        <h1 class="account">Account</h1>
        <form action="/updateAccountUser/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="oldPassword" class="form-label">Old Password</label>
                <input type="text" class="form-control" id="oldPassword" name="oldPassword">
            </div>
            <div class="form-group">
                <label for="newPassword" class="form-label">New Password</label>
                <input class="form-control" id="newPassword" name="newPassword">
            </div>
            <div class="form-group">
                <label for="confirmNewPassword" class="form-label">Confirm New Password</label>
                <input type="text" class="form-control" id="confirmNewPassword" name="confirmNewPassword">
            </div>
            <button type="submit" class="btn update">Update</button>
        </form>

        @if ($errors->any())
            <div style="color:red" class="error">{{ $errors->first() }}</div>
        @endif
    </div>
@endsection
