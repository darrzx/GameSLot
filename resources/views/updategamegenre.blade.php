@extends('layout.master')

@section('title', 'Update Game Genre')

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
            margin-bottom: 22%;
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
    </style>
    <div class="container">
        <h1>Update Game</h1>
        <form action="/updateGameGenre/{{ $genre->id }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title" class="form-label">Game Genre</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $genre->genre }}">
            </div>
            <button type="submit" class="btn update">Update</button>
            @if ($errors->any())
                <div style="color:red">{{ $errors->first() }}</div>
            @endif
        </form>
    </div>
@endsection
