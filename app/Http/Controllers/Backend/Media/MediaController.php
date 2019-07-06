<?php

namespace App\Http\Controllers\Backend\Media;

use App\Http\Resources\MediaResource;
use App\Models\Media;
use App\Traits\MediaHandler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    use MediaHandler;

    private $viewPath = "backend/media/";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view($this->viewPath.'index');
    }

    public function getData(Request $request)
    {

        $columns = ['src', 'name', 'description','type', 'created_at', 'created_at'];

        $searchedText = $request->search['value'];
        $start = $request->start;
        $limit = $request->length;
        $order = $columns[$request->order[0]['column']];
        $orderDir = 'desc';

        $recordsTotal =  Media::count();
        $totalFiltered = $recordsTotal;

        if(empty($searchedText) || $searchedText == "*"){

            $medias = Media::offset($start)
                ->limit($limit)
                ->orderBy($order, $orderDir)
                ->latest()
                ->get();
        }else{
            $medias = Media::where('name', 'LIKE', "%{$searchedText}%")
                ->orWhere('type', 'LIKE', "%{$searchedText}%")
                 ->offset($start)
                ->limit($limit)
                ->orderBy($order, $orderDir)
                ->latest()
                ->get();

            $totalFiltered = Media::where('name', 'LIKE', "%{$searchedText}%")
                ->orWhere('type', 'LIKE', "%{$searchedText}%")
                ->count();

        }


        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $totalFiltered,
            'data' => MediaResource::collection($medias)
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
            'photo' => 'required',
            'type' => 'required'
        ]);


        $path = $this->storeImage($request, 'photo');

        Media::create([
            'name' => $request->name,
            'type' => $request->type,
            'src' => 'storage/'.$path,
            'description' => $request->description
        ]);

        return response()->json([
            'message' => 'image successfully added',
            'link' => route('media.index')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $media = Media::where('id', $id)->first();
        return view($this->viewPath.'show')->with('media', $media);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media = Media::where('id', $id)->first();
        return view($this->viewPath.'edit')->with('media', $media);
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
        $this->validate($request,[
            'type' => 'required'
        ]);

        $media = Media::where('id', $id)->first();


        if($request->hasFile("photo")){

            $path = $this->storeImage($request, 'photo', $media);


            $media->update([
                'name' => $request->name,
                'type' => $request->type,
                'description' => $request->description,
                'src' => 'storage/'.$path
            ]);

            return response()->json([
                'message' => 'image successfully added',
                'link' => route('media.show', $id)
            ]);

        }

        $media->update([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'image successfully added',
            'link' => route('media.show', $id)
        ]);


    }

    public function destroyMultiple(Request $request)
    {
        $this->validate($request,[
            'ids' => 'required'
        ]);


        foreach ($request->ids as $id){

            Media::where('id', $id)->delete();

        }


        return response()->json([
            'message' => 'Images deleted successfully',
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Media::where('id', $id)->delete();

        return response()->json([
            'message' => 'Image deleted successfully',
            'redirect_to' => route('media.index')
        ]);
    }
}
