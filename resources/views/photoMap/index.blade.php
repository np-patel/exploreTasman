
@extends('master')

@section('main_content')

    <div id="display_map" class="img-responsive"></div>

    <div class="container">
    <div class="row">


	<div>
		{{-- <input type="submit" value='\f030' class="btn orange-circle-button" data-toggle="modal" data-target="#myModal"> --}}

        <button type="button" class="btn orange-circle-button" data-toggle="modal" data-target="#myModal"><i class="fa fa-camera"></i></button>
	</div>


	<!-- ******************* model ************************** -->

	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Photo on google map</h4>
      </div>

      <!-- Modal Body -->
            <div class="modal-body">
                
                <form role="form" action="/photoMap/add" method="post" enctype="multipart/form-data" role="form" novalidate>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group">
                    <label for="imageTitle">Title</label>
                      <input type="text" class="form-control"
                      id="imageTitle" name="imageTitle"/>
                      {{$errors->first('imageTitle')}}
                  </div>

                  <div>
                    <label for="imageLocation">Choose location</label>
                    <select name="imageLocation" id="imageLocation">

                        @foreach($allLocations as $location)

                        <option value="{{ $location->id }}">{{$location->locationName}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="locationImage">Upload Image</label>
                      <input id="locationImage" name="locationImage" type="file">
                      {{$errors->first('locationImage')}}
                  </div>
                  <div class="form-group">
                    <label for="imageDescription">Image Description</label>
                      <textarea id="imageDescription" name="imageDescription" class="form-control" placeholder="Write about image"></textarea>
                      {{$errors->first('imageDescription')}}
                      
                  </div>
                  
                  <input type="submit" value="Add Photo" class="btn btn-primary" name="addPhoto" />

                </form>
                
                
            </div>

              {{-- <div class="modal-footer">
                <input type="submit" id="submit" class="btn-primary" data-dismiss="modal" name="submit" />
              </div> --}}
    </div>
  </div>
</div>


    <div id="recentItem" class="recentItem"> <a href="#" id="closX"><i class="fa fa-times floatR"></i></a>
        <div class="recentItemTxt clearfix"></div>

        <div class="photoMap text-center"> 
            <ul class="photos clearfix"> 

                {{-- @foreach($allUserPhotos as $photoMap) --}}
                    {{-- <li>  --}}
                        {{-- <a href="#"> <img src="img/{{$photoMap->locationImage}}" alt="photo 1" width="100%" class="img-responsive show-in-modal"> </a>  --}}
                    {{-- </li> --}}
                {{-- @endforeach --}}
                
            </ul> 
        </div>

    </div>
 
</div>
</div>


@endsection

@section('footer')


@if(count($errors)>0)
  <script type="text/javascript">
    $('#myModal').modal('show');
    </script>
@endif

@endsection