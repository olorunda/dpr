<?php $url=$_SERVER['PHP_SELF']; 

$url=explode('/',$url);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Department of Petroleum Resources (D.P.R.)</title>

    <meta name="keywords" content="">


    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> 

    <!--
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    -->

    <!-- Css animations  -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
   <script src="{{asset('js/sweetalert.min.js')}}"></script>
   <script src="{{asset('js/nprogress.js')}}"></script>
   
   <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/twitter.css')}}">
   <link rel="stylesheet" href="{{asset('css/print.css')}}" type="text/css" media="print" />
    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="{{asset('css/style.green.css')}}" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('css/nprogress.css')}}" rel="stylesheet">
	<style>
	#nprogress .bar {
		height:2px;
	}
	
	</style>

    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
   
	 <link type="text/css" rel="stylesheet" href="{{asset('css/dropzone.min.css')}}">
    <!-- owl carousel css -->

    <link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.theme.css')}}" rel="stylesheet">
	<style>
	@if(Auth::guest())
		
	@else
		@if(Auth::user()->type=="1")
			@else
	@if(Auth::user()->complete=="1")
	.btn{
		display:none;
	}
	@endif
	@endif
	@endif
	.col-md-3{
		margin-left:0px;
	}
::-webkit-scrollbar {
    width: 5px;
}
.adminimg{
	height:70%;
	width:70%;
	margin:20px;
	} 

::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
   // border-radius: 10px;
}
 
::-webkit-scrollbar-thumb {
    //border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px #6aae7a; 
	background-color:rgb(106, 174, 122);
}

::-moz-scrollbar {
    width: 5px;
}

::-moz-scrollbar-track {
    -moz-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
   // border-radius: 10px;
}

::-moz-scrollbar-thumb {
    //border-radius: 10px;
    -moz-box-shadow: inset 0 0 6px #6aae7a; 
    background-color:rgb(106, 174, 122);
}

::-scrollbar {
    width: 15px;
}
::-scrollbar-track {
    -box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
   // border-radius: 10px;
}

::-scrollbar-thumb {
    //border-radius: 10px;
    box-shadow: inset 0 0 6px #6aae7a; 
    background-color:rgb(106, 174, 122);
}

	
	</style>
	
</head>

<body style="background:url('{{asset('img/bg.png')}}')" onload="advert()">

    <div id="all">



            <!-- *** NAVBAR ***
    _________________________________________________________ -->

            <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

                <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                    <div class="container">
                        <div class="navbar-header">

                            <a class="navbar-brand home" href="/">
                                <img src="{{asset('img/logo_res.png')}}" alt="DPR LOGO"  id="logo">
                                
                                </span>
                            </a>
                            <div class="navbar-buttons">
                                <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                                    <span class="sr-only">Menu</span>
                                    <i class="fa fa-align-justify"></i>
                                </button>
                            </div>
                        </div>
                        <!--/.navbar-header -->

                        <div class="navbar-collapse collapse" id="navigation">

                            <ul class="nav navbar-nav navbar-right">
                               
                                    <li <?php if($url[2]==""){ ?> class='active' <?php } ?>>
                                        <a href="{{url('/')}}">&nbsp;Home&nbsp;</a>
                                    </li>
                                 
								    @if(Auth::guest())
                                    <li <?php if($url[2]=="register"){ ?> class='active' <?php } ?>>
                                        <a href="{{url('/register')}}">&nbsp;Register&nbsp;</a>
                                    </li>
                                    <li <?php if($url[2]=="login"){ ?> class='active' <?php } ?>>
                                        <a href="{{url('/login')}}">&nbsp;Log In&nbsp;</a>
                                    </li>
									@else
									@if(Auth::user()->type=="1")	
                                    <li  <?php if($url[2]==""){ ?>  <?php } else{ ?> class='active' <?php } ?>>
                                        <a href="{{url('panel')}}" >&nbsp;Admin&nbsp;</a>
                                    </li>
									@endif
									@if(Auth::user()->complete=="1" && Auth::user()->type=="0")
									  <li <?php if($url[2]=="profile"){ ?> class='active' <?php } ?>>
                                        <a href="{{url('profile')}}/{{Crypt::encrypt(Auth::user()->id)}}">&nbsp;Profile&nbsp;</a>
                                    </li>	
									@endif
									<li >
                                        <a href="{{url('/logout')}}">&nbsp;Logout&nbsp;</a>
                                    </li>
							 @endif
                            </ul>

                        </div>
                        <!--/.nav-collapse -->



                        <div class="collapse clearfix" id="search">

                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">

                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

                </span>
                                </div>
                            </form>

                        </div>
                        <!--/.nav-collapse -->

                    </div>


                </div>
                <!-- /#navbar -->

            </div>

            <!-- *** NAVBAR END *** -->
         @yield('content')

