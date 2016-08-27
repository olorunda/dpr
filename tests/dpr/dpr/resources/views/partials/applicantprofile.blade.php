<!--
###################################
		BASIC INFORMATION
###################################
-->

@if($institute->degree=="bsc")
<?php $degree = "B.Sc."; ?>
@elseif($institute->degree=="ben")
<?php $degree = "B.Eng."; ?>
@elseif($institute->degree=="btech")
<?php $degree = "B.Tech."; ?>
@elseif($institute->degree=="mbbs")
<?php $degree = "M.B.B.S."; ?>
@elseif($institute->degree=="llb")
<?php $degree = "L.LB."; ?>
@elseif($institute->degree=="hnd")
<?php $degree = "H.ND."; ?>
@elseif($institute->degree=="ond")
<?php $degree = "O.ND"; ?>
@endif
<div class="row">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="img-responsive">
				<img class="pull-left" alt="user_profile" src="{{asset('upload')}}/{{$user->image}}" style="height:200px; width:200px;">
			</div>
			<div class="data">
				<h3 class="text-uppercase text-primary">{{ $user->f_name }} {{ $user->l_name }}</h3>
				<p class="lead" id="dpr-pf-name">
					{{ $degree }} {{ $institute->course }}
					<br>{{ $contacts->street }}, {{ $contacts->city }}, {{ $contacts->state }}
					<br>Phone Number: {{ $user->phone_num }}
					<br>E-Mail: {{ $user->email }}
					<br>
					<strong class="text-danger">Reference Number: {{ $ref_num }}</strong>
					<br>
				</p>
			</div>
			<div id="demo"></div>
		</div>
	</div>
</div>

<!--
###################################
		BIO-DATA INFORMATION
###################################
-->

<br>

<div class="row">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-male"></i>/<i class="fa fa-female"></i> BIO-DATA 
					<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#biodataModal" pull-right">Edit</button>
				</h3>
				<div class="col-lg-6">
					<p class="lead" id="dpr-pf-name">
						First name: {{ $user->f_name }} 
						<br>Middle name: {{ $user->m_name }} 
						<br>Phone Number: {{ $user->phone_num }} 
						<br>Date of Birth: {{ $user->dob }}
						<br>Reference Number: {{ $ref_num }}
					</p>
				</div>
				<div class="col-lg-6">
					<p class="lead" id="dpr-pf-name">
						Last name: {{ $user->l_name }}
						<br>Maiden name: {{ $user->maiden_name }}
						<br>E-Mail: {{ $user->email }}
						<br>Marital Status: {{ $user->marital_status }}
						<br>Sex: {{ $user->sex }}
					</p>
				</div>
				<br><br><br><br><br><br>
			</div>
		</div>
	</div>
</div>

<!--
###################################
		CONTACT INFORMATION
###################################
-->

<div class="row">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-envelope-o"></i> <i class="fa fa-phone"></i> Contact Information 
					<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#contactModal" pull-right">Edit</button>
				</h3>
				<div class="col-lg-6">
					<p class="lead" id="dpr-pf-name">
						Street: {{ $contacts->street }} 
						<br>City: {{ $contacts->city }} 
						<br>Local Government Area: {{ $contacts->lga }}
						<br>State: {{ $contacts->state }} 
						<br>State of Origin: {{ $contacts->state_origin }} 
					</p>
				</div>
				<br><br><br><br><br>
			</div>
		</div>
	</div>
</div>

<!--
##################################################
		EDUCATIONAL BACKGROUND INFORMATION
##################################################
-->

@if($institute->grade==1)
<?php $grade = "First Class"; ?>
@elseif($institute->grade==2)
<?php $grade = "Second Class Upper"; ?>
@elseif($institute->grade==3)
<?php $grade = "Second Class Lower"; ?>
@elseif($institute->grade==4)
<?php $grade = "Third Class"; ?>
@elseif($institute->grade==5)
<?php $grade = "NOT APPLICABLE"; ?>
@endif
<div class="row">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-institution"></i> Educational Background 
					<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#educationModal" pull-right">Edit</button>
				</h3>
				<div class="col-lg-6">
					<p class="lead" id="dpr-pf-name">
						Higher Institution: {{ $institute->iname }} 
						<br>Degree: {{ $degree }} 
						<br>Secondary School: {{ $institute->sname }} 
						<br>Primary School: {{ $institute->pname }}
					</p>
				</div>
				<div class="col-lg-6">
					<p class="lead" id="dpr-pf-name">
						Course of Study: {{ $institute->course }}
						<br>Grade: {{ $grade }}
						<br>Date Attended: {{ $institute->sstart_date }} - {{ $institute->send_date }}
						<br>Date Attended: {{ $institute->pstart_date }} - {{ $institute->pend_date }}
					</p>
				</div>
				<br><br><br><br><br><br>
			</div>
		</div>
	</div>
