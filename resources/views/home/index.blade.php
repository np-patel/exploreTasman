
@extends('master')

@section('main_content')


<div class="container">

    <div class="row">
		<div class="col-md-8">
            
            <div class="panel">
                <ul class="nave nav-tabs clearfix" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Add Your Feed</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Add Photo/Video</a></li>
                    
                </ul>

                <!-- Tab panes -->
                <div class="tab-content clearfix">
                    <div role="tabpanel" class="tab-pane active" id="home">
                    	 {{-- @yield('news_content') --}}
                         {{-- @include('views/home.newsFeed') --}}
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
                    <div role="tabpanel" class="tab-pane" id="profile">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
                    
                </div>
		    </div>


           <!--  Post 1 -->
           @foreach($allPost as $post)
              <div class="panel panel-white post panel-shadow">
                  <div class="post-heading">
                      <div class="pull-left image">
                          <img src="img/Profile/profile.jpg" class="img-rounded avatar" alt="user profile image">
                      </div>
                      <div class="pull-left meta">
                          <div class="title h5">
                              <a href="#" class="post-user-name">{{$post->user->username}} </a>
                              {{-- uploaded a photo.{{$post->user->username}} --}}
                          </div>
                          <h6 class="text-muted time">{{ $post->created_at->format('M d,Y \a\t h:i a') }}</h6>
                      </div>
                  </div>
                  <div class="post-image">
                      <img src="img/Post/{{$post->photo}}" alt="image post">
                  </div>
                  <div class="post-description">
                      <p>{{$post->status}}</p>
                      <div class="stats">
                          <a href="#">
                              <i class="fa fa-commenting-o"></i>
                              23 Comments
                          </a>
                      </div>
                  </div>

                  
        
    
                  {{-- <div class="post-footer">
                      <div class="input-group"> 
                          <input class="form-control" placeholder="Add a comment" type="text">
                          <span class="input-group-addon">
                              <a href="#"><i class="fa fa-edit"></i></a>  
                          </span>
                      </div>
                      <ul class="comments-list">
                          <li class="comment">
                              <a class="pull-left" href="#">
                                  <img class="avatar" src="img/Profile/profile.jpg" alt="avatar">
                              </a>
                              <div class="comment-body">
                                  <div class="comment-heading">
                                      <h4 class="comment-user-name"><a href="#">Antony andrew lobghi</a></h4>
                                      <h5 class="time">7 minutes ago</h5>
                                  </div>
                                  <p>This is a comment bla bla bla</p>
                              </div>
                          </li>
                          <li class="comment">
                              <a class="pull-left" href="#">
                                  <img class="avatar" src="img/Profile/profile.jpg" alt="avatar">
                              </a>
                              <div class="comment-body">
                                  <div class="comment-heading">
                                      <h4 class="comment-user-name"><a href="#">Jeferh Smith</a></h4>
                                      <h5 class="time">3 minutes ago</h5>
                                  </div>
                                  <p>This is another comment bla bla bla</p>
                              </div>
                          </li>
                          <li class="comment">
                              <a class="pull-left" href="#">
                                  <img class="avatar" src="img/Profile/profile.jpg" alt="avatar">
                              </a>
                              <div class="comment-body">
                                  <div class="comment-heading">
                                      <h4 class="comment-user-name"><a href="#">Maria fernanda coronel</a></h4>
                                      <h5 class="time">10 seconds ago</h5>
                                  </div>
                                  <p>Wow! so cool my friend</p>
                              </div>
                          </li>
                      </ul>
                  </div> --}}
              </div>
            @endforeach
              <!-- post 2 -->


              {{-- <div class="panel panel-white post panel-shadow">
                  <div class="post-heading">
                      <div class="pull-left image">
                          <img src="img/Profile/profile.jpg" class="img-rounded avatar" alt="user profile image">
                      </div>
                      <div class="pull-left meta">
                          <div class="title h5">
                              <a href="#" class="post-user-name">Nickson Bejarano</a>
                              
                          </div>
                          <h6 class="text-muted time">5 seconds ago</h6>
                      </div>
                  </div>
                  
                  <div class="post-description">
                      <p>This is a short description</p>
                      <div class="stats">
                          <a href="#">
                              <i class="fa fa-commenting-o"></i>
                              23 Comments
                          </a>
                      </div>
                  </div>
                  <div class="post-footer">
                      <div class="input-group"> 
                          <input class="form-control" placeholder="Add a comment" type="text">
                          <span class="input-group-addon">
                              <a href="#"><i class="fa fa-edit"></i></a>  
                          </span>
                      </div>
                      <ul class="comments-list">
                          <li class="comment">
                              <a class="pull-left" href="#">
                                  <img class="avatar" src="img/Profile/profile.jpg" alt="avatar">
                              </a>
                              <div class="comment-body">
                                  <div class="comment-heading">
                                      <h4 class="comment-user-name"><a href="#">Antony andrew lobghi</a></h4>
                                      <h5 class="time">7 minutes ago</h5>
                                  </div>
                                  <p>This is a comment bla bla bla</p>
                              </div>
                          </li>
                          <li class="comment">
                              <a class="pull-left" href="#">
                                  <img class="avatar" src="img/Profile/profile.jpg" alt="avatar">
                              </a>
                              <div class="comment-body">
                                  <div class="comment-heading">
                                      <h4 class="comment-user-name"><a href="#">Jeferh Smith</a></h4>
                                      <h5 class="time">3 minutes ago</h5>
                                  </div>
                                  <p>This is another comment bla bla bla</p>
                              </div>
                          </li>
                          <li class="comment">
                              <a class="pull-left" href="#">
                                  <img class="avatar" src="img/Profile/profile.jpg" alt="avatar">
                              </a>
                              <div class="comment-body">
                                  <div class="comment-heading">
                                      <h4 class="comment-user-name"><a href="#">Maria fernanda coronel</a></h4>
                                      <h5 class="time">10 seconds ago</h5>
                                  </div>
                                  <p>Wow! so cool my friend</p>
                              </div>
                          </li>
                      </ul>
                  </div>
              </div> --}}


        </div> <!-- end of col 8 -->

        <div class="col-md-4">

            <div class="card2 hovercard">
               <img src="http://placehold.it/300x200/000000/&text=Header" alt=""/>
               <div class="avatar">
                  <img src="http://placehold.it/80X80/333333/&text=Head" alt="" />
               </div>
               <div class="info">
                  <div class="title">
                     The Title
                  </div>
                  <div class="desc">Loremzfgzf drghs hdhdfhgvabgklbfg b klabglakbg bsgklbgklajbgkjal gkag kag k ipsum</div>
                  
               </div>
               <div class="bottom">
                  <button class="btn btn-default">Button</button>
               </div>
            </div>

            <!-- events -->

            <div class="panel">
                <div class="events-title">
                    <p>Events</p>
                </div>
                <!-- event1 -->
                <div class="event-heading clearfix">
                    <div class="pull-left image">
                        <img src="img/Profile/profile.jpg" class="event-img-rounded avatar" alt="user profile image">
                    </div>
                    <div class="meta">
                        <div class="title">
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
                        <img src="img/Profile/profile.jpg" class="event-img-rounded avatar" alt="user profile image">
                    </div>
                    <div class="meta">
                        <div class="title">
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