<!-- *** COPYRIGHT ***
_________________________________________________________ -->
	<!-- *** COPYRIGHT ***
_________________________________________________________ -->
	<script src="{{asset('js/jquery.js')}}" ></script>
	<script src="{{asset('js/jquery-barcode.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <script src="{{asset('js/jquery.cookie.js')}}"></script>
    <script src="{{asset('js/waypoints.min.js')}}"></script>
	<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('js/jquery.parallax-1.1.3.js')}}"></script>
	<script>
	function submit(id){
		swal({   title: "Are you sure?",
		text: "You are about to Finalize Your Application, You wont be able to edit your application once submitted",  
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Yes, Finalize it!", 
		cancelButtonText: "No, cancel!",  
		closeOnConfirm: false,  
		closeOnCancel: false },
		function(isConfirm){  
		if (isConfirm) {     
		
		$.get('/finalize/'+id,function(data,status,xhr){
			
			if(data=="success"){
				swal("Success", "You have successfully Submitted your Application", "success");  
				setInterval(function(){
					
					window.location.reload();
					
				},2000);
			}
			
		});
			
		   } 
		else {     swal("Cancelled", "Submission Cancelled", "error");   } });
		
		
	}
	//modify position
	function modifypos(id){
	
	var jobcat=$('#jobcat'+id).val();
	var ref_no=$('#ref_no'+id).val();
	var title=$('#title'+id).val();
	var qualreq=$('#qualificationrequired'+id).val();
	var desc=$('#description'+id).val();
	
	$.get('/modifypos/'+jobcat+'/'+ref_no+'/'+title+'/'+qualreq+'/'+desc,function(data,status,xhr){
		if(data=="1"){
		swal("success", "Position Successfully updated", "success");
				window.location.reload();
				
		}
		else{
		swal("Error", "Some Error Occurred", "error");	
		}
	
});
		
		
		
	}
	
	//show after three clicks
		function advert(){
			
	if(sessionStorage.getItem('count')==undefined){
		sessionStorage.setItem('count',1);
	
	}
	else{
		var count=parseInt(sessionStorage.getItem('count')) + 1;
		 sessionStorage.setItem('count',count);
		var counttimes=sessionStorage.getItem('count');
		
		if(counttimes>=3){
		sessionStorage.setItem('count',0);
	
		swal({   title: "Department of Petroleum Resources",  
		text: "<span style='font-size:20px;'>This Portal is designed By <b><a href='http://www.snapnet.com.ng'>Snapnet Limited.</a></span><br><span style='text-align:center'><img src='{{asset('img/snapnet.png')}}'> </span>",  
		html: true });
		
	}
		
	}
		}
	
	
	$(function(){
	
		@if(session('regsuccess')=="success")
				 
				 swal('Successfull','Registration Successfull','success');
				 setInterval(function(){
				 window.location="/login";
				 },3000);
	
		 @endif
		//search applicant
			@if(Auth::guest())
		@else
			@if(isset($user->ref_num))
		$("#demo").barcode(
		  	"http://localhost/profile/{{$user->ref_num}}", // Value barcode (dependent on the type of barcode)
		  	"code128" // type (string)
		);
		@endif
		@endif
			
		 $('#region').change(function(){
			 
			 if($('#region').val()=="Abuja"){
				 $('#centers').html('<option value="center1">Abuja</option>');
				 
			 }
			else if($('#region').val()=="Portharcourt"){
				 $('#centers').html('<option value="center1">Portharcourt</option>');
				
			}
			else if($('#region').val()=="Lagos"){
				 $('#centers').html('<option value="unilag">Unilag</option>');
				
			}
			
			else {
				 $('#centers').html('<option value="center1">Kano</option>');
				
			}
			
		
		  
	  });
		//record perpage
		 $('#perpage').change(function(){
		  var perpage=$('#perpage').val();
		$.get('/panel?perpage='+perpage,function(data,status,xhr){
			window.location.reload();
		}); 
		
	  });
	//alert('sss');
	  //dj js/bootstrap
	  @if(Auth::guest())
		  
	  @elseif($url[2]=="")
		  @else
	  @if(Auth::user()->type=="0")
	  	
	    Dropzone.autoDiscover = false;
                var myDropzone = new Dropzone("#my-dropzone",{
                
                url:'/apply',
                autoProcessQueue:false,
                acceptedFiles:'image/*',
                uploadMultiple:false,
                maxFiles:1,
                dictDefaultMessage:"Drag a Profile Picture Here",
                addRemoveLinks:'dictCancelUpload',
                parallelUploads:1,
                dictInvalidFileType:"Profile Picture Must Be An Image",
                maxFilesize:5,
                dictFileTooBig: 'Warning: Image is Larger than 5MB'

                });
                myDropzone.on("sending", function(file,xhr,formData) {
                    formData.append("id", $("#id").val());
                    formData.append("middle_name", $("#middle_name").val());
                    formData.append("phone_number", $("#phonenumber").val());
                    formData.append("maiden_name", $("#maiden_name").val());
                    formData.append("date_of_birth", $("#id-date-picker-1").val());
                    formData.append("sex", $("#sex").val());
                    formData.append("marital_status", $("#marital_status").val());
                    formData.append("_token", $("#token").val());
                });
                myDropzone.on("success", function(file,response) {
                    sessionStorage.setItem("message", response);
					// $("#disp").html(response);
					if(response=="success"){
						window.location='/contact';
					}
					else if(response=="dob"){
						 swal('Error',"You are not up the specified age",'error');
				
					}
					else if(response=="over"){
						 swal('Error',"Your age Exceeds Maximum allowable age",'error');
				
					}
					else {
						alert(response);
					}
                   // window.location='/contact';
                });
                myDropzone.on("error", function(file,response) {
                    sessionStorage.setItem("error", 1);
                   // $("#disp").html(response);
                   swal('Error',"Some Error Occured,please check that you fill all fields correctly");
				  myDropzone.removeFile(file);
                });
				
				 myDropzone.on("complete", function(file) {
                   // sessionStorage.setItem("error", 1);
                   // $("#disp").html(response);
                   //swal('Error',"Some Error Occured,please check that you fill all fields correctly");
				  myDropzone.removeFile(file);
                });
                $("#btn").click(function(){
					var phonenum=$("#phonenumber").val();
					if(phonenum.length<11){
						return swal('Error','Phone Number Is Invalid','error')
					}
                    myDropzone.processQueue();
                });

                $('.date-picker').datepicker({
                    autoclose: true,
                    todayHighlight: true
                })
                $('#dob').datepicker({
                    autoclose: true,
                    todayHighlight: true
                })
                //show datepicker when clicking on the icon
                .next().on(ace.click_event, function(){
                    $(this).prev().focus();
                });
                
        	

                //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
                $('input[name=date-range-picker]').daterangepicker({
                    'applyClass' : 'btn-sm btn-success',
                    'cancelClass' : 'btn-sm btn-default',
                    locale: {
                        applyLabel: 'Apply',
                        cancelLabel: 'Cancel',
                    }
                })
                .prev().on(ace.click_event, function(){
                    $(this).next().focus();
                });
	
	  @endif
	  @endif
	  
 $(document).ajaxStart(function(){
	
	NProgress.start();

}).ajaxStop(function(){
	
	NProgress.done();
});

//search applicants 
$('#searchapp').submit(function(){
	event.preventDefault();

	var state=$('#state').val();
	var region=$('#region').val();
	var status=$('#status').val();
	var sex=$('#sex').val();
	var age=$('#age').val();
	var ageto=$('#ageto').val();
	var froms=$('#from').val();
	var to=$('#to').val();
	var scorefrom=$('#scorefrom').val();
	var scoreto=$('#scoreto').val();
	
	window.location='/searchapp/'+state+'/'+region+'/'+status+'/'+sex+'/'+age+'/'+ageto+'/'+froms+'/'+to+'/'+scorefrom+'/'+scoreto;
	
});


//admin registration
	$('#adminreg').submit(function(){
		event.preventDefault();
	var firstname=$('#f_name').val();
	var lastname=$('#l_name').val();
	
	var email=$('#email').val();
	var phonenum=$('#phonenum').val();
	var password=$('#password').val();
	
	var jobid=$('#jobid').val();
	var token=$('#token').val();
	if(password.length < 6){
		return swal('Error','Password Must be at least six characters long','error');
	}
	//alert(jobid);
	$.post('/registerapplicant',{
		first_name:firstname,
	    last_name:lastname,
		email :email,
		jobid :jobid,
		password:password,
		password_confirmation:password,
		phone_number:phonenum,
		_token:token
		
	},function(data,status,xhr){
			$("#error").html(data);
		if(data=="success"){
	

swal({   title: "Applicant successfully added",   
			text: "<span style='font-size:15px'>You have successfully added applicant</span>",  
			html: true });

window.setTimeout(function() {
    window.location.href = '/jobtype';
}, 2000);
		}
		else{
			$("#error").html(data);
		swal('Error','Some Error Occurred','error');
	
		}

	});
	

	
	});


$('#addposition').click(function(){
	
	var jobcat=$('#jobcat').val();
	var ref_no=$('#ref_no').val();
	var title=$('#title').val();
	var qualreq=$('#qualificationrequired').val();
	var desc=$('#description').val();
	if(ref_no=="" || title=="" || qualreq=="" || desc==""){
		return swal("Error", "Please Fill all the fields", "error");	;
	}
	//alert(jobcat);
	$.get('/addposition/'+jobcat+'/'+ref_no+'/'+title+'/'+qualreq+'/'+desc,function(data,status,xhr){
	//	alert(data);
		if(data=="1"){
		swal("success", "Position Successfully Added", "success");
				window.location.reload();
				
		}
		else{
			
		swal("Error", "Some Error Occurred", "error");	
		}
		
	});
});

		
	  
	 
	
 $('#checkall').click(function(){
$('input:checkbox').prop('checked',this.checked);

}); 
		  
		$('#other').hide();
		$('#otherspec').hide();
		$('#qualification').change(function(){
			
			if($('#qualification').val() == "other" ){
				
				$('#other').show();
			}
			else{
				$('#other').hide();
				
			}
			
		});
		
		$('#specialization').change(function(){
			
			if($('#specialization').val() == "otherspec" ){
				
				$('#otherspec').show();
			}
			else{
				$('#otherspec').hide();
				
			}
			
		});
	
				
	});

		@if(Auth::guest())
			
		
	 @elseif(Auth::User()->type=="1")
		 
	 
	 function deleteposition(id){
		 swal({   title: "Are you sure?",  
 text: "You will not be able to recover position deleted!",  
 type: "warning",  
 showCancelButton: true,  
 confirmButtonColor: "#DD6B55",  
 confirmButtonText: "Yes, delete position!", 
 cancelButtonText: "No, cancel!",  
 closeOnConfirm: false,  
 closeOnCancel: false },
 function(isConfirm){  
 if (isConfirm) {   
 
		 $.get('/deletepos/'+id,function(data,status,xhr){
			

			
			 if(data=="1"){
				 
				 swal('Deleted','Position Successfully Deleted','success');
				 window.location.reload();
			 }
			 else{
				 swal('Error','Some Error Occurred','error');
			 
			 }
			 
			 
			 
			 
		 });
		 
  } 
 else {     swal("Cancelled", "No Changes Made", "error");   
 } });

 }
	 
	 
	function approve(email,desicion){
		if(desicion==1){
			var type="Approved";
		}
		else{
			var type="Reject";
			
		}
		swal({   title: "Are you sure?",
		text: "You are about to "+type+" Applicant",  
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Yes, "+type+" it!", 
		cancelButtonText: "No, cancel!",  
		closeOnConfirm: false,  
		closeOnCancel: false },
		function(isConfirm){  
		if (isConfirm) {     
		
			$.post('/decision',{
			approval:desicion,
			select:email,
			//ajax:1,
			_token:$('#token').val()
		},function(data,status,xhr){
			
			if(data=="1"){
				swal(type, "Applicanhas been successfully Accepted", "success");
				window.location.reload();
				//success message
			}
			else {
				swal("Error", "Some Unknown Error Occurred ", "error");
			
			}
			
		});
		   } 
		else {     swal("Cancelled", "No changes Made :)", "error");   } });
		
	
		
	}
	
	
	function warning(){
		
		
		
		swal("Warning", "This Might Take A while ", "error"); 
		event.preventDefault;
	}
	
	@else 
		
	@endif
	
	</script>
	
	@if(Auth::guest())
		
	@else
	@if(Auth::user()->type=="0")
     <script src="{{asset('js/daterangepicker.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}" ></script>
	
    <script type="text/javascript">
        $('input[name="daterange"]').daterangepicker();
        $('input[name="pdaterange"]').daterangepicker();
        $('input[name="sdaterange"]').daterangepicker();
    </script>
    <script src="{{asset('js/daterangepicker.min.js')}}" ></script>
	@endif
	@endif
    <script src="{{asset('js/front.js')}}"></script>

    

    <!-- owl carousel -->
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/bootstrap-hover-dropdown.js')}}" ></script>
   <script type="text/javascript" src="{{asset('js/dropzone.min.js')}}"></script>
  
		<div id="copyright" class="<?php if($url[2]=="manageposition"||$url[2]=='login'||$url[2]=='panel'|| $url[2]=='register'||$url[2]==''):  else: ?><?php endif; ?>">
            <div class="container">
                <div class="col-md-12">
                    <p class="pull-left">&copy; 2016. DPR / Department of Petroleum Resources. All Rights Reserved.</p>
                    <p class="pull-right">Designed by <a href="http://www.snapnet.com.ng">Snapnet Limited</a> 
                        <!-- Not removing these links is part of the licence conditions of the template. Thanks for understanding :) -->
                    </p>

                </div>
            </div>
        </div>
        <!-- /#copyright -->

        <!-- *** COPYRIGHT END *** -->



</body>

</html>
        <!-- /#copyright -->

        <!-- *** COPYRIGHT END *** -->
            <!-- *** NAVBAR END *** -->