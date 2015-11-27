

@extends('master')
@section('main_content')
<!-- Second Blog Post -->

<div class="container">
	<div class="row">
		<div class="col-md-12">
			@if(!$allEvents->isEmpty()) 
			@foreach($allEvents as $event)
			<div class="col-sm-6">
				<div class="panel eventPanel clearfix">
					{{-- <div class="events clearfix"> --}}
						<h4>{{ $event->eventName}}</h4>

						<div><p>{{ $event->marker_location->locationName}}</p></div>

						<div>

							<div class="eventDate">
								<p><span class="glyphicon glyphicon-time"></span> {{ \Carbon\Carbon::parse($event->eventDate )->format('l jS \\of F Y h:i A') }}</p>
							</div>
						
							<div class="eventAuthor">
								<p><strong>by</strong> @if($event->user->additionalInfo) 
						            {{ $event->user->additionalInfo->firstName }} {{ $event->user->additionalInfo->lastName }}

						            @else 
						            {{ $event->user->username }}
						            @endif
					            </p>
							</div>
						</div>
						<div>
						<img class="img-responsive" src="img/Event/{{$event->eventImage}}" alt="" style="padding:10px 0px;">
						</div>
						<div class="eventdesc">
							<p>{{ $event->eventDescription}}</p>
						</div>
						{{-- <a href="#" id="load">Load More</a> --}}

					{{-- </div> --}}
				</div>
			</div>
			@endforeach
			@else
			<div class="center">No Event </div>
			@endif
		</div>
	</div>
</div>

@endsection