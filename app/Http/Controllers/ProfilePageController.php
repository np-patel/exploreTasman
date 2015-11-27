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
use App\PhotoMapImageUploader;

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
        // $userInfo = UserAdditionalInfo::where('user_id', \Auth::user()->id)->first();
        $userInfo = \Auth::user();

        $allEvents = Events::orderBy('created_at', 'DESC')->take(2)->get();

        $allUserPhotos = PhotoMapImageUploader::where('userId', \Auth::user()->id)->orderBy('photoMapId', 'DESC')->take(6)->get();
        
            return view('profilePage.index', compact('allUserPosts', 'userInfo', 'allEvents', 'allUserPhotos'));

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

        $this->validate($request,[
                'firstName'=> 'required|max:15',
                'lastName'=> 'required|max:15',
                'profession'=> 'required|max:50'
                
            ]);


        $UAI = UserAdditionalInfo::where('user_id', \Auth::user()->id)->get();
        
        if (!$UAI->isEmpty()) {

            // dd('u have saved data in the database ');
            $userUpdateInfo = $UAI->first();

            // dd($userUpdateInfo);
            // $userUpdateInfo->fill($request->input());

            $userUpdateInfo->firstName = $request->get('firstName');
            $userUpdateInfo->lastName = $request->get('lastName');
            $userUpdateInfo->bio = $request->get('profession');


            //profile Image
            if ( $request->hasFile('profileImage')) {

                $fileName = uniqid().'.'.$request->file('profileImage')->getClientOriginalExtension();

                \Image::make($request->file('profileImage') )
                    ->save('img/Profile/ProfileImage/'.$fileName);

                
                    if($userUpdateInfo->profileImage != 'default.jpg'){
                        //delete the old image
                        \File::Delete('img/Profile/ProfileImage/'.$userUpdateInfo->profileImage);
                    }

                $userUpdateInfo->profileImage = $fileName;

            }

            //cover Image
            if ( $request->hasFile('coverImage')) {

                $fileName = uniqid().'.'.$request->file('coverImage')->getClientOriginalExtension();

                \Image::make($request->file('coverImage') )
                    ->save('img/Profile/Cover/'.$fileName);

                
                    if($userUpdateInfo->CoverImage != 'default.jpg'){
                        //delete the old image
                        \File::Delete('img/Profile/Cover/'.$userUpdateInfo->CoverImage);
                    }

                $userUpdateInfo->CoverImage = $fileName;

            }


            $userUpdateInfo->save();

            return redirect('profilePage');

         }

         else{

            $userInfo = new UserAdditionalInfo();

            $userInfo->firstName = $request->get('firstName');

            $userInfo->lastName = $request->get('lastName');

            $userInfo->user_id = \Auth::user()->id;

            if($request->file('profileImage') == ''){

                $userInfo->profileImage = 'default.jpg';
            }
            else{
                $profileImage = uniqid().'.'.$request->file('profileImage')->getClientOriginalExtension();

                \Image::make($request->file('profileImage') )
                ->save('img/Profile/ProfileImage/'.$profileImage);

                $userInfo->profileImage = $profileImage;
            }

            if($request->file('coverImage') == ''){

                $userInfo->CoverImage = 'default.jpg';
            }

            else{
                $coverImage = uniqid().'.'.$request->file('coverImage')->getClientOriginalExtension();

                \Image::make($request->file('coverImage') )
                ->save('img/Profile/Cover/'.$coverImage);

                $userInfo->CoverImage = $coverImage;
            }

            $userInfo->bio = $request->get('profession');

            $userInfo->save();

            return redirect('profilePage');
         }
    }


        public function updatePost(Request $request, $updatePostId){

        $this->validate($request,[
                'updateStatus'=> 'required|max:255',
                // 'photo' => 'required|image'
            ]);

        $updatePost = Posts::find($updatePostId);
        $updatePost->status = $request->get('updateStatus');

        if ( $request->hasFile('updatephoto')) {

            $fileName = uniqid().'.'.$request->file('updatephoto')->getClientOriginalExtension();

            \Image::make($request->file('updatephoto') )
                ->save('img/Post/'.$fileName);

                //delete the old image
                \File::Delete('img/Post/'.$updatePost->photo);
                

            $updatePost->photo = $fileName;

        }

        $updatePost->save();

        return redirect('profilePage');
        

    }

    public function deletePost($deletePostId){

        $deletePost = Posts::find($deletePostId);

        if ($deletePost->photo != 'noImage.jpg') {
             //delete the image associative with the post
            \File::Delete('img/Post/'.$deletePost->photo);
        }

        $deletePost->delete();

        return redirect('profilePage');
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
