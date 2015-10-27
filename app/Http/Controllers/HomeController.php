<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Posts;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          return view('home.index');
    }

    public function postNewsFeed(Request $request){

        $this->validate($request,[
                'status'=> 'required|max:255',
                // 'photo' => 'required|image'
            ]);

        $post = new Posts();
        $post->status = $request->get('status');

        $fileName = uniqid().'.'.$request->file('photo')->getClientOriginalExtension();

        \Image::make($request->file('photo') )
            ->resize(320, null, function($constraint){
                $constraint->aspectRatio();
            })->save('img/Post/'.$fileName);

        $post->photo = $fileName;




        // $capture->user_id = \Auth::user()->id;
        // $capture->pokemon_id = $request->pokemon;

        $post->save();

        //find out the name of the pokemon the user has just capture
        // $pokemon = Pokemon::findOrFail($request->pokemon);

        return redirect('home');


    
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
