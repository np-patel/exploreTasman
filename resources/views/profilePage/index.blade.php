
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
            <img src="img/Profile/ProfileImage/{{$userInfo->additionalInfo->profileImage}}" height="120" width="120">
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
             <input class="btn btn-profile" value="Edit Profile" type="submit"> 
           </div>
         </div>
       </div>
     </div>  
   </div>      
 </div>

 <div class="row">

  <div class="col-md-8">

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
            {{$errors->first('status')}}
            
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
                23 Comments
              </a>
            </div>
          </div>




          <div class="post-footer">

            <form action="/comment/add" method="post" class="form-horizontal" role="form" novalidate>

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
          {{-- {{$errors->first('imageTitle')}} --}}
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
          {{-- {{$errors->first('imageTitle')}} --}}
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
          <label for="userBio">About Me: </label>
          <textarea id="userBio" name="userBio" class="form-control" placeholder="Write about image">{{$Bio}}</textarea>
          {{-- {{$errors->first('imageDescription')}} --}}
          
        </div>
        
        <input type="submit" value="Update Profile" class="btn btn-primary" name="updateProfile" />
      </form>
    </div>

  </div>
</div>








</div> <!-- end of col 8 -->

<div class="col-md-4">

  <!-- events -->

  <div class="panel">
    <div class="events-title">
      <p>Events</p>
    </div>
    <!-- event1 -->
    <div class="event-heading clearfix">
      <div class="pull-left image">
        <img src="img/Profile/ProfileImage/event.jpg" class="event-img-rounded avatar" alt="user profile image">
      </div>
      <div class="meta">
        <div class="title h5">
          <a href="#">Event Name</a>
        </div>
        <h5 class="text-muted time">22 October 2015</h5>
        <h6 class="text-muted time">Comming In 5 Days</h6>
      </div>
      <div class="event-description">
        <p>Loremzfgzf drghs hdhdfhgvabgklbfg b klabglakbg bsgklbgklajbgkjal gkag kag k ipsum</p>
      </div>
    </div>

    <!-- event2 -->
    <div class="event-heading clearfix">
      <div class="pull-left image">
        <img src="img/Profile/ProfileImage/event.jpg" class="event-img-rounded avatar" alt="user profile image">
      </div>
      <div class="meta">
        <div class="title h5">
          <a href="#">Event Name</a>
        </div>
        <h5 class="text-muted time">22 October 2015</h5>
        <h6 class="text-muted time">Comming In 5 Days</h6>
      </div>
      <div class="event-description">
        <p>Loremzfgzf drghs hdhdfhgvabgklbfg b klabglakbg bsgklbgklajbgkjal gkag kag k ipsum</p>
      </div>
    </div>

  </div>

  <!-- picture -->

  <div class="panel panel-default"> 
    <div class="picture-title">
      <p>Recent Images</p>
    </div>
    <div class="panel-body text-center"> 
      <ul class="photos"> 
        <li> <a href="#"> <img src="http://placehold.it/600x350" alt="photo 1" class="img-responsive show-in-modal"> </a> 
        </li>
        <li> <a href="#"> <img src="http://placehold.it/600x350" alt="photo 2" class="img-responsive show-in-modal"> </a> 
        </li>
        <li> <a href="#"> <img src="http://placehold.it/600x350" alt="photo 3" class="img-responsive show-in-modal"> </a> 
        </li>
        <li> <a href="#"> <img src="http://placehold.it/600x350" alt="photo 4" class="img-responsive show-in-modal"> </a> 
        </li>
        <li> <a href="#"> <img src="http://placehold.it/600x350" alt="photo 5" class="img-responsive show-in-modal"> </a> 
        </li>
        <li> <a href="#"> <img src="http://placehold.it/600x350" alt="photo 6" class="img-responsive show-in-modal"> </a> 
        </li>
      </ul> 
    </div>
  </div>
  
</div>

</div><!-- /.row -->

</div><!-- /.container -->

@endsection