@extends('index')
@section('content')
	<script src="{{asset('js/jquery.js')}}" ></script>
<script>

function populate(val){
	//alert (val());

			 if(val=="Abuja"){
				 $('#centers').html('<option value="center1">Abuja</option>');
				 
			 }
			else if(val=="Portharcourt"){
				 $('#centers').html('<option value="center1">Portharcourt</option>');
				
			}
			else if(val=="Lagos"){
				 $('#centers').html('<option value="unilag">Unilag</option>');
				
			}
			
			else {
				 $('#centers').html('<option value="center1">Kano</option>');
				
			}
			
		
	
}

</script>
        <!-- *** LOGIN MODAL END *** -->
<?php $url=$_SERVER['PHP_SELF']; 

$url=explode('/',$url);
?>
    <?php  $states= ["1"=>"Abia","2"=>"Adamawa","3"=>"Akwa Ibom","4"=>"Anambra","5"=>"Bauchi","6"=>"Bayelsa","7"=>"Benue","8"=>"Borno","9"=>"Cross River","10"=>"Delta","11"=>"Ebonyi","12"=>"Edo","13"=>"Ekiti","14"=>"Enugu","15"=>"Abuja","16"=>"Gombe","17"=>"Imo","18"=>"Jigawa","19"=>"Kaduna","20"=>"Kano","21"=>"Katsina","22"=>"Kebbi","23"=>"Kogi","24"=>"Kwara","25"=>"Lagos","26"=>"Nasawara","27"=>"Niger","28"=>"Ogun","29"=>"Ondo","30"=>"Osun","31"=>"Oyo","32"=>"Plateau","33"=>"Rivers","34"=>"Sokoto","35"=>"Taraba","36"=>"Yobe","37"=>"Zamfara"];
		?>

        <div id="content">
            <div class="container" style="background-color:white; padding-top:50px;">


                <div class="row">
                   @include('dpr.sidebar')
                    <!-- *** LEFT COLUMN ***
			 _________________________________________________________ -->
			
								
			 	<form class="form-horizontal" action="/decision" method="post">
				@if(count($applicants)>0)
				
				<div >
			
			
		     @if($url[2]=="searchapp")
			<div class="col-md-3">
				<b>Showing result {{session('count')}}	 of {{session('counttotal')}} total applicant</b>
			</div>
			<div class="col-md-1"></div>
				@else
					<div class="col-md-2">
				<select class="form-control" id="perpage" >
							<option value="10">10 Per page</option>
							<option value="50">50 Per page</option>
							<option value="100">100 Per page</option>
							</select>
								</div>
								<div class="col-md-2"></div>
							 @endif
			
				
				
<div class="col-md-2">
								<input type="hidden"id="token" name="_token" value="{{csrf_token()}}">
								<select class="form-control" name="approval" >
							<option value="1">Accept Selected</option>
							<option value="0">Reject Selected</option>
							</select>
							
								</div>
								
								<div class="col-md-3"><button class="btn btn-success">Apply</button>
									
												<button  type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fw fa-file-excel-o"></i>Export</button>
										
										</div>
											
												</div>
												@endif
                    <div class="col-md-9 col-sm-8" id="customer-orders">
				        
                      <div class="">
              
							@if(count($applicants)>0)
								
							

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
									
                                            <th><input type="checkbox"  id="checkall" ></th>
                                            <th>S/N</th>
                                            <th>FULLNAME</th>
                                            <th>APPLIED FOR</th>
                                            <th>STATUS</th>
                                            <th>DOWNLOAD DOCUMENT</th>
                                            <th>FULL DETAILS</th>
                                            <th>ACCEPT/REJECT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($applicants as $applicant)
                                        <tr>
										
                                            <th><input type="checkbox" name="select[]" value="{{$applicant->email}}"/></th>
                                            <th>{{$index++}}</th>
                                            <td>{{$applicant->f_name}} {{$applicant->l_name}} {{$applicant->m_name}}</td>
                                            <td>{{$applicant->position}}</td>
                                            <td>@if($applicant->approved=="0")<span class="label label-warning">Pending</span>@else
											<span class="label label-success">Approved</span>
											@endif
                                            </td>
                                            <td><a href="/download/{{$applicant->id}}" class="btn btn-template-main btn-sm"><I class="fa fa-download"></i>Download</a>
                                            </td> 
											<td><a href="{{url('/profile')}}/{{Crypt::encrypt($applicant->id)}}" class="btn btn-template-main btn-sm"><i class="fa fa-eye"></i>View</a>
                                            </td>
											<td><div class="btn-group">
  <button type="button" class="btn btn-sm btn-success" onclick="approve('{{$applicant->email}}','1')"><i class="fa fw fa-check-square"></i>A</button>
  <button type="button" class="btn btn-danger btn-sm" onclick="approve('{{$applicant->email}}','0')"><i class="fa fw fa-times"></i>R</button>
</div>
                                            </td>
                                        </tr>
                                         @endforeach
										 </form>
                                    </tbody>
                                </table>
                            </div>
						@else
							<div class="col-md-12"><p class="text-center text-info "style="margin-top:10%; font-size:30px;"> @if(isset($message)) No Result Found Click  <a href="/panel" >Here</a> to return home @else No Applicants Yet @endif</p></div>
							@endif
                            <!-- /.table-responsive -->
						<div class="pull-right">	{!! $applicants->render()   !!} </div>
                        </div>
						<!-- /.table-responsive -->

                        </div>
                        <!-- /.box -->

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
		<select name="region" class="form-control" id="region" onchange="populate(this.value)">
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
			<a class="btn btn-md btn-success" href="/export?region=all" onclick="return confirm('Please Note , Exporting all applicant datas might take a while, please be patient ?');"  value="export"><i class="fa fw fa-file-excel-o"></i>Export All</a>
	
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