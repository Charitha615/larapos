<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;

class TransactionDetailController extends Controller
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
        $transactions = json_decode($request->transaction_details);

        $count = 0;

        foreach ($transactions as $transaction) {
            TransactionDetail::create([
                'till_id' => $transaction->till_id,
                'transaction_id' => $transaction->transaction_id,
                'item_id' => $transaction->item_id,
                'item_price' => $transaction->item_price,
                'qty' => $transaction->item_qty,
            ]);

            $count++;
        }

        if ($count > 0) {
            return response()->json([
                "error" => false,
                "data" => $count . ' items added'
            ]);
        } else {
            return response()->json([
                "error" => true,
                "data" => "No data added"
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

    public function getTransactionDetails(Request $request)
    {
        $result = array();
        $transaction_ids = json_decode($request->transaction_ids);

        foreach ($transaction_ids as $t_id) {
            $result[] = DB::table('transaction_detail')
                ->join('item', 'item.item_id', '=', 'transaction_detail.item_id')
                ->select('transaction_detail.item_id', 'transaction_detail.item_price', 'item.description')
                ->where('transaction_detail.transaction_id', '=', $t_id)
                ->first();
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
}
