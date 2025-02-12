@extends('layout.master')
@section('title', 'Home')

@section('content')
    <style>
        .container{
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }
        .card {
            width: 200px;
            height: 300px;
            border: 1px solid black;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            margin: 20px;
        }
        .game-image {
            border-radius: 50%;
            height: 110px;
            width: 110px;
            margin-top: auto;
            margin-bottom: auto;
            object-fit: cover;
        }
        .card-content-container {
            padding: 10px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .content{
            padding: 11%;
        }
        .game-title{
            padding-top: 0;
            font-weight: bold;
        }
        .game-price{
            padding-top: 7%;
        }
        .game-genre {
            border: 1px solid rgb(190, 255, 190);
            background-color: rgb(190, 255, 190);
            padding: 1.5px 5px;
            border-radius: 15px;
            color: green;
        }
        .line {
            margin-top: 25%;
            width: 150px;
        }
        .pagination{
            display: flex;
            flex-direction: row;
            justify-content: center;
            margin-top: 20%;
        }
        .page-item{
            list-style: none;
            border: 1px solid black;
            padding: 30%;
        }
        .active{
            background-color: rgb(9, 134, 224);
        }
        .active a{
            color: white;
        }
        .page-link{
            text-decoration: none;
        }
    </style>
    <div class="container">
        @if (session()->has('user'))
            <p>Welcome, {{ session('user.name') }}!</p>
        @endif

        <div class="message" style="margin-top: 1.5%;">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>
        <div class="card-container">
            @foreach ($games as $game)
                <a class="card" href="{{url('gameDetail/'.$game->id)}}" style="text-decoration: none; color:black;">
                    <img src="{{ asset('storage/Game Image/'.$game->gameimage) }}" alt="game image" class="game-image">
                    <div class="card-content-container">
                        <p class="content game-title">{{ $game->gametitle }}</p>
                        <p class="content game-genre">{{ $game->gamegenre->genre }}</p>
                        <hr class="line">
                        <div class="game-price">
                            @if ($game->gameprice == 0)
                                Free
                            @else
                                ${{ $game->gameprice }}
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="pagination-container">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="{{ $games ->previousPageUrl() }}">&laquo;</a>
                </li>
                @for ($i = 1; $i <= $games -> lastPage(); $i++)
                    @if ($i == $games -> currentPage())
                        <li class="page-item active">
                            <a class="page-link" href="">{{ $i }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $games -> url($i) }}">{{ $i }}</a>
                        </li>
                    @endif
                @endfor
                <li class="page-item">
                    <a class="page-link" href="{{ $games -> nextPageUrl() }}">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
