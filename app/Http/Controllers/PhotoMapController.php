<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Marker_location;
use App\PhotoMapImageUploader;
use Response;
class PhotoMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $allUserPhotos = PhotoMapImageUploader::all();
        $allLocations = Marker_location::all();

        return view('photoMap.index', compact('allUserPhotos', 'allLocations')); 
        
    }

    public function getMarkers(){
         $MarkerLocation = Marker_location::orderBy('id')->get();

        // $data = [];

        //  foreach( $MarkerLocation as $test ) {
           
        //    $data[] = $test->PhotoMapImageUploader;
        //  }

        //  return $data;

         
         // return json_encode($MarkerLocation);
            return  Response::json($MarkerLocation);
         // return Response::json(array(
         //            'success' => true,
         //            'data'   => $MarkerLocation
         //        )); 
    }

    public function getImages(){

        // $allUserPhotos = PhotoMapImageUploader::all();



        // return view('photoMap.index', compact('allUserPhotos')); 

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
