<?php $url=$_SERVER['PHP_SELF']; 

$url=explode('/',$url);

$states= ["1"=>"Abia","2"=>"Adamawa","3"=>"Akwa Ibom","4"=>"Anambra","5"=>"Bauchi","6"=>"Bayelsa","7"=>"Benue","8"=>"Borno","9"=>"Cross River","10"=>"Delta","11"=>"Ebonyi","12"=>"Edo","13"=>"Ekiti","14"=>"Enugu","15"=>"FCT","16"=>"Gombe","17"=>"Imo","18"=>"Jigawa","19"=>"Kaduna","20"=>"Kano","21"=>"Katsina","22"=>"Kebbi","23"=>"Kogi","24"=>"Kwara","25"=>"Lagos","26"=>"Nasawara","27"=>"Niger","28"=>"Ogun","29"=>"Ondo","30"=>"Osun","31"=>"Oyo","32"=>"Plateau","33"=>"Rivers","34"=>"Sokoto","35"=>"Taraba","36"=>"Yobe","37"=>"Zamfara"];
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
   <link rel="stylesheet" type="text/css" href="{{asset('css/chosen.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/datepicker.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/daterangepicker.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/twitter.css')}}">
    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="{{asset('css/style.green.css')}}" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

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
    width: 5px;
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

<body style="background:url('{{ asset('img/bg.png') }}')">

    <div id="all">



            <!-- *** NAVBAR ***
    _________________________________________________________ -->

            <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

                <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                    <div class="container">
                        <div class="navbar-header">

                            <a class="navbar-brand home" href="index">
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
                                    <li <?php if($url[2]=="about"){ ?> class='active' <?php } ?>>
                                        <a href="#">&nbsp;About&nbsp;</a>
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
                                    <li <?php if($url[1]=="panel.php"){ ?> class='active' <?php } ?>>
                                        <a href="{{url('panel')}}">&nbsp;Admin&nbsp;</a>
                                    </li>
									@endif
									@if(Auth::user()->type=="0")
									  <li <?php if($url[2]=="profile"){ ?> class='active' <?php } ?>>
                                        <a href="{{url('profile')}}">&nbsp;Profile&nbsp;</a>
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
	
   
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <script src="{{asset('js/jquery.cookie.js')}}"></script>
    <script src="{{asset('js/waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('js/jquery.parallax-1.1.3.js')}}"></script>
    <script src="{{asset('js/front.js')}}"></script>

    

    <!-- owl carousel -->
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script>
	$(function(){
                //--------------Drop zone for the users result for university, secondary and primary school--------------//
                Dropzone.autoDiscover = false;
                var myDropzone2 = new Dropzone("#my-dropzone-files", {
                
                url:'/education',
                autoProcessQueue:false,
                acceptedFiles:'.pdf,.doc,.docx',
                uploadMultiple:true,
                maxFiles:3,
                dictDefaultMessage:"Drag results to upload",
                addRemoveLinks:'dictCancelUpload',
                parallelUploads:10,
                dictInvalidFileType:"Result can either be a pdf or word document",
                maxFilesize:5,
                dictFileTooBig: 'Warning: Image is Larger than 5MB'

                });
                myDropzone2.on("sending", function(file,xhr,formData) {
                    formData.append("user_ref", $("#id").val());
                    formData.append("_token", $("#token").val());
                    formData.append('iname', $("#iname").val());
                    formData.append('idate', $("#idate").val());
                    formData.append('idegree', $("#idegree").val());
                    formData.append('igrade', $("#igrade").val());
                    formData.append('sname', $("#sname").val());
                    formData.append('sdate', $("#sdate").val());
                    formData.append('sdegree', $("#sdegree").val());
                    formData.append('pname', $("#pname").val());
                    formData.append('pdate', $("#pdate").val());
                                        formData.append('course', $("#course").val());
                });
                myDropzone2.on("success", function(file,response) {
                    sessionStorage.setItem("message", response);
					if(response=="success"){
                        window.location='/others';
					}
					else {
						alert("Some Error Occurred");
                        console.log(response);
					}
                });
                myDropzone2.on("error", function(file,response) {
                   // sessionStorage.setItem("error", 1);
                   // $("#disp").html(response);
                   console.log(response);
				    myDropzone2.removedfile(file);
                });
				
				
				
                $("#btned").click(function(){
                    myDropzone2.processQueue();
                });

                $('.date-picker').datepicker({
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
				
	});

	
	
	</script>
    <script src="{{asset('js/moment.js')}}"></script>
    <script src="{{asset('js/daterangepicker.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}" ></script>
    <script src="{{asset('js/daterangepicker.min.js')}}" ></script>
    <script src="{{asset('js/chosen.jquery.min.js')}}" ></script>
    <script type="text/javascript">
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
    </script>
	<script src="{{asset('js/bootstrap-hover-dropdown.js')}}" ></script>
   <script type="text/javascript" src="{{asset('js/dropzone.min.js')}}"></script>
		<div id="copyright" class="<?php if($url[2]=='login'|| $url[2]=='register'||$url[2]==''):  else: ?><?php endif; ?>">
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