</div>

<!--
######################################################
		PROFESSIONAL QUALIFICATIONS INFORMATION
######################################################
-->

@if(count($professional_quals) > 0)
<div class="row">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-mortar-board"></i> Professional Qualifications 
					<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#qualificationModal" pull-right">Add</button>
				</h3>
				<div class="table-responsive">
					<table class="table table-hover table-stripped">
						<thead>
							<tr>
								<th>#</th>
								<th>Professional Qualification</th>
								<th>Certification</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $index = 1; ?>
							@foreach($professional_quals as $qual)
							<tr>
								<th>{{ $index }}</th>
								<th>{{ $qual->name }}</th>
								<th>{{ $qual->position }}</th>
								<th>
				                <form class="inline-form" action="{{ url('/deletequals') }}/{{ $qual->id }}" method="POST">
				                        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
				                        <input type="hidden" name="url" id="url" value="{{ Request::url() }}">
				                        <input type="hidden" name="_method" value="DELETE">
				                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
				                    </form>
				                </th>
							</tr>
							<?php $index+=1; ?>
							@endforeach
							<?php $index=1;?>
						</tbody>
					</table>
				</div><!-- -->
			</div>
		</div>
	</div>
</div>
@else
<div class="row">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-mortar-board"></i> Professional Qualifications 
					<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#qualificationModal" pull-right">Edit</button>
				</h3>
				<p class="lead" id="dpr-pf-name">
					No Professional Qualifications Found
				</p>
			</div>
		</div>
	</div>
</div>

@endif
<!--
###################################################
		RELEVANT EXPERIENCES INFORMATION
###################################################
-->

<br>
@if(count($relevant_exp)>0)

<div class="row">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-puzzle-piece"></i> Relevant Experiences 
					<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#experiencesModal" pull-right">Add</button>
				</h3>
				<div class="table-responsive">
					<table class="table table-hover table-stripped">
						<thead>
							<tr>
								<th>#</th>
								<th>Name of Organization</th>
								<th>Position</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($relevant_exp as $exp)
							<tr>
								<th>{{ $index }}</th>
								<th>{{ $exp->name }}</th>
								<th>{{ $exp->position }}</th>
								<th>
				                <form class="inline-form" action="{{ url('/deleteexp')}}/{{ $exp->id }}" method="POST">
				                        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
				                        <input type="hidden" name="url" id="url" value="{{ Request::url() }}">
				                        <input type="hidden" name="_method" value="DELETE">
				                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
				                    </form>
				                </th>
							</tr>
							<?php $index+=1; ?>
							@endforeach
							<?php $index=1; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@else

<div class="row">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-puzzle-piece"></i> Relevant Experiences 
					<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#experiencesModal" pull-right">Edit</button>
				</h3>
				<p class="lead" id="dpr-pf-name">
					No Relevant Experiences Found
				</p>
			</div>
		</div>
	</div>
</div>

@endif
<!--
###################################
		REFEREES INFORMATION
###################################
-->

<br>
@if(count($refs) > 0)

<div class="row">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-users"></i> Referees 
					<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#refereesModal" pull-right">Add</button>
				</h3>
				<table class="table table-hover table-stripped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name of Referee</th>
							<th>Organization</th>
							<th>Position</th>
							<th>E-Mail</th>
							<th>Phone</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($refs as $ref)
						<tr>
							<th>{{ $index }}</th>
							<th>{{ $ref->name }}</th>
							<th>{{ $ref->organization }}</th>
							<th>{{ $ref->position }}</th>
							<th>{{ $ref->email }}</th>
							<th>{{ $ref->phone }}</th>
							<th>
			                <form class="inline-form" action="{{ url('/deleteref')}}/{{ $ref->id }}" method="POST">
			                        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
			                        <input type="hidden" name="url" id="url" value="{{ Request::url() }}">
			                        <input type="hidden" name="_method" value="DELETE">
			                        <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
			                    </form>
			                </th>
						</tr>
						<?php $index+=1; ?>
						@endforeach
						<?php $index=1; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@else

