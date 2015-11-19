<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Marker_location;
use App\Events;


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

        return view('admin.index', compact('allLocations', 'allEvents'));
    }


    public function addEvent(Request $request){
        // dd('add event');
        $addEvent = new Events();

        $addEvent->eventName = $request->get('eventTitle');

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

        $updateEvent = Events::where('event_id', $id)->firstOrFail();

        $updateEvent->eventName = $request->updateEventTitle;

        $updateEvent->eventUserId = \Auth::user()->id;

        $updateEvent->eventLocationId = $request->updateEventLocation;

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

        $deleteEvent = Events::where('event_id', $deleteEventId)->delete();

        //delete the old image
            // \File::Delete('img/Event/'.$deleteEvent->eventImage);

        return redirect('events');
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
