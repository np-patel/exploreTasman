

@extends('master')
@section('main_content')
	<!-- Second Blog Post -->

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@foreach($allEvents as $event)
					<div class="col-md-6">
						<div class="panel">
						    <div class="events">
						        <h4><a href="#">{{ $event->eventName}}</a></h4>

						        <div><p>{{ $event->marker_location->locationName}}</p></div>
						        
						        <div>
						        	<div class="pull-left">
						        	<p><span class="glyphicon glyphicon-time"></span> {{ $event->created_at->format('M d,Y \a\t h:i a') }}</p>
						        	</div>
						        	<div class="pull-right">
						        	<p><strong>by</strong> {{$event->user->additionalInfo->firstName}} {{$event->user->additionalInfo->lastName}}</p>
						        	</div>
						        </div>
						        <img class="img-responsive" src="img/Event/{{$event->eventImage}}" alt="" style="padding:10px 0px;">
						        
						        <div id="more">{{ $event->eventDescription}}</div>
						        <a href="#" id="load">Load More</a>
						        
						    </div>
					    </div>
				    </div>
			    @endforeach
		    </div>
	    </div>
    </div>

@endsection