<form action="apply.php" method="post">
                                <div class="form-group">
								<input type="hidden" value="{{$positionid}}" name="position"/>
                                    <label for="name-login">Highest Qualification</label>
                                    <select  class="form-control" id="qualification">
									<option>-Select-</option>
                                <option value="phd">PhD</option>
                                <option value="msc">MSc</option>
                                <option value="degree">Degree</option>
                                <option  value="hnd">HND</option>
                                <option  value="nd">ND</option>
                                <option value="other">Others</option>
									</select>
                                </div>
								 <div class="form-group" id="other">
                                    <label for="otherqual">Other</label>
                                    <input type="text" class="form-control" id="otherqual"  placeholder="other qualification">
                                </div>
								
                                <div class="form-group">
                                    <label for="email-login">Years of Experience</label>
                                     <select  class="form-control" id="qualification">
									<option>-Select-</option>
                                <option>More than 20</option>
                                <option>15 - 20</option>
                                <option>6 - 10</option>
                                <option>3 - 5</option>
                                <option>0 - 2</option>


									</select>
                                </div>
								 <div class="form-group">
                                    <label for="password-login"><b>Most Recent Job</b></label>
									<hr>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="password-login">Name of Company</label>
                                    <input type="text" class="form-control" id="password-login">
                                </div>
								
								 <div class="form-group">
                                    <label for="password-login">Job Title</label>
                                    <input type="text" class="form-control" id="title">
                                </div>
								 <div class="form-group">
                                    <label for="email-login">Job Specialization</label>
                                     <select  class="form-control" id="specialization" >
										<option>-Select-</option>
                                <option>Upstream</option>
                                <option>Downstream</option>
                                <option>Gas</option>
                                <option>Health & Safety</option>
                                <option value="otherspec">Others</option>
									</select>
                                </div>
									<div class="form-group" id="otherspec">
                                    <label for="otherqual">Other</label>
                                    <input type="text" class="form-control" id="otherspecsss"  placeholder="other qualification">
                                </div>
								<div class="form-group" id="otherspec">
                                    <label for="otherqual">Upload Document</label>
                                    <div
      class="dropzone" style="border:2px dashed grey; font-size:20px; font-weight:bold;  color:black; background-image:url('img.png'); background-repeat:no-repeat; background-position:center;"
      id="my-dropzone" >

      </div>   </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-template-main"><i class="fa fa-check-circle"></i> Apply</button>
                                </div>
                            </form>