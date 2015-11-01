<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Posts;
use App\User;
use App\Comments;

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
    public function index()
    {
         
         $allPost = Posts::all(); //getting all the post from post database table

         $allComments = Comments::orderBy('created_at')->get(); //getting all the comments from comment table

          return view('home.index', compact('allPost', 'allComments'));
    }

    public function postNewsFeed(Request $request){

        $this->validate($request,[
                'status'=> 'required|max:255',
                // 'photo' => 'required|image'
            ]);

        $post = new Posts();
        $post->status = $request->get('status');

        $fileName = uniqid().'.'.$request->file('photo')->getClientOriginalExtension();

        // \Image::make($request->file('photo') )
        //     ->resize(750, null, function($constraint){
        //         $constraint->aspectRatio();
        //     })->save('img/Post/'.$fileName);

        \Image::make($request->file('photo') )
            ->save('img/Post/'.$fileName);

        $post->photo = $fileName;

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
