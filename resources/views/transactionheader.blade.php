@extends('layout.master')
@section('title', 'Transaction History')

@section('content')
    <style>
        .manage-transaction-container {
            display: flex;
            flex-direction: column;
            margin-bottom: 27%;
            margin-top: 4%;
        }

        .transaction-container {
            width: 75%;
            margin: auto auto;
            display: flex;
            border: 1px solid rgb(217, 217, 217);
            padding: 20px;
        }

        .transaction-id {
            width: 30%;
            margin-left: 1%;
        }

        .transaction-date, .transaction-item {
            width: 25%;
        }

        .game-content-container {
            width: 78%;
            margin: 0px auto;
            display: flex;
            border-bottom: 1px solid rgb(217, 217, 217);
            border-left: 1px solid rgb(217, 217, 217);
            border-right: 1px solid rgb(217, 217, 217);
        }

        .game-content-container>.transaction-id{
            margin-left: 2%;
        }

        .game-content-container>.transaction-item{
            margin-right: 4%;
        }

        .content-item {
            padding: 10px;
        }

        .edit-link {
            margin-right: 8%;
            text-decoration: none;
            color: blue;
        }
    </style>
    <div class="manage-transaction-container">
        <div class="transaction-container">
            <div class="transaction-id">TRANSACTION ID</div>
            <div class="transaction-date">TRANSACTION DATE</div>
            <div class="transaction-item">TOTAL ITEM</div>
        </div>
        @foreach ($transactions as $transaction)
            <div class="game-content-container">
                <div class="transaction-id content-item">{{ $transaction->transaction_id }}</div>
                <div class="transaction-date content-item">{{ $transaction->transaction_date }}</div>
                <div class="transaction-item content-item">{{ $transaction->total_item }}</div>
                <a href="/transactiondetail/{{ $transaction->transaction_id }}" class="edit-link content-item">Details</a>
            </div>
        @endforeach
    </div>
@endsection
