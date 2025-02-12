@extends('layout.master')

@section('title', 'Game Detail')

@section('content')
    <style>
        .detail-container{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 5vmax;
        }
        .gameBackground{
            border-radius: 35px;
            height: 80vh;
            width: 80vw;
            object-fit: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            color: white;
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
        .game-title{
            font-size: 270%;
            margin-left: auto;
            margin-right: auto;
        }
        .game-content{
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            height: 70%;
            background-color: rgba(0, 0, 0, 0.534);
            width: 80%;
            border-radius: 20px;
            padding: 2%;
        }
        .contents{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
        }
        .game-genre {
            border: 1px solid rgb(190, 255, 190);
            background-color: rgb(190, 255, 190);
            padding: 1.5px 5px;
            border-radius: 15px;
            color: green;
        }
        .game-price{
            font-weight: bold;
            font-size: 150%;
        }
        .game-pegi{
            font-weight: bold;
            font-size: 150%;
            width: 2vw;
            display: flex;
            justify-content: center;
            background-color: red;
        }
        .btn{
            border-radius: 5px;
            background-color: #318BE5;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 18px;
            padding: 10px 12px;
            border: 1.5px solid #318BE5;
            cursor: pointer;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <div class="detail-container">
        <div class="gameBackground" style="background-image: url('{{ asset('storage/Game Image/'.$game->gameimage) }}');">
            <div class="game-content">
                <h1 class="game-title">{{ $game->gametitle }}</h1>
                <div class="game-description">{{ $game->gamedescription }}</div>
                <div class="contents">
                    <div class="game-genre">{{ $game->gamegenre->genre }}</div>
                    <div class="game-price">
                        @if ($game->gameprice == 0)
                            Free
                        @else
                            ${{ $game->gameprice }}
                        @endif
                    </div>
                    <div class="game-pegi">{{ $game->gamepegirating }}</div>
                </div>
                <a href="/addToCart/{{ $game->id }}" class="btn">Add to cart</a>
            </div>
        </div>
    </div>
@endsection
