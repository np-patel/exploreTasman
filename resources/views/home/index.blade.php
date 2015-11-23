
@extends('master')

@section('main_content')


<div class="container">

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
            <form action="/home/index" method="post" enctype="multipart/form-data"     class="form-horizontal" role="form" novalidate>

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


      <!--  Post 1 -->
      @foreach($allPost as $post)
      <div class="panel panel-white post panel-shadow">
        <div class="post-heading">
        {{-- if person is loggedin is == to person post userid than show this update function  --}}
        {{-- <div> --}}
            {{-- <a href="" class="pull-right hi" data-userpost-delete="{{$post->id}}">i</a> --}}
            <a href="" class="pull-right hi" data-userpost-delete="{{$post->id}}">i</a>
            
        {{-- </div> --}}

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



    </div> <!-- end of col 8 -->

    <div class="col-md-4">

      <div class="card2 hovercard">
       {{-- <img src="http://placehold.it/300x200/000000/&text=Header" alt=""/> --}}
       <div>
        @if($userInfo->additionalInfo) 
        <img src="img/Profile/Cover/{{$userInfo->additionalInfo->CoverImage}}">
        @else 
        <img src="img/Profile/Cover/default.jpg">
        @endif
      </div>
      <div class="avatar">
        {{-- <img src="http://placehold.it/80X80/333333/&text=Head" alt="" /> --}}
        @if($userInfo->additionalInfo) 
        <img src="img/Profile/ProfileImage/{{$userInfo->additionalInfo->profileImage}}">
        @else 
        <img src="img/Profile/ProfileImage/default.jpg">

        @endif
      </div>
      <div class="info">
        <div class="title">
          @if($userInfo->additionalInfo) 
          {{$userInfo->additionalInfo->firstName}} {{$userInfo->additionalInfo->lastName}}
          @else
          {{$userInfo->username}}
          @endif
        </div>
        <div class="desc">
          @if($userInfo->additionalInfo) 
          {{$userInfo->additionalInfo->bio}}
          @else
          write About Your Self
          @endif

        </div>

      </div>
    </div>

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
          <img src="img/Profile/ProfileImage/event.jpg" class="event-img-rounded avatar" alt="user profile image">
        </div>
        <div class="meta">
          <div class="title">
            {{$event->eventName}}
          </div>
          <h5 class="text-muted time">{{$event->created_at->format('d M Y')}}</h5>
          <h6 class="text-muted time">Comming In 5 Days</h6>
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

    <div class="panel panel-default"> 
      <div class="picture-title">
        <p>Recent Images</p>
      </div>
      <div class="panel-body text-center"> 
        <ul class="photos"> 
          <li> <a href="#"> <img src="http://placehold.it/600x350" alt="photo 1" width="100%" class="img-responsive show-in-modal"> </a> 
          </li>
          <li> <a href="#"> <img src="http://placehold.it/600x350" alt="photo 2" width="100%" class="img-responsive show-in-modal"> </a> 
          </li>
          <li> <a href="#"> <img src="http://placehold.it/600x350" alt="photo 3" width="100%" class="img-responsive show-in-modal"> </a> 
          </li>
          <li> <a href="#"> <img src="http://placehold.it/600x350" alt="photo 4" width="100%" class="img-responsive show-in-modal"> </a> 
          </li>
          <li> <a href="#"> <img src="http://placehold.it/600x350" alt="photo 5" width="100%" class="img-responsive show-in-modal"> </a> 
          </li>
          <li> <a href="#"> <img src="http://placehold.it/600x350" alt="photo 6" width="100%" class="img-responsive show-in-modal"> </a> 
          </li>
        </ul> 
      </div>
    </div>

  </div>

</div><!-- /.row -->

</div><!-- /.container -->

@endsection