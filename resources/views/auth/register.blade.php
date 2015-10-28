@extends('master_login')

@section('content')

<div class="bg">
        <!-- <img src="img/bg.jpg"> -->
    
    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <h2>register</h2><a href="/auth/login">login</a>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                 <div class="form-bottom">
                                   
                                    <form id="register-form" action="/auth/register" method="post" role="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" id="password_confirmation" tabindex="2" class="form-control" placeholder="Confirm Password">
                                        </div>
                                        <button type="submit" class="signIn-btn">Register Now!</button>
                                    </form>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>	

@endsection