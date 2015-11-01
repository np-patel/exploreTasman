
@extends('master')

@section('main_content')


<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="cover-container" >
                <div class="social-cover">
                    
                </div>
                
                <div class="social-avatar"> 

                    <div class="img-avatar pull-left">
                        <img src="img/Profile/profile.jpg" height="120" width="120">
                    </div>
                    <div class="profile-text">
                        <h4 class=" profileName text-left text-shadow">Nehal Patel</h4> 
                        <h5 class=" profileBio text-left" style="opacity:0.8;">Write about myself sdfgszDGszG sZG sG SG SDGsdfa SDF sdF gdS SD Z fszg</h5>
                         
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
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Add Photo/Video</a></li>
                    
                </ul>

                <!-- Tab panes -->
                <div class="tab-content clearfix">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <form class="form-horizontal" role="form">
                            
                             <div class="form-group" style="padding:14px; margin-bottom:0px;">
                              <textarea class="form-control" placeholder="Update your status"></textarea>
                            </div>
                            <button class="btn btn-primary pull-right" type="button">Post</button>
                            
                                <div class="btn btn-style btn-file pull-right">
                                    <i class="glyphicon glyphicon-camera pull-right"></i> <input type="file">
                                </div>
                        
                          </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
                    
                </div>
            </div>


           <!--  Post 1 -->

              <div class="panel panel-white post panel-shadow">
                  <div class="post-heading">
                      <div class="pull-left image">
                          <img src="img/Profile/profile.jpg" class="img-rounded avatar" alt="user profile image">
                      </div>
                      <div class="pull-left meta">
                          <div class="title h5">
                              <a href="#" class="post-user-name">Nickson Bejarano</a>
                              uploaded a photo.
                          </div>
                          <h6 class="text-muted time">5 seconds ago</h6>
                      </div>
                  </div>
                  <div class="post-image">
                      <img src="img/Post/place1-full.jpg" alt="image post">
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
              </div>
            
              <!-- post 2 -->


              <div class="panel panel-white post panel-shadow">
                  <div class="post-heading">
                      <div class="pull-left image">
                          <img src="img/Profile/profile.jpg" class="img-rounded avatar" alt="user profile image">
                      </div>
                      <div class="pull-left meta">
                          <div class="title h5">
                              <a href="#" class="post-user-name">Nickson Bejarano</a>
                              uploaded a photo.
                          </div>
                          <h6 class="text-muted time">5 seconds ago</h6>
                      </div>
                  </div>
                  <!-- <div class="post-image">
                      <img src="img/Post/place1-full.jpg" alt="image post">
                  </div> -->
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
                        <img src="img/Profile/profile.jpg" class="event-img-rounded avatar" alt="user profile image">
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
                        <img src="img/Profile/profile.jpg" class="event-img-rounded avatar" alt="user profile image">
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