<div class="row">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-users"></i> Referees 
					<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#refereesModal" pull-right">Edit</button>
				</h3>
				<p class="lead" id="dpr-pf-name">
					No Referees Found!
				</p>
			</div>
		</div>
	</div>
</div>

<br>
@endif

<!--
###################################################
		EAXMINATION CENTER INFORMATION
###################################################
-->

<br>
<div class="row">
	<div class="col-lg-12">
		<div class="dpr-well">
			<div class="data">
				<h3 class="text-uppercase text-primary">
					<i class="fa fa-map-marker"></i> Preferred Examination Center 
					<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#examModal" pull-right">Edit</button>
				</h3>
				<div class="col-lg-6">
					<p class="lead" id="dpr-pf-name">
						Region: {{ $user->region }} 
						<br>Center: {{ $user->center }} 
					</p>
				</div>
				<br><br>
			</div>
		</div>
	</div>
</div>

<div class="">
    <?php $idgen = Crypt::encrypt(Auth::User()->id); ?>
    <a  onclick="submit('{{Auth::user()->id}}')" class="btn btn-template-main"><i class="fa fa-paper-plane-o"></i> Finalize</a>
    <a  onclick="window.print()" class="btn btn-template-main"><i class="fa fa-paper-plane-o"></i> Print</a>
</div>
<!--
###################################
		BEGIN MODAL DEFINITION
###################################
-->


<!--
##########################################
		MODAL - BIODATA INFORMATIN
##########################################
-->

<div id="biodataModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header well">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">BIO-DATA INFORMATION</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form" method="POST" action="{{ url('/bio') }}">
					<input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
					<input type="hidden" name="id" id="id" value="{{ $user->id }}">
					<input type="hidden" name="url" id="url" value="{{ Request::url() }}">
					<div class="col-md-10">
						<div class="col-md-10">
							<div class="form-group">
								<label for="phone">Phone Number</label>
								<div class="row">
									<div class="col-xs-8 col-sm-11">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-bookmark bigger-110"></i>
											</span>
											<input type="phone" class="form-control" name="phone" id="phone" value="{{ $user->phone_num }}">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-10">
							<div class="form-group">
								<label for="l_name">E-Mail</label>
								<div class="row">
									<div class="col-xs-8 col-sm-11">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-bookmark bigger-110"></i>
											</span>
											<input type="mail" class="form-control" name="email" id="email" value="{{ $user->email }}">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-10">
							<div class="form-group">
								<label for="dob">Date of Birth</label>
								<div class="row">
									<div class="col-xs-8 col-sm-11">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-bookmark bigger-110"></i>
											</span>
											<input type="text" class="form-control date-picker" name="dob" id="dob" data-date-format="yyyy-mm-dd" value="{{ $user->dob }}">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-10">
							<div class="form-group">
								<label for="marital_status">Marital Status</label>
								<div class="row">
									<div class="col-xs-8 col-sm-11">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-bookmark bigger-110"></i>
											</span>
											<select class="form-control" id="marital_status" name="marital_status" value="{{ $user->marital_status }}">
												<option value="single">Single</option>
												<option value="married">Married</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-10">
							<div class="form-group">
								<label for="sex">Sex</label>
								<div class="row">
									<div class="col-xs-8 col-sm-11">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-bookmark bigger-110"></i>
											</span>
											<select class="form-control" id="sex" name="sex">
												<option value="M">Male</option>
												<option value="F">Female</option>
											</select>
										</div>
										<br>
										<button class="btn btn-template-main" id="add"><i class="fa fa-plus"></i>Add</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>
</div>

<!--
##########################################
		MODAL - CONTACT INFORMATION
