@extends('master_login')

@section('content')

<div class="bg">
        <!-- <img src="img/bg.jpg"> -->
    
    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="log_reg_title">
                            <h2>Register</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                 <div class="form-bottom">
                                   
                                    <form id="register-form" action="/auth/register" method="post" role="form" novalidate>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                            @if($errors->first('username'))
                                                <div class="alert alert-danger">{{$errors->first('username')}}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                            @if($errors->first('email'))
                                                <div class="alert alert-danger">{{$errors->first('email')}}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                            @if($errors->first('password'))
                                                <div class="alert alert-danger">{{$errors->first('password')}}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" id="password_confirmation" tabindex="2" class="form-control" placeholder="Confirm Password">
                                            @if($errors->first('password_confirmation'))
                                                <div class="alert alert-danger">{{$errors->first('password_confirmation')}}</div>
                                            @endif
                                        </div>
                                        <button type="submit" class="signIn-btn">Register Now!</button>
                                    </form>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <div class="reg_account">
                            <a href="/auth/login">Login To Your Account</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>	

@endsection