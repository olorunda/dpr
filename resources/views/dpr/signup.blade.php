@extends('index')
@section('content')

@if(session('message')=="success")
	
<script>

swal("Registration Successfull!", "Click The Login Menu to login and continue your registration", "success")

</script>

@endif

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Applicants login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="available_jobs" method="post">
						   <input type="hidden" name="_token" vale="{{csrf_token()}}" />
                            <div class="form-group">
                                <input type="email" class="form-control" id="email_modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password_modal" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-template-main"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="available_jobs"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to our Job Portal!</p>

                    </div>
                </div>
            </div>
        </div>

        <!-- *** LOGIN MODAL END *** -->

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>Sign Up</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="content" style="padding-bottom:20px;">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                            <p class="lead">Fill The Form With Appropriate Information</p>
        					@if (count($errors) > 0)
        						<div class="alert alert-danger">
        					
        							<strong>Whoops!</strong> There were some problems with your input.<br><br>
        							<ul>
        								@foreach ($errors->all() as $error)
        									<li>{{ $error }}</li>
        								@endforeach
        							</ul>
        						</div>
        					@endif

                            <form action="/registerapplicant" method="post">
							 <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="name-login">First Name</label>
                                            <input type="text" class="form-control" name="first_name" required>
                                        </div>
										 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name-login">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" required>
                                        </div>
										 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email-login">Email</label>
                                            <input type="email" class="form-control" name="email" id="email-login" required>
                                        </div>
										 
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="name-login">Phone</label>
                                            <input type="text" name="phone_number" class="form-control" required>
                                        </div>
										
                                    </div>
                                </div>
                                

                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password-login">Password</label>
                                            <input type="password" class="form-control" name="password" id="password-login" required>
                                        </div>
										 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="re-password-login">Re-type Password</label>
                                            <input type="password" class="form-control" name="password_confirmation" id="re-password-login" required>
                                       	 
									   </div>
                                    </div>
                                </div>
								     <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           {!! app('captcha')->display(); !!}
                                        </div>
										 
                                    </div>
                                  
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-template-main"><i class="fa fa-user-md"></i> Register</button>
                                </div>
                            </form>
                            <div class="space"></div>
                    </div>
                </div>
                <!-- /.row -->
			
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

        <!-- *** COPYRIGHT ***-->

       @endsection