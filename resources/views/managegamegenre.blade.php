@extends('layout.master')
@section('title', 'Manage Game Genre')

@section('content')
    <style>
        .manage-game-container{
            display:  flex;
            flex-direction: column;
            margin-top: 4%;
        }
        .game-container{
            width: 75%;
            margin: auto auto;
            display: flex;
            border: 1px solid rgb(217, 217, 217);
            padding: 20px;
        }
        .game-genre{
            width: 88%;
            margin-left: 1%;
        }
        .game-content-container{
            width: 78%;
            margin: 0px auto;
            display: flex;
            border-bottom: 1px solid rgb(217, 217, 217);
            border-left: 1px solid rgb(217, 217, 217);
            border-right: 1px solid rgb(217, 217, 217);
        }
        .content-item{
            padding: 10px;
        }
        .edit-link{
            margin-right: 40px;
            text-decoration: none;
            color: blue;
        }
    </style>
    <div class="manage-game-container">
        <div class="game-container">
            <div class="game-genre">GAME GENRE</div>
        </div>
        @foreach ($genres as $genre)
            <div class="game-content-container">
                <div class="game-genre content-item">{{$genre->genre}}</div>
                <a href="/updateGameGenre/{{ $genre->id }}" class="edit-link content-item">Edit</a>
            </div>
        @endforeach
    </div>
@endsection
