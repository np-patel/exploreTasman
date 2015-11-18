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
