@extends('layout.master')
@section('title', 'Manage Game')

@section('content')
    <style>
        .manage-game-container {
            display: flex;
            flex-direction: column;
        }

        .game-container {
            width: 75%;
            margin: auto auto;
            display: flex;
            border: 1px solid rgb(217, 217, 217);
            padding: 20px;
        }

        .game-title {
            width: 30%;
        }

        .pegi-rating,
        .game-genre,
        .game-price {
            width: 17%;
        }

        .game-content-container {
            width: 78%;
            margin: 0px auto;
            display: flex;
            border-bottom: 1px solid rgb(217, 217, 217);
            border-left: 1px solid rgb(217, 217, 217);
            border-right: 1px solid rgb(217, 217, 217);
        }

        .content-item {
            padding: 10px;
        }

        .game-image {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .edit-link {
            margin-right: 40px;
            text-decoration: none;
            color: blue;
        }

        .delete-link {
            text-decoration: none;
            color: red;
            margin-right: 25px;
        }

        .add-game-link {
            align-self: flex-end;
            margin: 2% 11%;
            text-decoration: none;
            text-align: center;
            border: 1px solid rgb(97, 28, 208);
            border-radius: 10px;
            text-decoration: none;
            padding: 8px;
            background-color: rgb(97, 28, 208);
            color: white;
        }

        .add-game-link:hover {
            border: 1px solid rgb(97, 28, 208);
            background-color: white;
            color: rgb(97, 28, 208);
        }
    </style>
    <div class="manage-game-container">
        <a href="/addGame" class="add-game-link">Add Game</a>
        <div class="game-container">
            <div class="game-title">GAME TITLE</div>
            <div class="pegi-rating">PEGI RATING</div>
            <div class="game-genre">GAME GENRE</div>
            <div class="game-price">GAME PRICE</div>
        </div>
        @foreach ($games as $game)
            <div class="game-content-container">
                <div class="game-title content-item"><img src="{{ asset('storage/Game Image/' . $game->gameimage) }}"
                        alt="image" class="game-image">{{ $game->gametitle }}</div>
                <div class="pegi-rating content-item">{{ $game->gamepegirating }}</div>
                <div class="game-genre content-item">{{ $game->gamegenre->genre }}</div>
                <div class="game-price content-item">{{ $game->gameprice }}</div>
                <a href="/updateGame/{{ $game->id }}" class="edit-link content-item">Edit</a>
                <a href="/deleteGame/{{ $game->id }}" class="delete-link content-item">Delete</a>
            </div>
        @endforeach
    </div>
@endsection
