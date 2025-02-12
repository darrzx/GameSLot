@extends('layout.master')
@section('title', 'Transaction History')

@section('content')
    <style>
        .manage-game-container {
            display: flex;
            flex-direction: column;
            margin-bottom: 27%;
            margin-top: 4%;
        }

        .game-container {
            width: 75%;
            margin: auto auto;
            margin-top: 1%;
            display: flex;
            border: 1px solid rgb(217, 217, 217);
            padding: 20px;
        }

        .game-description, .total{
            margin: auto;
            line-height: 1.4;
            width: 77%;
            font-weight: bold;
        }

        .game-title {
            width: 33%;
            margin-left: 1%;
        }

        .game-total,
        .game-quantity,
        .game-price {
            width: 26%;
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
        <div class="game-description">
            <div>Transaction ID : {{ $transactionshead->transaction_id }}</div>
            <div>Customer : {{ $transactionshead->user->name }}</div>
            <div>Transaction Date : {{ $transactionshead->transaction_date }}</div>
        </div>

        <div class="game-container">
            <div class="game-title">GAME TITLE</div>
            <div class="game-price">GAME PRICE</div>
            <div class="game-quantity">QUANTITY</div>
            <div class="game-total">SUB TOTAL</div>
        </div>
        @php
            $total = 0;
        @endphp
        @foreach ($transactions as $transaction)
            <div class="game-content-container">
                <div class="game-title content-item">{{ $transaction->game->gametitle }}</div>
                <div class="game-price content-item">{{ $transaction->game->gameprice }}</div>
                <div class="game-price content-item">{{ $transaction->quantity }}</div>
                <div class="game-price content-item">${{ $transaction->game->gameprice*$transaction->quantity }}</div>
                @php
                    $total += $transaction->game->gameprice*$transaction->quantity;
                @endphp
            </div>
        @endforeach
        <div class="total" style="margin-top: 1%">Total : ${{ $total }}</div>
    </div>
@endsection
