<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Posts;
use App\User;
use App\Comments;
use App\UserAdditionalInfo;
use App\Events;

class HomeController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        $allPost = Posts::orderBy('created_at', 'DESC')->get(); //getting all the post from post database table

        $userInfo = \Auth::user();

        $allEvents = Events::orderBy('created_at', 'DESC')->take(2)->get();

          return view('home.index', compact('allPost', 'userInfo', 'allEvents'));
    }

    public function postNewsFeed(Request $request){

        $this->validate($request,[
                'status'=> 'required|max:255',
                // 'photo' => 'required|image'
            ]);

        $post = new Posts();
        $post->status = $request->get('status');

    if($request->file('photo') == ''){

        $post->photo = 'noImage.jpg';
    }
    else{
        $fileName = uniqid().'.'.$request->file('photo')->getClientOriginalExtension();

        // \Image::make($request->file('photo') )
        //     ->resize(750, null, function($constraint){
        //         $constraint->aspectRatio();
        //     })->save('img/Post/'.$fileName);

        \Image::make($request->file('photo') )
            ->save('img/Post/'.$fileName);

        $post->photo = $fileName;
    }

        $post->user_id = \Auth::user()->id;

        $post->save();

        return redirect('home');


    
    }

    //*************************** this code is for getting all comments from comments table*********************//

    // public function showComments(){

    //     $allComments = Comments::all();
    //     return view('home.index', compact('allComments'));

    // }

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
