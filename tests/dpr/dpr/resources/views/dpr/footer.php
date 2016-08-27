<!-- *** COPYRIGHT ***
_________________________________________________________ -->
	<script src="js/jquery.js" ></script>
	<script>
	$(function(){
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
		
		         Dropzone.autoDiscover = false;
				 Dropzone.autoDiscover = false;
                var myDropzone = new Dropzone("#my-dropzone",{
                
                url:'/upload.php',
                autoProcessQueue:false,
                acceptedFiles:'.pdf,.doc,.docx',
                uploadMultiple:false,
                dictDefaultMessage:"Drop Your CV and Result Documents Here",
                maxFiles:1,
                addRemoveLinks:'dictCancelUpload',
                parallelUploads:3,
                dictInvalidFileType:"Only ipdf ,doc files allowed",
                maxFilesize:5
                
                });
				
	});

	
	
	</script>
        	<script src="js/bootstrap.min.js" ></script>
	<script src="js/bootstrap-hover-dropdown" ></script>
   <script type="text/javascript" src="js/dropzone.min.js"></script>
		<div id="copyright">
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