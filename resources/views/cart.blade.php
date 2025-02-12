@extends('layout.master')
@section('title', 'Cart')

@section('content')
    <style>
        .manage-game-container {
            display: flex;
            flex-direction: column;
            margin-bottom: 24%;
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

        .game-price {
            width: 17%;
        }

        .game-quantity{
            width: 17%;
        }

        .price{
            width: 12%;
        }

        .quantity{
            margin: auto 0;
            height: 8px;
            border-radius: 5px;
            border: 1.5px solid black;
        }

        input{
            text-indent: 1px;
        }

        .game-content-container {
            width: 78%;
            margin: 0px auto;
            display: flex;
            border-bottom: 1px solid rgb(217, 217, 217);
            border-left: 1px solid rgb(217, 217, 217);
            border-right: 1px solid rgb(217, 217, 217);
        }

        .form-update, .form-delete{
            display: flex;
            flex-direction: row;
        }

        .form-update{
            width: 10%;
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
            margin-left: 100%;
            text-decoration: none;
            color: blue;
        }

        .delete-link {
            text-decoration: none;
            color: red;
            margin-right: 25px;
            margin-left: 300%;
        }

        .edit-link:hover {
            cursor: pointer;
        }

        .delete-link:hover {
            cursor: pointer;
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
        <form action="/checkout" method="POST">
            @csrf
            <input class="add-game-link" type="submit" value="Checkout">
        </form>
        <div class="game-container">
            <div class="game-title">GAME TITLE</div>
            <div class="game-price">GAME PRICE</div>
            <div class="game-quantity">QUANTITY</div>

        </div>
        @if (Session::get('cart'))
            @php
                $cart = Session::get('cart');
            @endphp
            @for ($i = 0; $i < count(Session::get('cart')); $i++)
                @if ($cart[$i]->user_id == Auth::user()->id)
                    <div class="game-content-container">
                        <div class="game-title content-item"><img
                                src="{{ Storage::url('Game Image/' . $cart[$i]->game->gameimage) }}" alt="image"
                                class="game-image">
                            {{ $cart[$i]->game->gametitle }}
                        </div>
                        <div class="price content-item">{{ $cart[$i]->game->gameprice }}</div>
                        <form action="/updateCart/{{ $i }}" method="POST" class="form-update">
                            @csrf
                            {{-- @method('PATCH') --}}
                            <input type="number" class="quantity content-item" name="quantity" value="{{ $cart[$i]->quantity }}">
                            <input type="submit" value="Update" class="edit-link" style="border: none; background-color:transparent">
                        </form>
                        <form action="/deleteCart/{{ $i }}" method="POST" class="form-delete">
                            @csrf
                            {{-- @method('DELETE') --}}
                            <input type="submit" value="Remove" class="delete-link content-item" style="border: none; background-color:transparent">
                        </form>
                    </div>
                @endif
            @endfor
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:red; margin-left:15%">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            @php
                unset($errors);
            @endphp
        @endif
    </div>
@endsection
