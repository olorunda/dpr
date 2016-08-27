@extends('index')
@section('content')

        <div id="content"><div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>Confirm Your Application</h1>
                    </div>
                </div>
            </div>
        </div>
            <div class="container"style="background-color:#ececec; padding-top:50px;">

            

    
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
				<div >
                <!--
                ################################################
                //----------Added by zeus 24/08/2016------------
                ################################################
                -->
                <div class="col-lg-12">
                </div>
                </div>
                <div class="col-xs-9 col-md-offset-1">
                    <div class="heading text-center">
                        <h2>Your Profile</h2>
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