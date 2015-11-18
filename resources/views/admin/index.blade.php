
@extends('master')
@section('main_content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked admin-menu">
                <li class="active"><a href="#" data-target-id="home"><i class="fa fa-home fa-fw"></i>Home</a></li>
                <li><a href="" data-target-id="widgets"><i class="fa fa-list-alt fa-fw"></i>Events</a></li>
                <li><a href="" data-target-id="pages"><i class="fa fa-file-o fa-fw"></i>Pages</a></li>
                {{-- <li><a href="" data-target-id="charts"><i class="fa fa-bar-chart-o fa-fw"></i>Charts</a></li>
                <li><a href="" data-target-id="table"><i class="fa fa-table fa-fw"></i>Table</a></li>
                <li><a href="" data-target-id="forms"><i class="fa fa-tasks fa-fw"></i>Forms</a></li>
                <li><a href="" data-target-id="calender"><i class="fa fa-calendar fa-fw"></i>Calender</a></li>
                <li><a href="" data-target-id="library"><i class="fa fa-book fa-fw"></i>Library</a></li>
                <li><a href="" data-target-id="applications"><i class="fa fa-pencil fa-fw"></i>Applications</a></li>
                <li><a href="" data-target-id="settings"><i class="fa fa-cogs fa-fw"></i>Settings</a></li> --}}
            </ul>
        </div>
        <div class="col-md-9 admin-content" id="home">
            <div>home</div>
        </div>
        <div class="col-md-9 admin-content" id="widgets">
        <div class="panel" style="padding:20px;">
            <div>
                <h4>Add Events</h4>
            </div>
            <div>
                <form role="form" action="/admin/addEvent" method="post" enctype="multipart/form-data" role="form" novalidate>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group">
                    <label for="eventTitle">Event Title: </label>
                      <input type="text" class="form-control"
                      id="eventTitle" name="eventTitle"/>
                      {{-- {{$errors->first('eventTitle')}} --}}
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
                    <label for="eventImage">Upload Event Image</label>
                      <input id="eventImage" name="eventImage" type="file">
                      {{-- {{$errors->first('eventImage')}} --}}
                  </div>

                  <div class="form-group">
                    <label for="eventDescription">Event Description</label>
                      <textarea id="eventDescription" name="eventDescription" class="form-control" placeholder="Write about event"></textarea>
                      {{-- {{$errors->first('eventDescription')}} --}}
                      
                  </div>
                  
                  <input type="submit" value="Add Event" class="btn btn-primary" name="addEvent" />

                </form>
            </div>
            </div>

            <div class="panel" style="padding:20px;">
                <table class="table table-hover">
                  <thead>
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
                      <td>{{$event->eventName}}</td>
                      <td>{{ $event->marker_location->locationName}}</td>
                      <td>{{ $event->created_at->format('M d,Y \a\t h:i a') }}</td>
                      <td><a href="/admin/updatEvent/{{$event->event_id}}" class="btn btn-primary" data-toggle="modal" data-target="#updateEvent">Update</a></td>
                      <td><a href="" class="btn btn-primary">Delete</a></td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
            </div>
        </div>
        
        <div class="col-md-9 admin-content" id="pages">
            Pages
        </div>
        {{-- <div class="col-md-9 well admin-content" id="charts">
            Charts
        </div>
        <div class="col-md-9 well admin-content" id="table">
            Table
        </div>
        <div class="col-md-9 well admin-content" id="forms">
            Forms
        </div>
        <div class="col-md-9 well admin-content" id="calender">
            Calender
        </div>
        <div class="col-md-9 well admin-content" id="library">
            Library
        </div>
        <div class="col-md-9 well admin-content" id="applications">
            Applications
        </div>
        <div class="col-md-9 well admin-content" id="settings">
            Settings
        </div> --}}
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
                <form role="form" action="" method="post" enctype="multipart/form-data" role="form" novalidate>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group">
                    <label for="eventTitle">Event Title: </label>
                      <input type="text" class="form-control"
                      id="eventTitle" name="eventTitle"/>
                      {{-- {{$errors->first('eventTitle')}} --}}
                  </div>

                  <div>
                    <label for="eventLocation">Choose Event location</label>
                    <select name="eventLocation" id="eventLocation">

                        @foreach($allLocations as $location)

                        <option value="{{ $location->id }}">{{$location->locationName}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="eventImage">Upload Event Image</label>
                      <input id="eventImage" name="eventImage" type="file">
                      {{-- {{$errors->first('eventImage')}} --}}
                  </div>

                  <div class="form-group">
                    <label for="eventDescription">Event Description</label>
                      <textarea id="eventDescription" name="eventDescription" class="form-control" placeholder="Write about event"></textarea>
                      {{-- {{$errors->first('eventDescription')}} --}}
                      
                  </div>
                  
                  <input type="submit" value="Update Event" class="btn btn-primary" name="updateEvent" />

                </form>
            </div>
      </div>
    </div>

  </div>
</div>
  @endsection