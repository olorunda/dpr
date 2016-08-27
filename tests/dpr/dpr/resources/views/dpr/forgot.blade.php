@extends('index')
@section('content')


        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>Have an Account / <a href="/login">Login in</a></h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="index">Home</a>
                            </li>
                            <li>Have an Account / <a href="/login">Login in</a></li>
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
                            <h3 class="text-uppercase">Reset Password</h3>

                            
                           
                            <hr>

                            <form method="POST" action="{{ url('/password/email') }}">
							 @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					
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
                                    <div class="text-left">
                                        <button type="submit" class="btn btn-template-main"><i class="fa fa-sign-in"></i> Send Password Reset Link</button>

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