<?php

namespace App\Http\Controllers\Backend\Room;

use App\Models\House;
use App\Models\Room;
use App\Traits\MediaHandler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    use MediaHandler;

    private $viewPath = "backend/rooms/";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::paginate(10);

        return view($this->viewPath.'index', compact('rooms'));
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

        if ($request->hasFile('photo')){

            $photoId = $this->storeImage($request, 'photo');

            $room->update([
                'image_id' => $photoId
            ]);
        }

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
        $room = Room::where('id', $id)->first();
        return view($this->viewPath.'show')->with('room', $room);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['room'] = Room::where('id', $id)->first();
        $data['houses'] = House::all();

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
        $room = Room::where('id', $id)->first();

        $room->update($request->all());

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

        return redirect()->route('room.index');

    }

}
