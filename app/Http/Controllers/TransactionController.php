<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionPaymentDetail;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transactions = json_decode($request->transactions);
        
        $count = 0;

        foreach ($transactions as $transaction) {
            Transaction::create([
                'transaction_id' => $transaction->transaction_id,
                'till_id' => $transaction->till_id,
                'total_amount' => $transaction->sales_total,
                // 'discount' => $transaction->discount,
                'net_amount' => $transaction->sales_total,
                'reciept_balance' => $transaction->sales_balance,
                'discount_amount' => $transaction->discount_amount,
            ]);

            TransactionPaymentDetail::create([
                'transaction_id' => $transaction->transaction_id,
                'till_id' => $transaction->till_id,
                'payment_type' => $transaction->payment_type,
                'amount' => $transaction->payment_amount
            ]);

            $count++;
        }

        if ($count > 0) {
            return response()->json([
                "error" => false,
                "data" => $count . ' Transactions added'
            ]);
        } else {
            return response()->json([
                "error" => true,
                "data" => "No transactions added"
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getTransactions(Request $request)
    {
        $result = array();
        $transaction_ids = json_decode($request->transaction_ids);

        foreach ($transaction_ids as $t_id) {
            $result[] = Transaction::where('transaction_id', $t_id)->first();
        }

        if (sizeof($result) > 0) {
            return response()->json([
                "error" => false,
                "data" => $result
            ]);
        } else {
            return response()->json([
                "error" => true,
                "data" => "No transactions"
            ]);
        }
    }

    public function getTransactionPaymentDetails(Request $request)
    {
        $result = array();
        $transaction_ids = json_decode($request->transaction_ids);

        foreach ($transaction_ids as $t_id) {
            $result[] = TransactionPaymentDetail::where('transaction_id', $t_id)->first();
        }

        if (sizeof($result) > 0) {
            return response()->json([
                "error" => false,
                "data" => $result
            ]);
        } else {
            return response()->json([
                "error" => true,
                "data" => "No transactions"
            ]);
        }
    }

    public function getTransactionId()
    {
        $data = Transaction::orderBy('transaction_id', 'desc')->first();

        $transaction_id = 1;
        if ($data) {
            $transaction_id = $data->transaction_id + 1;
        }

        return response()->json($transaction_id);
    }
}
