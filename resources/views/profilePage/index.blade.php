
@extends('master')

@section('main_content')


<div class="container">

  <div class="row">
    <div class="col-md-12">
      <div class="cover-container" >
        <div id="cv">
          {{-- <img src="img/Profile/cover/{{$userInfo->CoverImage}}"> --}}
          {{-- @if($allUserPosts->user->additionalInfo)  --}}
          @if($userInfo->additionalInfo) 

          <img src="img/Profile/Cover/{{$userInfo->additionalInfo->CoverImage}}">
          
          @else 
          
          <img src="img/Profile/Cover/default.jpg">
          
          @endif

          
        </div>

        <div class="social-cover">

        </div>
        
        <div class="social-avatar"> 

          <div class="img-avatar pull-left">
            {{-- <img src="img/Profile/{{$userInfo->profileImage}}" height="120" width="120"> --}}

            @if($userInfo->additionalInfo) 
            <img src="img/Profile/ProfileImage/{{$userInfo->additionalInfo->profileImage}}">
            @else 
            <img src="img/Profile/ProfileImage/default.jpg" height="120" width="120">
            
            @endif
          </div>
          <div class="profile-text">
            <h4 class=" profileName text-left text-shadow">
              @if($userInfo->additionalInfo) 
              {{$userInfo->additionalInfo->firstName}} {{$userInfo->additionalInfo->lastName}}
              @else
              {{$userInfo->username}}
              @endif
            </h4> 
            <h5 class=" profileBio text-left" style="opacity:0.8;">
              @if($userInfo->additionalInfo) 
              {{$userInfo->additionalInfo->bio}}
              @else
              write About Your Self
              @endif
            </h5>
            
            <div class="text-left"> 
              <a href="#UpdateProfile" aria-controls="profile" role="tab" data-toggle="tab">Edit Profile</a> 
           </div>
         </div>
       </div>
     </div>  
   </div>      
 </div>

 <div class="row">

  <div class="profile_col col-md-8 col-sm-7">

    <div class="panel">
      <ul class="nave nav-tabs clearfix" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Add Your Feed</a></li>
        {{-- <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Add Photo/Video</a></li> --}}
        
      </ul>

      <!-- Tab panes -->
      <div class="tab-content clearfix">
        <div role="tabpanel" class="tab-pane active" id="home">
          <form action="/profilePage/postFeed" method="post" enctype="multipart/form-data"     class="form-horizontal" role="form" novalidate>

            {{ csrf_field() }}

            <div class="form-group" style="padding:14px; margin-bottom:0px;">
              <textarea id="status" name="status" class="form-control" placeholder="Update your status"></textarea>
            </div>
            @if($errors->first('status'))
                <div class="alert alert-danger">{{$errors->first('status')}}</div>
            @endif
            
            <input class="btn btn-primary pull-right" value="post" type="submit">

            <div class="btn btn-style btn-file pull-right ">
              <i class="glyphicon glyphicon-camera pull-right"></i> <input id="photo" name="photo" type="file">
              
            </div>
          </form>
        </div>
        {{-- <div role="tabpanel" class="tab-pane" id="profile">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div> --}}
        
      </div>
    </div>




    <!-- All posts and update Profile Page  -->

    <div class="panel">
      <ul class="nave nav-tabs clearfix" role="tablist">
        <li role="presentation" class="active"><a href="#allUserProfile" aria-controls="home" role="tab" data-toggle="tab">All Posts</a></li>
        <li role="presentation"><a href="#UpdateProfile" aria-controls="profile" role="tab" data-toggle="tab">Update Profile</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content tab-PostContent clearfix">
        <div role="tabpanel" class="tab-pane active" id="allUserProfile">

         <!--  Post 1 -->
         @foreach($allUserPosts as $post)
         <div class="panel panel-white post panel-shadow">
          <div class="post-heading">

            {{-- if person is loggedin is == to person post userid than show this update function  --}}
              @if(\Auth::user()->id == $post->user_id)
              <div>
                  <a herf="" class="pull-right updatePost2" data-toggle="modal" data-target="#deleteUserPost" data-userid-delete="{{$post->id}}"><i class="fa fa-trash-o"></i></a>
                  
              </div>

              <div>
                  <a herf="" class="pull-right updatePost2" data-toggle="modal" data-target="#updatePost" data-userpost-update="{{$post->status}}" data-userid-update="{{$post->id}}"><i class="fa fa-pencil"></i></a>
                  
              </div>
              @else

              @endif

            <div class="pull-left image">

              <img src="img/Profile/ProfileImage/{{ $post->user->additionalInfo ? $post->user->additionalInfo->profileImage : 'default.jpg' }}" class="img-rounded avatar" alt="user profile image">
            </div>
            <div class="pull-left meta">
              <div class="title h5">
                <a href="#" class="post-user-name">
                  @if($post->user->additionalInfo) 
                  {{ $post->user->additionalInfo->firstName }} {{ $post->user->additionalInfo->lastName }}

                  @else 
                  {{ $post->user->username }}
                  @endif

                </a>

              </div>
              <h6 class="text-muted time">{{ $post->created_at->format('M d,Y \a\t h:i a') }}</h6>
            </div>
          </div>

          @if($post->photo == 'noImage.jpg')

          @else
          <div class="post-image">
            <img src="img/Post/{{$post->photo}}" alt="image post">
          </div>
          @endif

          <div class="post-description">
            <p>{{$post->status}}</p>
            <div class="stats">
              <a href="#">
                <i class="fa fa-commenting-o"></i>
                {{$post->comments->count()}}
              </a>
            </div>
          </div>




          <div class="post-footer">

            <form action="/comment/profilePageAdd" method="post" class="form-horizontal" role="form" novalidate>

              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="on_post" value="{{ $post->id }}">

              <div class="input-group"> 
                <input class="form-control" name="body" placeholder="Add a comment" type="text">
                <span class="input-group-addon">
                  <input type="submit" name='post_comment' value="post">
                  {{-- <a href="#"><i class="fa fa-edit"></i></a>   --}}
                </span>
              </div>
            </form>
            <ul class="comments-list">

              @foreach($post->comments as $comment)

              <li class="comment">
                <a class="pull-left" href="#">
                  <img class="avatar" src="img/Profile/ProfileImage/{{ $comment->user->additionalInfo ? $comment->user->additionalInfo->profileImage : 'default.jpg' }}" alt="avatar">
                </a>
                <div class="comment-body">
                  <div class="comment-heading">
                    <h4 class="comment-user-name"><a href="#">
                      {{-- {{$comment->user->username}} --}}
                      @if($comment->user->additionalInfo) 
                      {{ $comment->user->additionalInfo->firstName }} {{ $comment->user->additionalInfo->lastName }}

                      @else 
                      {{ $comment->user->username }}
                      @endif

                    </a></h4>
                    <h5 class="time">{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</h5>
                  </div>
                  <p>{{ $comment->body }}</p>
                </div>
              </li>
              @endforeach

            </ul>
          </div>
        </div>
        @endforeach

        <!-- post 2 -->

      </div>
      <div role="tabpanel" class="tab-pane" id="UpdateProfile">

        <form role="form" action="/profilePage/edit" method="post" enctype="multipart/form-data" role="form" novalidate>

         <input type="hidden" name="_token" value="{{ csrf_token() }}">

         <div class="form-group">
          <label for="firstName">FirstName: </label>

          @if($userInfo->additionalInfo) 
          <?php $firstName = $userInfo->additionalInfo->firstName ?>
          @else
          <?php $firstName = '' ?>
          @endif

          <input type="text" class="form-control"
          id="firstName" name="firstName" value="{{ $firstName }}"/>
          <span class="validation">{{$errors->first('firstName')}}</span>
        </div>

        @if($userInfo->additionalInfo) 
        <?php $lastName = $userInfo->additionalInfo->lastName ?>
        @else
        <?php $lastName = '' ?>
        @endif

        <div class="form-group">
          <label for="lastName">LastName: </label>
          <input type="text" class="form-control"
          id="lastName" name="lastName" value="{{ $lastName }}"/>
          <span class="validation">{{$errors->first('lastName')}}</span>
        </div>

        <div class="form-group">
          <label for="profileImage">Upload-profile-Image</label>
          <input id="profileImage" name="profileImage" type="file">
          {{-- {{$errors->first('locationImage')}} --}}
        </div>

        <div class="form-group">
          <label for="coverImage">Upload-cover-Image</label>
          <input id="coverImage" name="coverImage" type="file">
          {{-- {{$errors->first('locationImage')}} --}}
        </div>

        @if($userInfo->additionalInfo) 
        <?php $Bio = $userInfo->additionalInfo->bio ?>
        @else
        <?php $Bio = '' ?>
        @endif

        <div class="form-group">
          <label for="profession">Your profession: </label>
          <textarea id="profession" name="profession" class="form-control" placeholder="Write about your profession (keep your answer Short to 50 letters)">{{$Bio}}</textarea>
          <span class="validation">{{$errors->first('profession')}}</span>
          
        </div>
        
        <input type="submit" value="Update Profile" class="btn btn-primary" name="updateProfile" />
      </form>
    </div>

  </div>
</div>








</div> <!-- end of col 8 -->

<div class="profile_col_1 col-md-4 col-sm-5">

  <!-- events -->

<!-- events -->
@if(!$allEvents->isEmpty())
<div class="panel">
  <div class="events-title">
    <p>Events</p>
</div>
<!-- event1 -->

@foreach($allEvents as $event )
<div class="event-heading clearfix">
    <div class="pull-left image">
      <img src="img/Event/{{ $event->eventImage}}" class="event-img-rounded avatar" alt="user profile image">
  </div>
  <div class="meta">
      <div class="title">
        {{$event->eventName}}
    </div>
    <h5 class="text-muted time">{{ \Carbon\Carbon::parse($event->eventDate )->toFormattedDateString() }}</h5>
    <h6 class="text-muted time">{{ \Carbon\Carbon::parse($event->eventDate )->diffForHumans() }}</h6>
</div>
<div class="event-description">
  <div id="txt">
    <p>{{$event->eventDescription}}</p>
</div>
</div>
</div>
@endforeach

</div>
@else

@endif

  <!-- picture -->

@if(!$allUserPhotos->isEmpty())
  <div class="panel panel-default"> 
    <div class="picture-title">
      <p>Recent Images</p>
  </div>
  <div class="panel-body text-center"> 
      <ul class="photos"> 
          @foreach($allUserPhotos as $photo)
          <li> <a href="#"> <img src="img/PhotoMap/{{ $photo->locationImage }}" data-toggle="modal" data-target="#userImage{{$photo->photoMapId}}" alt="photo 1" class="img-responsive"> </a></li>
          @endforeach  
      </ul> 
  </div>
  </div>
@else

@endif
  
</div>

</div><!-- /.row -->

</div><!-- /.container -->

<!-- Modal -->
<div id="updatePost" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Event</h4>
    </div>
    <div class="modal-body">
        <div>
            <form id="UpdateUserPost" role="form" action="" method="post" enctype="multipart/form-data" role="form" novalidate>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                    <label for="updateStatus">Event Description</label>
                    <textarea id="updateStatus" name="updateStatus" class="form-control" placeholder="Write about event"></textarea>
                    <span class="validation">{{$errors->first('updateStatus')}}</span>
                    
                </div>
                
                <input type="submit" value="Update Post" class="btn btn-primary" name="update post"/>

            </form>
        </div>
    </div>
</div>

</div>
</div>

{{-- model for delete Post --}}

<div id="deleteUserPost" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content clearfix">
      <div class="modal-header1 clearfix">
        <a href="" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
        
    </div>


    <div class="modal-body text-center">
        <p>Are You Sure. You Want To Delete This Post?</p>
    </div>
    <div class="col-md-12 text-center footer-model-btn">
        <div class="col-md-3 col-md-offset-3">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
        </div>

        <div class="col-md-3 col-md-offset-right-3">
            <a href="" class="btn btn-primary deleteUserPostButton">Delete</a>
        </div>
    </div>
</div>
</div>
</div>


<!-- Modal for user images -->
@foreach($allUserPhotos as $photo)
<div id="userImage{{$photo->photoMapId}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{$photo->title}}</h4>
            </div>
            <div class="modal-body">
                <div class="modalImage text-center">
                    <img src="img/PhotoMap/{{ $photo->locationImage }}" class="img-responsive">
                </div>

                <div class="modelBodyText">
                    <p>{{$photo->imageDescription}}</p>
                </div>
            </div>
        </div>

    </div>
</div>

@endforeach

@endsection