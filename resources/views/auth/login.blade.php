@extends('master_login')

@section('content')

<div class="bg">
        <!-- <img src="img/bg.jpg"> -->
    
    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <h2>login</h2> <a href="/auth/register">register account</a>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                
                                 <div class="form-bottom">
                                   <form id="login-form" action="/auth/login" method="post" role="form" style="display: block;" novalidate>
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                        
                                            @if($errors->first('email'))
                                                <div class="alert alert-danger">{{$errors->first('email')}}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="password">Password</label>
                                            <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="password">

                                            @if($errors->first('password'))
                                                <div class="alert alert-danger">{{$errors->first('password')}}</div>
                                            @endif

                                            
                                        </div>
                                        <button type="submit" class="signIn-btn">Sign in!</button>
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