 <div class="col-md-3 col-sm-4">
<?php $url=$_SERVER['PHP_SELF']; 

$url=explode('/',$url);
?>   


	<!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                        <div class="panel panel-default sidebar-menu">

                            <div class="panel-heading" >
                                <h3 class="panel-title"style="width:100%">Admin Panel             </h3>
                            </div>

                            <div class="panel-body">

                                <ul class="nav nav-pills nav-stacked">
								<b><h4>Manage Applicant Details</h4></b>
								 <li <?php if($url[2]=="panel"){ ?> class='active' <?php } ?>>
                                        <a href="{{url('panel')}}"><i class="fa fa-home"></i> Home</a>
                                    </li>
                                    <li <?php if($url[2]=="manageposition"){ ?> class='active' <?php } ?>>
                                        <a href="{{url('/manageposition')}}"><i class="fa fa-pencil "></i>Manage Positions</a>
                                    </li>
									<li <?php if($url[2]=="addapplicant"){ ?> class='active' <?php } ?>>
                                        <a href="{{url('/addapplicant')}}"><i class="fa fa-plus "></i>Add Applicant</a>
                                    </li>
									<li <?php if($url[2]=="report"){ ?> class='active' <?php } ?>>
                                        <a href="{{url('/report')}}"><i class="fa fa-microphone "></i>Report</a>
                                    </li>
									<b><h4>Search Filter</h4></b>
									<form class="form-horizontal" id="searchapp">
									
									<p>State</p> 
									<select class="form-control" style="margin-bottom:4px;" name="state" id="state">
										<option value="all">All</option>
									<?php foreach($states as $state): ?>
									<option ><?php echo $state ?></option>
									<?php endforeach; ?>
									</select>
									<p>Region</p> 
									<select class="form-control" style="margin-bottom:4px;" name="region" id="region">
									<option value="all">All</option>
									<option value="Abuja">Abuja</option>
									<option value="Portharcourt">Portharcourt</option>
									<option value="Lagos">Lagos</option>
									<option value="Kano">Kano</option>
									</select>
									<p>Application Status</p> 
									<select class="form-control" style="margin-bottom:4px;" name="status" id="status">
									<option value="all">All</option>
									<option value="0">Pending</option>
									<option value="1">Approved</option>
			
									</select>
									<p>Sex</p> 
									<select class="form-control" style="margin-bottom:4px;" name="sex" id="sex">
									<option value="all">All</option>
									<option value="M">Male</option>
									<option value="F">Female</option>
									</select>
									
									<p>Age</p>
									<div class="col-md-12" style="margin-left:-30px;">
									<div class="col-md-6">
									<select class="form-control" style="margin-bottom:4px;" name="age" id="age">
									
									@for($i=18;  $i<=30; $i++)
									<option value="{{$i}}" >{{$i}}</option>
									@endfor
									</select>
									</div>
									<span style="margin-right:25px">To</span>&nbsp;
									<div class="col-md-6">
									<select class="form-control" style="margin-top:-22px; margin-left:20px;" name="ageto" id="ageto">
									@for($i=18;  $i<=30; $i++)
									<option value="{{$i}}" >{{$i}}</option>
									@endfor
									</select>
									</div>
									</div>
									
									<p>Score</p>
									<div class="col-md-12" style="margin-left:-30px;">
									<div class="col-md-6">
									<select class="form-control" style="margin-bottom:4px;" name="score" id="scorefrom">
									
									@for($i=10;  $i<=100; $i=$i+10)
									<option value="{{$i}}" >{{$i}}</option>
									@endfor
									</select>
									</div>
									<span style="margin-right:25px">To</span>&nbsp;
									<div class="col-md-6">
									<select class="form-control" style="margin-top:-22px; margin-left:20px;" name="scoreto" id="scoreto">
									@for($i=10;  $i<=100; $i=$i+10)
									<option value="{{$i}}" >{{$i}}</option>
									@endfor
									</select>
									</div>
									</div>
									<div class="col-md-12" style="margin-left:-18px;">
									<p>Date Applied</p>
									<div class="col-md-12" style="margin-left:-18px;">
									<input type="date" name="from" style="width:130%" id="from" required/>
									</div>
									<span style="margin-right:25px" style="text-align:center" >To</span>
									<div class="col-md-12" style="margin-left:-18px;">
									<input type="date" name="to" id="to" style="width:130%" required/>									
									</div>
									</div>
									
									<div class="pull-right" style="margin-top:10px;">
									<input type="submit" class="btn btn-success btn-md" value="Search" />
									</div>
									</form>
                                </ul>
                            </div>

                        </div>
                        <!-- /.col-md-3 -->

                        <!-- *** CUSTOMER MENU END *** -->
                    </div>