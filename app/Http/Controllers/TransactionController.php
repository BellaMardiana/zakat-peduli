<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Transaction;
use App\Donation;
use App\Program;
use App\Bank;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();

        return view('users.validation',compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $donations = Donation::get();

        $programs = Program::get();

        $banks = Bank::get();

        return view('users.transaction',[
            'donations' => $donations
        ],[
            'programs' => $programs
        ],[
            'banks' => $banks
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
        $this->validate($request,[
            'image'=>'image'
        ],[
            'required' =>'harus diisi',
        ]);
        
        $imagePath = $request->file('image')->store('transaction');
        
        $transaction = new Transaction;
        $transaction->donation_id = $request->donation;
        $transaction->user_id = auth()->id(); 
        $transaction->program_id = $request->program;
        $transaction->nominal = $request->nominal;
        $transaction->atas_nama = $request->atas_nama;
        $transaction->email = $request->email;
        $transaction->telepon = $request->telepon;
        $transaction->image = $imagePath;
        $transaction->save();

        return redirect()->route('users.validation')->withSuccess('Berhasil ditambahkan');

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
    public function edit(Transaction $transaction)
    {
        $this->authorize('update', $transaction);
        
        return view('users.validation', [
            'transaction' => $transaction,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $this->validate($request,[
            'image'=>'image'
        ],[
            'required' =>'harus diisi',
        ]);

        $transaction = Transaction::find($transaction);
        
        $transaction->nominal = $request->get('nominal');
        $transaction->atas_nama = $request->get('atas_nama');
        $transaction->email = $request->get('email');
        $transaction->telepon = $request->get('telepon');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('transaction');
            Storage::delete($transaction->image);
            $transaction->image = $imagePath;
        }
        $transaction->save();

        return redirect()->route('users.validation')->with('info','Berhasil Upload');
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

}
