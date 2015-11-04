
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
                  <div class="form-group">
                    <label for="suburb">suburb</label>
                      <input type="text" class="form-control"
                      id="suburb" name="suburb"/>
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

 
</div>
</div>

@endsection