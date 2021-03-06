
@extends('master')
@section('main_content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked admin-menu">
                <li class="active"><a href="#" data-target-id="post"><i class="fa fa-home fa-fw"></i>Posts</a></li>
                <li><a href="" data-target-id="events"><i class="fa fa-list-alt fa-fw"></i>Events</a></li>
                <li><a href="" data-target-id="photoMap"><i class="fa fa-file-o fa-fw"></i>PhotoMap</a></li>
                <li><a href="" data-target-id="addMarkers"><i class="fa fa-file-o fa-fw"></i>Add Marker</a></li>
                
            </ul>
        </div>
        <div class="col-md-9 admin-content" id="post">
            <div>

                <div class="panel" style="padding:20px;">

                <div>
                  <h3>User Posts</h3>
              </div>
                    <div id="no-more-tables">
                        <table class="table table-hover">
                          <thead class="cf">
                            <tr>
                              <th>Post Id</th>
                              <th>Post User</th>
                              <th>Post Status</th>
                              <th>Post Date</th>
                              <th>Delete Post</th>
                          </tr>
                      </thead>
                      @foreach($allPost as $post)
                      <tbody>
                        <tr>
                          <td data-title="Post Id">{{$post->id}}</td>
                          <td data-title="Post User">
                              @if($post->user->additionalInfo) 
                              {{ $post->user->additionalInfo->firstName }} {{ $post->user->additionalInfo->lastName }}
                              
                              @else 
                              {{ $post->user->username }}
                              @endif
                          </td>
                          <td data-title="Post Status" title="{{$post->status}}">
                              <div id="postStatus">
                                  {{$post->status}}
                              </div>
                          </td>
                          <td data-title="Post Date">{{ $post->created_at->format('M d,Y \a\t h:i a') }}</td>
                          <td data-title="Delete Post"><a href="" class="btn btn-primary"
                             data-post-delete="{{$post->id}}"
                             data-toggle="modal" 
                             data-target="#deletePost">Delete</a></td>
                         </tr>
                     </tbody>
                     @endforeach
                 </table>
             </div>
         </div>

     </div>

{{-- <div>
  <a href="#" data-toggle="tooltip" title="Hooray!">Hover over me</a>
</div> --}}

</div>
<div class="col-md-9 admin-content" id="events">
    <div class="panel" style="padding:20px;">
        <div>
            <h3>Add Events</h3>
        </div>
        <div>
            <form role="form" action="/admin/addEvent" method="post" enctype="multipart/form-data" role="form" >

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="eventTitle">Event Title: </label>
                    <input type="text" class="form-control"
                    id="eventTitle" name="eventTitle" value="{{old('eventTitle')}}" required/>
                    <span class="validation">{{$errors->first('eventTitle')}}</span>
                </div>

                <div>
                    <label for="eventLocation">Choose event location</label>
                    <select name="eventLocation" id="eventLocation">

                        @foreach($allLocations as $location)

                        <option value="{{ $location->id }}">{{$location->locationName}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="Date&Time" class="control-label">Pick Event Date&Time</label>
                    <div class="input-group date form_datetime" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="dtp_input1">
                        <input class="form-control" size="16" name="Date&Time" type="text" value="{{old('Date&Time')}}" readonly required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <input type="hidden" id="Date&Time" value=""/>
                    <span class="validation">{{$errors->first('Date&Time')}}</span>
                </div>

                <div class="form-group">
                    <label for="eventImage">Upload Event Image</label>
                    <input id="eventImage" name="eventImage" type="file" required>
                    <span class="validation">{{$errors->first('eventImage')}}</span>
                </div>

                <div class="form-group">
                    <label for="eventDescription">Event Description</label>
                    <textarea id="eventDescription" name="eventDescription" class="form-control" placeholder="Write about event" required>{{old('eventDescription')}}</textarea>
                    <span class="validation">{{$errors->first('eventDescription')}}</span>

                </div>

                <input type="submit" value="Add Event" class="btn btn-primary" name="addEvent" />

            </form>
        </div>
    </div>

    <div class="panel" style="padding:20px;">
        <div id="no-more-tables">
            <table class="table table-hover">
              <thead class="cf">
                <tr>
                  <th>EventName</th>
                  <th>EventLocation</th>
                  <th>Event-Day</th>
                  <th>UpdateEvent</th>
                  <th>DeleteEvent</th>
              </tr>
          </thead>
          @foreach($allEvents as $event)
          <tbody>
            <tr>
              <td data-title="EventName">{{$event->eventName}}</td>
              <td data-title="EventLocation">{{ $event->marker_location->locationName}}</td>
              <td data-title="Event-Day">{{ $event->eventDate }}</td>
              <td data-title="UpdateEvent"><a href="" class="btn btn-primary"
                  data-event-id="{{$event->event_id}}"
                  data-location-id="{{ $event->marker_location->id }}"
                  data-event-date="{{$event->eventDate}}" 
                  data-toggle="modal" 
                  data-target="#updateEvent" 
                  data-event-name="{{ $event->eventName }}" 
                  data-event-description="{{$event->eventDescription}}">Update</a>
              </td>
              <td data-title="DeleteEvent"><a href="" class="btn btn-primary"
                 data-event-delete="{{$event->event_id}}"
                 data-toggle="modal" 
                 data-target="#deleteEvent">Delete</a></td>
             </tr>
         </tbody>
         @endforeach
     </table>
 </div>
</div>


</div>




<div class="col-md-9 admin-content" id="photoMap">
    <div class="panel" style="padding:20px;">
        <h3>Delete User uploded Images</h3>

         <div id="no-more-tables">
            <table class="table table-hover">
              <thead class="cf">
                <tr>
                  <th>User</th>
                  <th>Image Title</th>
                  <th>Image Location</th>
                  <th>Image Capture</th>
                  <th>DeleteUserImage</th>
              </tr>
          </thead>
          @foreach($allUserPhotos as $photo)
          <tbody>
            <tr>
              <td data-title="User">
                  @if($photo->user->additionalInfo) 
                      {{ $photo->user->additionalInfo->firstName }} {{ $photo->user->additionalInfo->lastName }}
                      
                      @else 
                      {{ $photo->user->username }}
                      @endif

              </td>
              <td data-title="ImageTitle">{{$photo->title}}</td>
              <td data-title="Image Location">{{ $photo->marker_location->locationName}}</td>
              <td data-title="Image Capture">{{ $photo->created_at->format('M d,Y \a\t h:i a') }}</td>
              <td data-title="DeleteUserImage"><a href="" class="btn btn-primary"
                 data-userimage-delete="{{$photo->photoMapId}}"
                 data-toggle="modal" 
                 data-target="#deleteUserImage">Delete</a></td>
             </tr>
         </tbody>
         @endforeach
     </table>
 </div>

    </div>
</div>

{{-- add marker on the map --}}

  <div class="col-md-9 admin-content" id="addMarkers">
    <div class="panel" style="padding:20px;">
        <div>
            <h3>Add Marker To map</h3>
        </div>
        <div>
            <form role="form" action="/admin/addMarker" method="post" role="form" >

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="locationName">Location Name: </label>
                    <input type="text" class="form-control" id="locationName" name="locationName" value="" placeholder="location name" required/>
                    {{-- <span class="validation">{{$errors->first('locationName')}}</span> --}}
                </div>

                <div class="form-group">
                    <label for="lat">Latitude: </label>
                    <input type="text" class="form-control" id="lat" name="lat" value="" placeholder="-41.306373" required/>
                    {{-- <span class="validation">{{$errors->first('lat')}}</span> --}}

                </div>

                <div class="form-group">
                    <label for="long">Longitude: </label>
                    <input type="text" class="form-control" id="long" name="long" value="" placeholder="174.793047" required/>
                    {{-- <span class="validation">{{$errors->first('long')}}</span> --}}

                </div>

                <input type="submit" value="Add Marker" class="btn btn-primary" name="addMarker" />

            </form>
        </div>
    </div>

    {{-- pull all the marker for admin controll --}}

    <div class="panel" style="padding:20px;">

    <div><h3>Delete Marker from Map</h3></div>
        <div id="no-more-tables">
            <table class="table table-hover">
              <thead class="cf">
                <tr>
                  <th>location name</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th>DeleteMarker</th>
              </tr>
          </thead>
          @foreach($allLocations as $location)
            {{-- @foreach($allUserPhotos as $userpic) --}}
          <tbody>
            <tr>
              <td data-title="location name">{{$location->locationName}}</td>
              <td data-title="Latitude">{{$location->latitude}}</td>
              <td data-title="Longitude">{{$location->longitude}}</td>
              <td data-title="DeleteMarker"><a href="" class="btn btn-primary"
                 data-marker-delete="{{$location->id}}"
                 data-toggle="modal" 
                 data-target="#deletemarker">Delete</a></td>
             </tr>
         </tbody>
          {{-- @endforeach --}}
         @endforeach
     </table>
 </div>
</div>

  </div>



</div>
</div>
<!-- Modal -->
<div id="updateEvent" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Event</h4>
    </div>
    <div class="modal-body">
        <div>
            <form id="UpdateEvent" role="form" action="" method="post" enctype="multipart/form-data" role="form" novalidate>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="updateEventTitle">Event Title: </label>
                    <input type="text" class="form-control"
                    id="updateEventTitle" name="updateEventTitle"/>
                    <span class="validation">{{$errors->first('updateEventTitle')}}</span>
                </div>

                <div>
                    <label for="updateEventLocation">Choose Event location</label>
                    <select name="updateEventLocation" id="updateEventLocation">

                        @foreach($allLocations as $location)

                        <option value="{{ $location->id }}">{{$location->locationName}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="picDate" class="control-label">Pick Event Date&Time</label>
                    <div class="input-group date form_datetime" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="update_dtp_input1">
                        <input class="form-control" size="16" id="picDate" name="picDate" type="text" value="" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                    <span class="validation">{{$errors->first('picDate')}}</span>
                    <input type="hidden" id="picDate" value="" />
                </div>

                <div class="form-group">
                    <label for="updateEventImage">Upload Event Image</label>
                    <input id="updateEventImage" name="updateEventImage" type="file">
                    
                </div>

                <div class="form-group">
                    <label for="updateEventDescription">Event Description</label>
                    <textarea id="updateEventDescription" name="updateEventDescription" class="form-control" placeholder="Write about event"></textarea>
                    <span class="validation">{{$errors->first('updateEventDescription')}}</span>
                    
                </div>
                
                <input type="submit" value="Update Event" class="btn btn-primary" name="updateEvent"/>

            </form>
        </div>
    </div>
</div>

</div>
</div>



{{-- modal for delete event --}}
<div id="deleteEvent" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content clearfix">
      <div class="modal-header1 clearfix">
        <a href="" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
        
    </div>


    <div class="modal-body text-center">
        <p>Are You Sure. You Want To Delete This Event?</p>
    </div>
    <div class="col-md-12 text-center footer-model-btn">
        <div class="col-md-3 col-md-offset-3">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

        <div class="col-md-3 col-md-offset-right-3">
            <a href="" class="btn btn-primary deleteButton">Delete</a>
        </div>
    </div>
</div>
</div>
</div>


{{-- model for delete Post --}}

<div id="deletePost" class="modal fade" role="dialog">
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
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

        <div class="col-md-3 col-md-offset-right-3">
            <a href="" class="btn btn-primary deletePostButton">Delete</a>
        </div>
    </div>
</div>
</div>
</div>


{{-- model for delete User Uploded Image --}}

<div id="deleteUserImage" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content clearfix">
      <div class="modal-header1 clearfix">
        <a href="" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
        
    </div>


    <div class="modal-body text-center">
        <p>Are You Sure. You Want To Delete This User Image?</p>
    </div>
    <div class="col-md-12 text-center footer-model-btn">
        <div class="col-md-3 col-md-offset-3">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

        <div class="col-md-3 col-md-offset-right-3">
            <a href="" class="btn btn-primary deleteUserImageButton">Delete</a>
        </div>
    </div>
</div>
</div>
</div>

{{-- model for delete Marker --}}

<div id="deletemarker" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content clearfix">
      <div class="modal-header1 clearfix">
        <a href="" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
        
    </div>


    <div class="modal-body text-center">
        <p>Are You Sure. You Want To Delete This Marker from Map?</p>
    </div>
    <div class="col-md-12 text-center footer-model-btn">
        <div class="col-md-3 col-md-offset-3">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

        <div class="col-md-3 col-md-offset-right-3">
            <a href="" class="btn btn-primary deleteMarkerButton">Delete</a>
        </div>
    </div>
</div>
</div>
</div>

@endsection

{{-- @section('adminNav') --}}

{{-- @if(count($errors)>0) --}}
 <!-- <script type="text/javascript">
      
 $("ul.nav.nav-pills li a[data-target-id=events]").parent().addClass('active').tab('show').siblings().removeClass('active');
 $('#post').css('display', 'none');
 $('#events').css('display', 'block');
 
  </script> -->
{{-- @endif --}}

{{-- @endsection --}}

