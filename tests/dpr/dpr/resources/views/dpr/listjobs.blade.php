      @extends('index')
@section('content')
        <!-- *** LOGIN MODAL END *** -->

      
        <div id="content">
            <div class="container"style="background-color:white; padding-top:50px;">


                <div class="row">
                 
                    <!-- *** LEFT COLUMN ***
			 _________________________________________________________ -->

                    <div class="col-md-12" id="customer-orders" >
				<legend>	<b>All available {{session('cat')}} Jobs ,Click the Apply Button a to apply </b></legend><br><br>
    
	
	@if(count($listjobs)>0)
		@foreach($listjobs as $job)
	<div class="media">
    <div class="media-left">
        <a href="#">
            <img src="{{asset('img/stdtrain.jpg')}}" style="height:100px; width:100px;" class="media-object" alt="Sample Image">
        </a>
    </div>
    <div class="media-body">
        <h4 class="media-heading">{{$job->position}}</h4>
        <p>{{$job->description}}</p>
		<div class="col-md-offset-11"><a href="{{url('appliedfor')}}/{{$job->position}}/{{$job->id}}/{{$job->type}}" class="btn btn-success btn-md">Apply</a></div>
	</div>
</div>
@endforeach
@else
	<p class="text-info text-center" style="font-size:40px; margin-top:5%; margin-bottom:7.5%;"><b> NO  OPEN POSITIONS CLICK <a href="/jobtype">HERE</a> TO GO BACK </p>


@endif


                      
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.box -->
<div class="col-md-12" style="padding-bottom:50px;"></div>
                    </div>
                    <!-- /.col-md-9 -->

                    <!-- *** LEFT COLUMN END *** -->

                    <!-- *** RIGHT COLUMN ***
			 _________________________________________________________ -->



                    <!-- *** RIGHT COLUMN END *** -->

                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** GET IT ***
_________________________________________________________ -->
@endsection