##########################################
-->
<?php
$states= [
	"Abia"=>"Abia",
	"Adamawa"=>"Adamawa",
	"Akwa Ibom"=>"Akwa Ibom",
	"Anambra"=>"Anambra",
	"Bauchi"=>"Bauchi",
	"Bayelsa"=>"Bayelsa",
	"Benue"=>"Benue",
	"Borno"=>"Borno",
	"Cross River"=>"Cross River",
	"Delta"=>"Delta",
	"Ebonyi"=>"Ebonyi",
	"Edo"=>"Edo",
	"Ekiti"=>"Ekiti",
	"Enugu"=>"Enugu",
	"FCT"=>"FCT",
	"Gombe"=>"Gombe",
	"Imo"=>"Imo",
	"Jigawa"=>"Jigawa",
	"Kaduna"=>"Kaduna",
	"Kano"=>"Kano",
	"Katsina"=>"Katsina",
	"Kebbi"=>"Kebbi",
	"Kogi"=>"Kogi",
	"Kwara"=>"Kwara",
	"Lagos"=>"Lagos",
	"Nasawara"=>"Nasawara",
	"Niger"=>"Niger",
	"Ogun"=>"Ogun",
	"Ondo"=>"Ondo",
	"Osun"=>"Osun",
	"Oyo"=>"Oyo",
	"Plateau"=>"Plateau",
	"Rivers"=>"Rivers",
	"Sokoto"=>"Sokoto",
	"Taraba"=>"Taraba",
	"Yobe"=>"Yobe",
	"Zamfara"=>"Zamfara"];
	?>
	<div id="contactModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header well">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">CONTACT INFORMATION</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/contact') }}">
						<input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
						<input type="hidden" name="id" id="id" value="{{ $user->id }}">
						<input type="hidden" name="url" id="url" value="{{ Request::url() }}">
						<div class="col-md-10">
							<div class="col-md-10">
								<div class="form-group">
									<label for="street">Street</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<input type="phone" class="form-control" name="street" id="street" value="{{ $contacts->street }}">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<label for="city">City</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<input type="text" class="form-control" name="city" id="city" value="{{ $contacts->city }}">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<label for="lga">Local Government Area</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<input type="text" class="form-control" name="lga" id="lga" value="{{ $contacts->lga }}">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<label for="state">State</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<select class="form-control" id="state" name="state" value="{{ $contacts->state }}">
													@foreach($states as $state)
													<option value="{{ $state }}">{{ $state }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<label for="state_origin">State of Origin</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<select class="form-control" id="state_origin" name="state_origin" value="{{ $contacts->state_origin }}">
													@foreach($states as $state)
													<option value="{{ $state }}">{{ $state }}</option>
													@endforeach
												</select>
											</div>
											<br>
											<button class="btn btn-template-main" id="add"><i class="fa fa-plus"></i>Add</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
					<div class="modal-footer">
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--
##########################################
		MODAL - EDUCATIONAL BACKGROUND
##########################################
-->

<div id="educationModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header well">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">EDUCATIONAL BACKGROUND</h4>
			</div>
			<div class="modal-body">
				             <form class="form-horizontal" role="form" method="POST" action="{{ url('/education') }}">
                             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                             <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                             <input type="hidden" name="user_ref" id="user_ref" value="{{ $user->id }}">
                             <input type="hidden" name="url" id="url" value="{{ Request::url() }}">
                             <input type="hidden" name="iresult" id="iresult" value="{{ $institute->ifile }}">
                             <input type="hidden" name="sresult" id="sresult" value="{{ $institute->sfile }}">
                             <input type="hidden" name="presult" id="presult" value="{{ $institute->pfile }}">
                             <div class="col-md-10">
                                    <div class="form-group">
                                    <br>
                                        <p class="lead" style="margin-bottom:10px;">Higher Institution</p>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="iname">Name of Higher Institution</label>
                                            <div class="row">
                                                <div class="col-xs-8 col-sm-11">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-bookmark bigger-110"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="iname" id="iname" value="{{ $institute->iname }}">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="course">Course of Study</label>
                                            <div class="row">
                                                <div class="col-xs-8 col-sm-11">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-bookmark bigger-110"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="course" id="course" value="{{ $institute->course }}">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="idate">Date Attended</label>
                                            <div class="row">
                                                <div class="col-xs-8 col-sm-11">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar bigger-110"></i>
                                                        </span>
                                                        <input class="form-control data-range-picker" type="text" name="date-range-picker" id="idate" data-date-format="yyyy-mm-dd" value="{{ $institute->istart_date }} - {{ $institute->iend_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="idegree">Degree Obtained</label>
                                            <div class="row">
                                                <div class="col-xs-8 col-sm-11">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-circle bigger-110"></i>
                                                        </span>
                                                        <select class="chosen-select form-control" id="idegree" name="idegree" data-placeholder="Choose a State...">
                                                                <option value="">  </option>
                                                                <option value="bsc">B.Sc.</option>
                                                                <option value="ben">B.Eng.</option>
                                                                <option value="btech">B.Tech.</option>
                                                                <option value="mbbs">MBBS</option>
                                                                <option value="llb">LLB</option>
                                                                <option value="hnd">H.ND</option>
                                                                <option value="ond">O.ND</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="igrade">Grade</label>
                                            <div class="row">
                                                <div class="col-xs-8 col-sm-11">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-tags bigger-110"></i>
                                                        </span>
                                                        <select class="chosen-select form-control" id="igrade" name="igrade" data-placeholder="Choose a State...">
                                                                <option value="0">  </option>
                                                                <option value="1">First Class</option>
                                                                <option value="2">Second Class Upper</option>
                                                                <option value="3">Second Class Lower</option>
                                                                <option value="4">Third Class</option>
                                                                <option value="5">NOT APPLICABLE</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <br>
                                        <p class="lead" style="margin-bottom:10px;">Secondary School</p>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="sname">Name of Secondary School</label>
                                            <div class="row">
                                                <div class="col-xs-8 col-sm-11">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-bookmark bigger-110"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="sname" id="sname" value="{{ $institute->sname }}">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="sdate">Date Attended</label>
                                            <div class="row">
                                                <div class="col-xs-8 col-sm-11">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar bigger-110"></i>
                                                        </span>
                                                        <input class="form-control data-range-picker" type="text" name="date-range-picker" id="sdate" data-date-format="yyyy-mm-dd" value="{{ $institute->sstart_date }} - {{ $institute->send_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="sdegree">Degree Obtained</label>
                                            <div class="row">
                                                <div class="col-xs-8 col-sm-11">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-circle bigger-110"></i>
                                                        </span>
                                                        <select class="chosen-select form-control" id="sdegree" data-placeholder="Choose a State...">
                                                                <option value="0">  </option>
                                                                <option value="wassce">WASSCE</option>
                                                                <option value="neco">NECO</option>
                                                                <option value="gce">GCE</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <br>
                                        <p class="lead" style="margin-bottom:10px;">Primary School</p>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="pname">Name of Primary School</label>
                                            <div class="row">
                                                <div class="col-xs-8 col-sm-11">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-bookmark bigger-110"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="pname" id="pname" value="{{ $institute->pname }}">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="pdate">Primary School Date</label>
                                            <div class="row">
                                                <div class="col-xs-8 col-sm-11">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar bigger-110"></i>
                                                        </span>
                                                        <input class="form-control data-range-picker" type="text" name="date-range-picker" id="pdate" data-date-format="yyyy-mm-dd" value="{{ $institute->pstart_date }} - {{ $institute->pend_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <div class="col-md-10">
                                        <br><br>
                                        <div class="text-center">
                                            <button type="submit" name="btn" id="btned" class="btn btn-template-main"><i class="fa fa-check-circle"></i> Apply</button>
                                        </div>
                                        <br><br>
                                    </div>
                                </div>
                                <br><br><br>
                            </div>
                            <div id="disp">
                                
                            </div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>
</div>


	<!--
####################################################
		MODAL - PROFESSIONAL QUALIFICATIONS
###################################################
-->
<div id="qualificationModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header well">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Professional Qualifications (If Any)</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/others_quals') }}">
            <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="url" id="url" value="{{ Request::url() }}">
            <input type="hidden" name="id" id="id" value="{{ $user->id }}">
            <div class="col-md-10">
            <div class="col-md-10">
                <div class="form-group">
                    <br>
                    <label for="prof_name">Name of Professional body</label>
                    <div class="row">
                        <div class="col-xs-8 col-sm-11">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-bookmark bigger-110"></i>
                                </span>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="position">Certification</label>
                    <div class="row">
                        <div class="col-xs-8 col-sm-11">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                                <input class="form-control" type="text" name="position" id="position">
                            </div>
                            <br>
                            <button class="btn btn-template-main" id="add"><i class="fa fa-plus"></i>Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <div class="modal-footer">
        </div>
    </div>
    </div>
</div>
</div>


	<!--
####################################################
		MODAL - RELEVANT EXPERIENCES
###################################################
-->
<!-- Modal For Relevant Experiences-->
    <div id="examModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header well">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Relevant Experiences</h4>
        </div>
        <div class="modal-body">
            <form action="/savecenter" method="POST">
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
		        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
		        <input type="hidden" name="url" id="url" value="{{ Request::url() }}">
		        <button class="btn btn-md btn-success" value="save"><i class="fa fw fa-file-excel-o"></i>Save Center and Continue</button>
		    </form>
        <div class="modal-footer">
        </div>
    </div>
    </div>
</div>
</div>


	<!--
####################################################
		MODAL - REFEREES
###################################################
-->
<!-- Modal For Referees-->
    <div id="refereesModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header well">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Referees</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/others_ref') }}">
            <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="id" id="id" value="{{ $user->id }}">
            <input type="hidden" name="url" id="url" value="{{ Request::url() }}">
            <div class="col-md-10">
            <div class="col-md-10">
                <div class="form-group">
                    <br>
                    <label for="name">Name of Referee</label>
                    <div class="row">
                        <div class="col-xs-8 col-sm-11">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-bookmark bigger-110"></i>
                                </span>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-10">
                <div class="form-group">
                    <label for="organization">Name of Referees Organization</label>
                    <div class="row">
                        <div class="col-xs-8 col-sm-11">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-bookmark bigger-110"></i>
                                </span>
                                <input type="text" class="form-control" name="organization" id="organization">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="position">Position</label>
                    <div class="row">
                        <div class="col-xs-8 col-sm-11">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                                <input class="form-control" type="text" name="position" id="position">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <div class="row">
                        <div class="col-xs-8 col-sm-11">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-bookmark bigger-110"></i>
                                </span>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="phone">Referees Phone Number</label>
                    <div class="row">
                        <div class="col-xs-8 col-sm-11">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-bookmark bigger-110"></i>
                                </span>
                                <input type="phone" class="form-control" name="phone" id="phone">
                            </div>
                            <br>
                            <button class="btn btn-template-main" id="add"><i class="fa fa-plus"></i>Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <div class="modal-footer">
        </div>
    </div>
    </div>
</div>
</div>


	<!--
####################################################
		MODAL - EXAMINATION CENTER
###################################################
-->
<div id="contactModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header well">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">CONTACT INFORMATION</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/contact') }}">
						<input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
						<input type="hidden" name="id" id="id" value="{{ $user->id }}">
						<input type="hidden" name="url" id="url" value="{{ Request::url() }}">
						<div class="col-md-10">
							<div class="col-md-10">
								<div class="form-group">
									<label for="street">Street</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<input type="phone" class="form-control" name="street" id="street" value="{{ $contacts->street }}">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<label for="city">City</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<input type="text" class="form-control" name="city" id="city" value="{{ $contacts->city }}">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<label for="lga">Local Government Area</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<input type="text" class="form-control" name="lga" id="lga" value="{{ $contacts->lga }}">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<label for="state">State</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<select class="form-control" id="state" name="state" value="{{ $contacts->state }}">
													@foreach($states as $state)
													<option value="{{ $state }}">{{ $state }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<label for="state_origin">State of Origin</label>
									<div class="row">
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-bookmark bigger-110"></i>
												</span>
												<select class="form-control" id="state_origin" name="state_origin" value="{{ $contacts->state_origin }}">
													@foreach($states as $state)
													<option value="{{ $state }}">{{ $state }}</option>
													@endforeach
												</select>
											</div>
											<br>
											<button class="btn btn-template-main" id="add"><i class="fa fa-plus"></i>Add</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
					<div class="modal-footer">
					</div>
				</div>
			</div>
		</div>
	</div>