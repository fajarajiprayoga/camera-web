<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Transaction;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::with('items')->simplePaginate(5);

        return view('pages.transaction.index')->with([
            'transactions' => $transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        return view('pages.transaction.create')->with([
            'items' => $items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_cust' => 'required',
            'no_identitas' => 'required',
            'no_telp' => 'required',
            'item_id' => 'required',
            'durasi' => 'required'
        ]);

        $transaction = new Transaction;
        $transaction->nama_cust = $request->nama_cust;
        $transaction->no_identitas = $request->no_identitas;
        $transaction->no_telp = $request->no_telp;
        $transaction->item_id = $request->item_id;
        $transaction->durasi = $request->durasi;

        $id = $transaction->item_id;
        $item = Item::findOrFail($id);

        //total harga dan hari
        $harga = $item->harga;
        $durasi = $request->durasi;
        $total = $harga * $durasi;

        $transaction->total_harga = $total;
        $transaction->save();

        return redirect()->route('transaction.index');
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
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transaction.index');
    }
}
