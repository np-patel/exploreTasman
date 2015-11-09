<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PhotoMapImageUploader;

class PhotoUploderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function uploadUserImage(Request $request){
        
        $this->validate($request,[
                'imageTitle'=> 'required|max:20|min:3',
                'locationImage' => 'required|image',
                'imageDescription'=> 'required|max:100|min:10'
            ]);

        $uploadImage = new PhotoMapImageUploader();

        $uploadImage->title = $request->get('imageTitle');
        $uploadImage->userId = \Auth::user()->id;

        $fileName = uniqid().'.'.$request->file('locationImage')->getClientOriginalExtension();


        \Image::make($request->file('locationImage') )
            ->save('img/'.$fileName);

        $uploadImage->locationImage = $fileName;

        $uploadImage->markerLocationId = $request->imageLocation;

        $uploadImage->imageDescription = $request->get('imageDescription');

        $uploadImage->save();

        return redirect('photoMap');
    }


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
        //
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
}
