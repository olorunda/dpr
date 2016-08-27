@extends('index')
@section('content')


        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>Have an Account / Sign in</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="index">Home</a>
                            </li>
                            <li>Have an Account / Sign in</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container" style="padding-bottom:40px;">

                <div class="row">
                    <div class="col-md-12" >
                        <div class="box">
                            <h2 class="text-uppercase">Sign In To Your Account</h2>

                            <p class="lead">Already our customer?</p>
                            <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                                ultricies mi vitae est. Mauris placerat eleifend leo.</p>

                            <hr>

                            <form method="POST" action="{{ url('/login') }}">
									{{ csrf_field() }}
                                <div class="col-md-5 col-md-offset-3">

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email-login">E-Mail</label>
                                        <input type="email" class="form-control" name="email" id="email-login">
										 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
										@endif
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password-login">Password</label>
                                        <input type="password" class="form-control" name="password" id="password-login">
										 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
										@endif
                                    </div>

                                    <input type="checkbox" id="remember-me" name="remember">
                                    <label for="remember-me">Remember me</label>

                                    <br>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-template-main"><i class="fa fa-sign-in"></i> Log in</button>
                                        &nbsp;
                                        <a href="/forgot">Forgot Password?</a>
                                    </div>

                                </div>
                            </form>

                            <br>

                            <br><br><br><br><br><br>
                            <br><br><br><br>
                        </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
		@endsection