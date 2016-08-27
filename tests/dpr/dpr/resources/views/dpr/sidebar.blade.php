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
									<b><h4>Search Filter</h4></b>
									<form class="form-horizontal" method="GET" action="{{url('/search')}}" >
									
									<p>State</p> 
									<select class="form-control" style="margin-bottom:4px;" name="state" >
									<?php foreach($states as $state): ?>
									<option ><?php echo $state ?></option>
									<?php endforeach; ?>
									</select>
									<p>Region</p> 
									<select class="form-control" style="margin-bottom:4px;" name="region" >
									<option value="Abuja">Abuja</option>
									<option value="Portharcourt">Portharcourt</option>
									<option value="Lagos">Lagos</option>
									<option value="Kano">Kano</option>
									</select>
									<p>Application Status</p> 
									<select class="form-control" style="margin-bottom:4px;" name="status" >
									<option value="0">Pending</option>
									<option value="1">Approved</option>
			
									</select>
									<p>Age</p>
									<div class="col-md-12" style="margin-left:-30px;">
									<div class="col-md-6">
									<select class="form-control" style="margin-bottom:4px;" name="age">
									@for($i=18;  $i<=30; $i++)
									<option value="{{$i}}" >{{$i}}</option>
									@endfor
									</select>
									</div>
									<span style="margin-right:25px">To</span>&nbsp;
									<div class="col-md-6">
									<select class="form-control" style="margin-top:-22px; margin-left:20px;" name="ageto">
									@for($i=18;  $i<=30; $i++)
									<option value="{{$i}}" >{{$i}}</option>
									@endfor
									</select>
									</div>
									</div>
									
									<div class="pull-right">
									<input type="submit" class="btn btn-success btn-md" value="Search" />
									</div>
									</form>
                                </ul>
                            </div>

                        </div>
                        <!-- /.col-md-3 -->

                        <!-- *** CUSTOMER MENU END *** -->
                    </div>