<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Posts;
use App\User;
use App\Comments;
use App\UserAdditionalInfo;

class ProfilePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $allUserPosts = Posts::where('user_id', \Auth::user()->id)->orderBy('created_at', 'DESC')->get();

        // $UAI = UserAdditionalInfo::findOrFail($UAI_id);

        return view('profilePage.index', compact('allUserPosts', 'UAI'));
    }


    public function postNewsFeed(Request $request){
// $url = $request->url();
// dd($url);
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

        return redirect('profilePage');
    }

    public function updateUserProfile(Request $request){


        $UAI = UserAdditionalInfo::where('user_id', \Auth::user()->id)->get();
        
        if (!$UAI->isEmpty()) {

            dd('u have saved data in the database ');
            // $userUpdateInfo = UserAdditionalInfo::findOrFail($id);

            // dd($userUpdateInfo);

            // $userUpdateInfo->firstName = $request->get('firstName');

            // $userUpdateInfo->save();

            // return redirect('profilePage');

         }

         else{

            $userInfo = new UserAdditionalInfo();

            $userInfo->firstName = $request->get('firstName');

            $userInfo->lastName = $request->get('lastName');

            $userInfo->user_id = \Auth::user()->id;

                $profileImage = uniqid().'.'.$request->file('profileImage')->getClientOriginalExtension();

                    \Image::make($request->file('profileImage') )
                    ->save('img/Profile/'.$profileImage);

            $userInfo->profileImage = $profileImage;

                $coverImage = uniqid().'.'.$request->file('coverImage')->getClientOriginalExtension();

                        \Image::make($request->file('coverImage') )
                        ->save('img/Profile/cover/'.$coverImage);

            $userInfo->CoverImage = $coverImage;

            $userInfo->bio = $request->get('userBio');

            $userInfo->save();

            return redirect('profilePage');
         }
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
