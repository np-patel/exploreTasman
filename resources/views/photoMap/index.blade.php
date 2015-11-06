
@extends('master')

@section('main_content')

    <div id="display_map"></div>

    <div class="container">
    <div class="row">


	<div>
		<input type="submit" value="add Pic" class="picButton btn" data-toggle="modal" data-target="#myModal">
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
                
                <form role="form">
                  <div class="form-group">
                    <label for="address">Address</label>
                      <input type="text" class="form-control"
                      id="address" name="address"/>
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
                    <label for="city">city</label>
                      <input type="text" class="form-control"
                      id="city" name="city"/>
                  </div>
                  <div class="form-group">
                    <label for="country">country</label>
                      <input type="text" class="form-control"
                      id="country" name="country"/>
                  </div>
                  <div class="form-group">
                    <label for="zip">zip</label>
                      <input type="text" class="form-control"
                      id="zip" name="zip"/>
                  </div>
                  
                </form>
                
                
            </div>

      <div class="modal-footer">
        <input type="submit" id="submit" data-dismiss="modal" name="submit" />
      </div>
    </div>
  </div>
</div>

{{-- model for marker --}}

<div class="modal fade" id="markerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Location Name</h4>
      </div>
      <div class="modal-body">
       <div class="panel-body text-center"> 
                    <ul class="photos"> 
                        
                    @foreach($allUserPhotos as $photoMap)
                        <li> <a href="#"> <img src="img/{{$photoMap->locationImage}}" alt="photo 1" class="img-responsive show-in-modal"> </a> 
                        </li>
                    @endforeach
                        
                    </ul> 
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

 
</div>
</div>

@endsection