<?php

namespace App\Http\Controllers\Backend\Transaction;

use App\Models\Room;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    private $viewPath = "backend/transactions/";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::paginate(10);

        return view($this->viewPath.'index', compact('transactions'));
    }


    public function create()
    {
        $houses = House::all();

        return view($this->viewPath.'create', compact('houses'));
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
            'no' => 'required',
            'rent' => 'required',
            'house_id' => 'required'
        ]);


        $room = Room::create([
            'no' => $request->no,
            'rent' => $request->rent,
            'house_id' => $request->house_id
        ]);

        session()->flash('type', 'success');
        session()->flash('message', 'Room Created Successfully');

        return redirect()->route('room.show', $room->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        return view($this->viewPath.'show')->with('transaction', $transaction);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['rooms'] = Room::all();
        $data['transaction'] = Transaction::where('id', $id)->first();
        return view($this->viewPath.'edit', $data);
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
        $transaction = Transaction::where('id', $id)->first();

        $transaction->update($request->all());

        session()->flash('type', 'success');
        session()->flash('message', 'Transaction Updated Successfully');

        return redirect()->route('transaction.show', $transaction->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Room::where('id', $id)->delete();

        return response()->json([
            'message' => 'Room deleted successfully',
            'redirect_to' => route('room.index')
        ]);
    }

}
