@extends('index')
@section('content')
        <!-- *** LOGIN MODAL END *** -->

    <?php  $states= ["1"=>"Abia","2"=>"Adamawa","3"=>"Akwa Ibom","4"=>"Anambra","5"=>"Bauchi","6"=>"Bayelsa","7"=>"Benue","8"=>"Borno","9"=>"Cross River","10"=>"Delta","11"=>"Ebonyi","12"=>"Edo","13"=>"Ekiti","14"=>"Enugu","15"=>"FCT","16"=>"Gombe","17"=>"Imo","18"=>"Jigawa","19"=>"Kaduna","20"=>"Kano","21"=>"Katsina","22"=>"Kebbi","23"=>"Kogi","24"=>"Kwara","25"=>"Lagos","26"=>"Nasawara","27"=>"Niger","28"=>"Ogun","29"=>"Ondo","30"=>"Osun","31"=>"Oyo","32"=>"Plateau","33"=>"Rivers","34"=>"Sokoto","35"=>"Taraba","36"=>"Yobe","37"=>"Zamfara"];
		?>

        <div id="content">
            <div class="container" style="background-color:white; padding-top:50px;">


                <div class="row">
                   @include('dpr.sidebar')
                    <!-- *** LEFT COLUMN ***
			 _________________________________________________________ -->
			 	<form class="form-horizontal" action="/poscat" method="get">
				<div class="col-md-offset-6">
<div class="col-md-6">
									<select class="form-control" name="poscat" >
							<option value="graduate-trainee">Graduate Trainee</option>
							<option value="experience_hire">Experienced Hire</option>
							</select>
							
								</div>
								
								<div class="col-md-6"><button class="btn btn-success"><i class="fa fw fa-filter"></i>Filter</button>
									
												<button  type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fw fa-plus"></i>Add Position</button>
										
										</div>
											
												</div>
                    <div class="col-md-9 col-sm-8" id="customer-orders">
				        
                      <div class="">
              
							@if(count($allpos)>0)
								
							

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
									
                                            <th><input type="checkbox"  id="checkall" ></th>
                                            <th>S/N</th>
                                            <th>REF NO</th>
                                            <th>NAME</th>
                                            <th>QUALIFICATION</th>
                                            <th>DESCRIPTION</th>
                                            <th>TYPE</th>
                                            <th>DELETE/MODIFY</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($allpos as $aval_pos)
                                        <tr>
                                            <th><input type="checkbox" name="select[]" value="{{$aval_pos->id}}"/></th>
                                            <th>{{$index++}}</th>
                                            <td>{{$aval_pos->ref_no}}</td>
                                            <td>{{$aval_pos->position}}</td>
                                            <td>{{$aval_pos->qualification}}</td>
                                            <td style="text-align:justify">{{$aval_pos->description}}</td>
                                            <td>@if($aval_pos->type=="1") Graduate Trainee @else Experience Hire @endif</td>
                                           
											<td><div class="btn-group">
  <button type="button" class="btn btn-sm btn-danger" style="width:50px;" onclick="deleteposition('{{$aval_pos->id}}')"><i class="fa fw fa-times"></i>D</button>
  <button type="button" class="btn btn-success btn-sm" style="width:50px;"   data-toggle="modal" data-target="#myModal{{$aval_pos->id}}"><i class="fa fw fa-pencil-square-o"></i>M</button></div>
</td> 
 <div id="myModal{{$aval_pos->id}}" class="modal fade" role="dialog" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Open Positions</h4>
      </div>
      <div class="modal-body">
        <div>
		<p><b>Category</b></p>
		 <select class="form-control" id="jobcat{{$aval_pos->id}}" value="{{$aval_pos->type}}" class="form-control" >
							<option value="1">Graduate Trainee</option>
							<option value="2">Experienced Hire</option>
							</select>
		<br>
		<p><b>Ref No</b></p>
		<input type="text" id="ref_no{{$aval_pos->id}}" value="{{$aval_pos->ref_no}}" disabled class="form-control" /> 
		<br>
		<p><b>Title</b></p>
		<input type="text" id="title{{$aval_pos->id}}" placeholder="Architect, Field Engineer" value="{{$aval_pos->position}}" class="form-control" /> 
		<br>
		<p><b>Qualification Required</b></p>
		<input type="text" id="qualificationrequired{{$aval_pos->id}}" class="form-control" value="{{$aval_pos->qualification}}" placeholder="example include Bsc ,HND" /> 
		<br>
		<p><b>Description</b></p>
		<textarea class="form-control" class="form-control" id="description{{$aval_pos->id}}" placeholder="Enter Job Description here"> {{$aval_pos->description}} </textarea> 
		<br>
		
		<br>
		<button class="btn btn-md btn-success" onclick="modifypos('{{$aval_pos->id}}')"><i class="fa fw fa-edit"></i>MODIFY</button>
			</div>
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
                                            
                                        </tr>
                                         @endforeach
										 </form>
                                    </tbody>
                                </table>
                            </div>
							@else
							<div class="col-md-12"><p class="text-center text-info "style="margin-top:10%; font-size:30px;"> No Positions Added to this category yet , Click on add Add Position To add Positions to this category</p></div>
							@endif
                            <!-- /.table-responsive -->
						<div class="pull-right">{!! $allpos->render()   !!}</div>
                        </div>
						<!-- /.table-responsive -->

                        </div>
                        <!-- /.box -->

                    </div>
                    <!-- /.col-md-9 -->

                    <!-- *** LEFT COLUMN END *** -->

                    <!-- *** RIGHT COLUMN ***
			 _________________________________________________________ -->
<div id="myModal" class="modal fade" role="dialog" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Open Positions</h4>
      </div>
      <div class="modal-body">
        <div>
		<p><b>Category</b></p>
		 <select class="form-control" id="jobcat" class="form-control" >
							<option value="1">Graduate Trainee</option>
							<option value="2">Experienced Hire</option>
							</select>
		<br>
		<p><b>Ref No</b></p>
		<input type="text" id="ref_no" class="form-control" /> 
		<br>
		<p><b>Title</b></p>
		<input type="text" id="title" placeholder="Architect, Field Engineer" class="form-control" /> 
		<br>
		<p><b>Qualification Required</b></p>
		<input type="text" id="qualificationrequired" class="form-control" placeholder="example include Bsc ,HND" /> 
		<br>
		<p><b>Description</b></p>
		<textarea class="form-control" class="form-control" id="description" placeholder="Enter Job Description here">  </textarea> 
		<br>
		
		<br>
		<button class="btn btn-md btn-success" id="addposition"><i class="fa fw fa-plus"></i>Add Position</button>
			</div>
			
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