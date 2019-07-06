<?php

namespace App\Http\Controllers\Backend\Renter;

use App\Models\Renter;
use App\Models\User;
use App\Traits\MediaHandler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RenterController extends Controller
{
    use MediaHandler;

    private $viewPath = "backend/renters/";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renters = Renter::paginate(10);

        return view($this->viewPath.'index', compact('renters'));
    }


    public function create()
    {

        return view($this->viewPath.'create');
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
            'total_family_members' => 'required',
            'address' => 'required',
            'first_name' => 'required',
            'email' => 'required'
        ]);


        DB::transaction(function () use($request){

            $user = User::create([
               'first_name' => $request->first_name,
               'email' => $request->email
           ]);

            if($request->hasFile('photo')){

               $photo =  $this->storeImage($request,'photo');
                $user->update([
                    'image_id' => $photo
                ]);
            }

            $renter = Renter::create([
                'total_family_member' => $request->total_family_member,
                'address' => $request->address,
                'user_id' => $user->id
            ]);


        });

        session()->flash('type', 'danger');
        session()->flash('message', 'Renter not created');

        return redirect()->route('renter.create');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $renter = Renter::where('id', $id)->first();
        return view($this->viewPath.'show')->with('renter', $renter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::where('id', $id)->first();
        return view($this->viewPath.'edit', compact('room'));
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
        $house = Room::where('id', $id)->first();

        $house->update($request->all());

        session()->flash('type', 'success');
        session()->flash('message', 'Room Updated Successfully');

        return redirect()->route('room.show', $room->id);


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
