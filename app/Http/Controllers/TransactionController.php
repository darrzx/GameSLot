<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function showTransactionHeaderPage(){
        $transactions = TransactionHeader::where(['user_id' => Auth::user()->id])->get();
        return view('transactionheader')->with('transactions', $transactions);
    }

    public function showTransactionDetailPage(Request $request){
        $transactionshead = TransactionHeader::where(['transaction_id' => $request->route('id')])->first();
        $transactions = TransactionDetail::where(['transaction_id' => $request->route('id')])->get();

        return view('transactiondetail')->with('transactions', $transactions)->with('transactionshead', $transactionshead);
    }
}
