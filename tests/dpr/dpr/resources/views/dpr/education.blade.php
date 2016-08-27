@extends('index2')
@section('content')

        <div id="content">
            <div class="container"style="background-color:white; padding-top:50px;">

            <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>Stage 3 / Educational Background</h1>
                    </div>
                </div>
            </div>
        </div>

    
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
            <div class="col-md-2">
                <div class="img-responsive">
                    <img class="img-thumbnail" alt="user_profile" src="{{asset('upload')}}/{{Auth::User()->image}}" style=" height:150px; width:150px;" >
                </div>
            </div>
        </div>
                    <div class="col-xs-8" id="customer-orders" >
                        
				        @include('partials.trainee_education')
                      
                            <!-- /.table-responsive -->
                        <div class="space"></div>
                    </div>

                </div>

                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** GET IT ***
_________________________________________________________ -->
@endsection