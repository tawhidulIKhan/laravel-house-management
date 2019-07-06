<?php

namespace App\Http\Controllers\Backend\House;

use App\Models\House;
use App\Traits\MediaHandler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HouseController extends Controller
{
    use MediaHandler;

    private $viewPath = "backend/houses/";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $houses = House::paginate(10);

        return view($this->viewPath.'index', compact('houses'));
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
            'name' => 'required',
            'address' => 'required'
        ]);


        $house = House::create([
            'name' => $request->name,
            'address' => $request->address,
            'owner_id' => auth()->id()
        ]);

        if ($request->hasFile('photo')){

           $photoId = $this->storeImage($request, 'photo');

           $house->update([
               'image_id' => $photoId
           ]);
        }

        session()->flash('type', 'success');
        session()->flash('message', 'House Created Successfully');

        return redirect()->route('house.show', $house->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $house = House::where('id', $id)->first();
        return view($this->viewPath.'show')->with('house', $house);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $house = House::where('id', $id)->first();
        return view($this->viewPath.'edit', compact('house'));
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
        $house = House::where('id', $id)->first();

        $house->update([
            'name' => $request->name,
            'address' => $request->address
        ]);

        session()->flash('type', 'success');
        session()->flash('message', 'House Updated Successfully');

        return redirect()->route('house.show', $house->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        House::where('id', $id)->delete();

        return redirect()->route('house.index');
    }

}
