
@extends('master')

@section('main_content')


<div class="container">

  <div class="row">
    <div class="ups col-md-8 col-sm-7">

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


<!--  Post 1 -->
@foreach($allPost as $post)
<div class="panel panel-white post panel-shadow">
    <div class="post-heading">
        {{-- if person is loggedin is == to person post userid than show this update function  --}}
        @if(\Auth::user()->id == $post->user_id || \Auth::user()->role == 'admin' )
        <div>
            <a herf="" class="pull-right updatePost" data-toggle="modal" data-target="#deleteUserPost" data-userid-delete="{{$post->id}}"><i class="fa fa-trash-o"></i></a>
            
        </div>

        <div>
            <a herf="" class="pull-right updatePost" data-toggle="modal" data-target="#updatePost" data-userpost-update="{{$post->status}}" data-userid-update="{{$post->id}}"><i class="fa fa-pencil"></i></a>
            
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
        <h6 class="text-muted time">{{ \Carbon\Carbon::parse($post->created_at )->toDayDateTimeString() }}</h6>
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
    <p>
      <i class="fa fa-commenting-o"></i>
      {{$post->comments->count()}}
  </p>
</div>
</div>




<div class="post-footer">

  <form action="/comment/add" method="post" class="form-horizontal" role="form">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="on_post" value="{{ $post->id }}">

    <div class="input-group"> 
      <input class="form-control" id="commentTxt" name="commentTxt" placeholder="Add a comment" type="text" required>
        <span class="input-group-addon">
          <input type="submit" name='post_comment' value="post">
          {{-- <a href="#"><i class="fa fa-edit"></i></a>   --}}
        </span>
    </div>

    @if($errors->first('commentTxt'))
        <div class="alert alert-danger">{{$errors->first('commentTxt')}}</div>
    @endif

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
        <h5 class="time">{{ \Carbon\Carbon::parse($comment->created_at)->toDayDateTimeString() }}</h5>
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

<div class="ups1 col-md-4 col-sm-5">

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
        <h4 class="modal-title">Update Your Status</h4>
    </div>
    <div class="modal-body">
        <div>
            <form id="UpdateUserPost" role="form" action="" method="post" enctype="multipart/form-data" role="form" novalidate>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                    <label for="updateStatus">Update Status</label>
                    <textarea id="updateStatus" name="updateStatus" class="form-control" placeholder="Write about event"></textarea>
                    {{$errors->first('updateStatus')}}
                    
                </div>

                <div class="btn btn-style btn-file pull-left clearfix ">
                <i class="glyphicon glyphicon-camera pull-left"></i> <input id="updatephoto" name="updatephoto" type="file">

                </div>
                <div>
                <input type="submit" value="Update Post" class="btn btn-primary" name="update post"/>
                </div>
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

@foreach($allUserPhotos as $photo)


<!-- Modal for user images -->
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



