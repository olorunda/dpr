<div class="form-group">
    <br>
    <p class="lead" style="margin-bottom:10px;">Professional Qualifications (If Any)</p>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> ADD New Entry</button>
</div>

@if(count($professional_quals)>0)
<div class="table-responsive">
    <table class="table table-hover table-stripped">
        <caption>Your Professional Qualification(s)</caption>
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
                <form class="inline-form" action="{{ url('/deletequals')}}/{{ $qual->id }}" method="POST">
                        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
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
</div>
@endif

<div class="form-group">
    <br>
    <p class="lead" style="margin-bottom:10px;">Relevant Experience</p>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#expModal"><i class="fa fa-plus"></i> ADD New Entry</button>
</div>

@if(count($relevant_exp)>0)
<div class="table-responsive">
    <table class="table table-hover table-stripped">
        <caption>Relevant Experience(s)</caption>
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
@endif

<div class="form-group">
    <br>
    <p class="lead" style="margin-bottom:10px;">Referees</p>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#refModal"><i class="fa fa-plus"></i> ADD New Entry</button>
</div>


@if(count($refs)>0)
<div class="table-responsive">
    <table class="table table-hover table-stripped">
        <caption>List of Referee(s)</caption>
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
@endif


<div class="form-group">
    <br>
    <p class="lead" style="margin-bottom:10px;">Examination Center - Pick one closest to you</p>
</div>

<div class="col-">
    <form action="/savecenter" method="POST">
        <h4>Select Region</h3>
		<input type="hidden" value="{{Auth::user()->id}}" name="id" />
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
        <?php $idgen = Crypt::encrypt(Auth::User()->id); ?>
        <button class="btn btn-md btn-success" value="save"><i class="fa fw fa-file-excel-o"></i>Save Center and Continue</button>
    </form>
</div>

<br>

<div class="">
    
</div>

    <!-- Modal For Professional Qualifications -->
    <div id="myModal" class="modal fade" role="dialog">
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
            <input type="hidden" name="id" id="id" value="{{ Auth::User()->id }}">
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


<!-- Modal For Relevant Experiences-->
    <div id="expModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header well">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Relevant Experiences</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/others_exp') }}">
            <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
            <input type="hidden" name="id" id="id" value="{{ Auth::User()->id }}">
            <div class="col-md-10">
            <div class="col-md-10">
                <div class="form-group">
                    <br>
                    <label for="prof_name">Name of Organization</label>
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
                    <label for="position">Position</label>
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

<!-- Modal For Referees-->
    <div id="refModal" class="modal fade" role="dialog">
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
            <input type="hidden" name="id" id="id" value="{{ Auth::User()->id }}">
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
<br><br><br>
