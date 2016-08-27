      @extends('index')
@section('content')
        <!-- *** LOGIN MODAL END *** -->

      
        <div id="content">
            <div class="container"style="background-color:white; padding-top:50px;">


                <div class="row">
                 
                    <!-- *** LEFT COLUMN ***
			 _________________________________________________________ -->

                    <div class="col-md-12" id="customer-orders" >
				<legend>	<b>All Opened Application ,Click the Apply Button a to apply </b></legend><br><br>
<div class="media">
    <div class="media-left">
        <a href="#">
            <img src="{{asset('img/stdtrain.jpg')}}" style="height:100px; width:100px;" class="media-object" alt="Sample Image">
        </a>
    </div>
    <div class="media-body">
        <h4 class="media-heading">Graduate Trainee</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas finibus arcu et diam luctus pellentesque. Vivamus placerat bibendum mattis. Aliquam ultricies tincidunt bibendum. Etiam massa tortor, ornare id nisi at, porttitor dictum metus. Quisque viverra vitae sem vel facilisis. Morbi consectetur dapibus lectus, et blandit mauris imperdiet nec.
		Vivamus in dolor nisl. Duis pharetra et lectus a malesuada.</p>
		<div class="col-md-offset-11"><a href="/available/graduate-trainee" class="btn btn-success btn-md">Apply</a></div>
	</div>
</div>


<div class="media">
    <div class="media-left">
        <a href="#">
            <img src="img/stdtrain.jpg" style="height:100px; width:100px;" class="media-object" alt="Sample Image">
        </a>
    </div>
    <div class="media-body">
        <h4 class="media-heading">Experience Hire</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas finibus arcu et diam luctus pellentesque. Vivamus placerat bibendum mattis. Aliquam ultricies tincidunt bibendum. Etiam massa tortor, ornare id nisi at, porttitor dictum metus. Quisque viverra vitae sem vel facilisis. Morbi consectetur dapibus lectus, et blandit mauris imperdiet nec.
		Vivamus in dolor nisl. Duis pharetra et lectus a malesuada.</p>
		<div class="col-md-offset-11"><a href="available/experience-hire" class="btn btn-success btn-md">Apply</a></div>
	</div>
</div>

                      
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