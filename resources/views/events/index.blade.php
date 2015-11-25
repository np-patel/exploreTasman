

@extends('master')
@section('main_content')
<!-- Second Blog Post -->

<div class="container">
	<div class="row">
		<div class="col-md-12">
			@if(!$allEvents->isEmpty()) 
			@foreach($allEvents as $event)
			<div class="col-md-6 pull-left">
				<div class="panel eventPanel">
					<div class="events">
						<h4>{{ $event->eventName}}</h4>

						<div><p>{{ $event->marker_location->locationName}}</p></div>

						<div>

							{{-- <div class="pull-left">
								<p><span class="glyphicon glyphicon-time"></span> {{ \Carbon\Carbon::createFromFormat('Y-m-d H',  '$event->eventDate' )->toDateTimeString() }}</p>
							</div> --}}

							<div class="pull-left">
								{{-- <p><span class="glyphicon glyphicon-time"></span> {{ \Carbon\Carbon::parse($event->eventDate )->formatLocalized('%A %d %B %Y at %H %a') }}</p> --}}
								<p><span class="glyphicon glyphicon-time"></span> {{ \Carbon\Carbon::parse($event->eventDate )->format('l jS \\of F Y h:i A') }}</p>

							</div>
						
							{{-- <div class="pull-left">
								<p><span class="glyphicon glyphicon-time"></span> {{ $event->eventDate }}</p>
							</div> --}}
							<div class="pull-right">
								<p><strong>by</strong> {{$event->user->additionalInfo->firstName}} {{$event->user->additionalInfo->lastName}}</p>
							</div>
						</div>
						<img class="img-responsive" src="img/Event/{{$event->eventImage}}" alt="" style="padding:10px 0px;">

						<div>{{ $event->eventDescription}}</div>
						{{-- <a href="#" id="load">Load More</a> --}}

					</div>
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