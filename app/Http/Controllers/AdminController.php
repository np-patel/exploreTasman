<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Marker_location;
use App\Events;
use App\Posts;
use App\PhotoMapImageUploader;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $allLocations = Marker_location::all();
        $allEvents = Events::orderBy('created_at', 'DESC')->get();
        $allPost = Posts::orderBy('created_at', 'DESC')->get(); //getting all the post from post database table
        $allUserPhotos = PhotoMapImageUploader::orderBy('photoMapId')->get();



        return view('admin.index', compact('allLocations', 'allEvents', 'allPost', 'allUserPhotos'));
    }


    public function addEvent(Request $request){
        // dd('add event');

        $this->validate($request,[
                'eventTitle'=> 'required|max:20|min:3',
                'eventImage' => 'required|image',
                'Date&Time'=> 'required',
                'eventDescription'=> 'required|max:500|min:10'
            ]);

        $addEvent = new Events();

        $addEvent->eventName = $request->get('eventTitle');

        $addEvent->eventDate = $request->get('Date&Time');

        $addEvent->eventUserId = \Auth::user()->id;

        $fileName = uniqid().'.'.$request->file('eventImage')->getClientOriginalExtension();

        \Image::make($request->file('eventImage') )
            ->save('img/Event/'.$fileName);

        $addEvent->eventImage = $fileName;

        $addEvent->eventLocationId = $request->eventLocation;

        $addEvent->eventDescription = $request->get('eventDescription');

        $addEvent->save();

        return redirect('events');

    }

    public function updateEvent(Request $request, $id){

        $this->validate($request,[
                'updateEventTitle'=> 'required|max:20|min:3',
                'picDate'=> 'required',
                'updateEventDescription'=> 'required|max:500|min:10'
            ]);

        $updateEvent = Events::where('event_id', $id)->firstOrFail();

        $updateEvent->eventName = $request->updateEventTitle;

        $updateEvent->eventUserId = \Auth::user()->id;

        $updateEvent->eventLocationId = $request->updateEventLocation;

        $updateEvent->eventDate = $request->get('picDate');

        $updateEvent->eventDescription = $request->get('updateEventDescription');

        if ( $request->hasFile('updateEventImage')) {

            $fileName = uniqid().'.'.$request->file('updateEventImage')->getClientOriginalExtension();

            \Image::make($request->file('updateEventImage') )
                ->save('img/Event/'.$fileName);

            //delete the old image
            \File::Delete('img/Event/'.$updateEvent->eventImage);

            $updateEvent->eventImage = $fileName;

        }

        $updateEvent->save();

        return redirect('events');

    }

    public function deleteEvent($deleteEventId){
        // return('i ma deleting event');

        //$deleteEvent = Events::where('event_id', $deleteEventId)->firstOrFail();
        $deleteEvent = Events::find($deleteEventId);
        //return $deleteEvent->eventImage;

        //delete the image associative with the event
            \File::Delete('img/Event/'.$deleteEvent->eventImage);

        $deleteEvent->delete();

        return redirect('events');
    }

    public function deletePost($deletePostId){

        $deletePost = Posts::find($deletePostId);

        if ($deletePost->photo != 'noImage.jpg') {
             //delete the image associative with the post
            \File::Delete('img/Post/'.$deletePost->photo);
        }

        $deletePost->delete();

        return redirect('admin');
    }


    public function deleteUserImage($deleteImageId){

         $deleteUserImage = PhotoMapImageUploader::find($deleteImageId);

         //delete the image associative with the event
            \File::Delete('img/PhotoMap/'.$deleteUserImage->locationImage);

        $deleteUserImage->delete();

        return redirect('admin');
    }

    public function addMarker(Request $request){
        // return('add');

        $addmarkerLocation = new Marker_location();

        $addmarkerLocation->locationName = $request->get('locationName');
        $addmarkerLocation->latitude = $request->get('lat');
        $addmarkerLocation->longitude = $request->get('long');

        $addmarkerLocation->save();

        return redirect('photoMap');

    }

    public function deleteMarker($deleteMarkerId){

         $deleteMarker = Marker_location::find($deleteMarkerId);

         $allImages = $deleteMarker->PhotoMapImageUploader;

         foreach( $allImages as $image ) {
            \File::Delete('img/PhotoMap/'.$image->locationImage);
         }


         $deleteMarker->delete();

        return redirect('photoMap');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
