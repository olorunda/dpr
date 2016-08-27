@extends('index')
@section('content')
        <!-- *** LOGIN MODAL END *** -->



    <?php  $states= ["1"=>"Abia","2"=>"Adamawa","3"=>"Akwa Ibom","4"=>"Anambra","5"=>"Bauchi","6"=>"Bayelsa","7"=>"Benue","8"=>"Borno","9"=>"Cross River","10"=>"Delta","11"=>"Ebonyi","12"=>"Edo","13"=>"Ekiti","14"=>"Enugu","15"=>"Abuja","16"=>"Gombe","17"=>"Imo","18"=>"Jigawa","19"=>"Kaduna","20"=>"Kano","21"=>"Katsina","22"=>"Kebbi","23"=>"Kogi","24"=>"Kwara","25"=>"Lagos","26"=>"Nasawara","27"=>"Niger","28"=>"Ogun","29"=>"Ondo","30"=>"Osun","31"=>"Oyo","32"=>"Plateau","33"=>"Rivers","34"=>"Sokoto","35"=>"Taraba","36"=>"Yobe","37"=>"Zamfara"];
		?>

        <div id="content">
            <div class="container" style="background-color:white; padding-top:50px;">


                <div class="row">
                   @include('dpr.sidebar')
                    <!-- *** LEFT COLUMN ***
			 _________________________________________________________ -->
			  <div class="col-md-9">
                        <h4 class="text-uppercase">Add New Applicant</h4>

                          
                            <hr>
				<div id="error"></div>

                            <form id="adminreg">
							 <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" />
								 <div class="col-md-12">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="name-login">Job Applying For</label>
											<select class="form-control" name="jobid" id="jobid" >
											@foreach($jobs as $job)
                                            <option value="{{$job->id}}" >{{$job->position}}</option>
											@endforeach
											</select>
                                        </div>
										 
                                    </div>
									 <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="name-login">First Name</label>
                                            <input type="text" class="form-control" name="first_name" id="f_name" required>
                                        </div>
										 
                                    </div>
									</div>
                                <div class="col-md-12">
                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name-login">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" id="l_name" required>
                                        </div>
										 
                                    </div>
								 
									 <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email-login">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" required>
                                        </div>
										 
                                    </div>
								
                                </div>
									

                                <div class="col-md-12">
                                   
                                    <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="name-login">Phone</label>
                                            <input type="tel" name="phone_number" class="form-control" id="phonenum" required>
                                        </div>
										
                                    </div>
									 <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password-login">Password</label>
                                            <input type="text" class="form-control" name="password" id="password" required>
                                        </div>
										 
                                    </div>
                                </div>
                                

                               
                                <div class="col-md-8" style="margin-left:17px">
                                    <button type="submit" class="btn btn-template-main"><i class="fa fa-user-md"></i> Register Applicant</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    </div>
                    <!-- /.col-md-9 -->

                    <!-- *** LEFT COLUMN END *** -->

                    <!-- *** RIGHT COLUMN ***
			 _________________________________________________________ -->
<div id="myModal" class="modal fade" role="dialog" style="padding-top:10%;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Export To Excel</h4>
      </div>
      <div class="modal-body">
        <form action="export" method="get">
		<h4>Select Region</h3>
		<select name="region" class="form-control" id="region">
		<option value="Abuja">Abuja</option>
		<option value="Portharcourt">Portharcourt</option>
		<option value="Lagos">Lagos</option>
		<option value="someregion">Kano</option>
		</select>
		<br>
		<select name="center" id="centers" class="form-control">
		<option value="Abuja">Select Center</option>
		</select>
		<br>
		<button class="btn btn-md btn-success" value="export"><i class="fa fw fa-file-excel-o"></i>Export Region</button>
			<a class="btn btn-md btn-success" href="/export?region=all" onclick="return confirm('Please Not , Exporting all applicant datas might take a while, please be patient ?');"  value="export"><i class="fa fw fa-file-excel-o"></i>Export All</a>
	
			</form>
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


                    <!-- *** RIGHT COLUMN END *** -->

                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


   @endsection