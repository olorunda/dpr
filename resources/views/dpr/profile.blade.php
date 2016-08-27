@extends('index')
@section('content')

   
		<div id="content" style="padding-bottom:30px"><div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
					 @if(Auth::user()->complete=="0")   
						 @if(Auth::user()->type=="1")
							<h1> Modify / View Applicants Details </h1>
						 @else
                        <h1>Confirm Your Application</h1>
						      @endif 
							   @else
								   
								       <h1>Application Completed</h1>
								   @endif
                    </div>
                </div>
            </div>
        </div>
            <div class="container"style="background-color:#ececec; margin-top:-20px;">
			
 

    
                <div class="row">
                 
                    <!-- *** LEFT COLUMN ***
			 _________________________________________________________ -->

                    <div class="row">
                    <div class="col-md-12">
                        @if (count($errors) > 0)
                                <div class="alert alert-danger">
                            
                                    <strong>The system was unable to properly save your record.</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                    </div>

                </div>
			
                <!--
                ################################################
                //----------Added by zeus 24/08/2016------------
                ################################################
                -->
                
               
				<div class="col-md-1" style="margin-left:5%"></div>
				
                <div class="col-md-9 ">
                    <div class="heading text-center">
                       
 @if(Auth::user()->type=='1')
									   
								 <h2>Applicant's Details</h2>
									   @else
									 <h2>Your Profile</h2>
								   @endif					  
                    </div>
				        @include('partials.applicantprofile')
                      
                            <!-- /.table-responsive -->
                        <div class="space"></div>
                    </div>

                </div>
                <!--
                ################################################
                //----------End Added by zeus 24/08/2016------------
                ################################################
                -->
                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** GET IT ***
_________________________________________________________ -->
@endsection