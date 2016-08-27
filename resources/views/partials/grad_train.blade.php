<div>
                             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                             <input type="hidden" name="id" id="id" value="{{ Auth::User()->id }}">
                                <div class="col-md-10">
                                    <div class="col-md-5">
                                       <div class="form-group">
                                            <label for="name-login">First Name</label>
                                            <input type="text" class="form-control" name="first_name" value="{{ Auth::User()->f_name }}" disabled="disabled">
                                        </div>
                                         
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="name-login">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" value="{{ Auth::User()->l_name }}" disabled="disabled">
                                        </div>
                                         
                                    </div>
                                
                                </div>
                                    <div class="col-md-10">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="middle_name">Middle Name</label>
                                            <input type="text" class="form-control" name="middle_name" id="middle_name" value="{{ Auth::User()->m_name}}">
                                        </div>
                                         
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="maiden_name">Maiden Name</label>
                                            <input type="text" class="form-control" name="maiden_name" id="maiden_name" value="{{ Auth::User()->maiden_name}}">
                                        </div>
                                        
                                    </div>
                                
                                </div>

                                <div class="col-md-10">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="email-login">E-Mail</label>
                                            <input type="text" class="form-control" name="email" id="email-login" value="{{ Auth::User()->email }}" disabled="disabled">
                                        </div>
                                         
                                    </div>
                                    <div class="col-md-5">
                                       <div class="form-group">
                                            <label for="phonenumber">Phone Number</label>
                                            <input type="text" class="form-control" name="phone_number" id="phonenumber" value="{{ Auth::User()->phone_num }}">
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="id-date-picker-1">Date of Birth</label>
                                            <input class="form-control date-picker" id="id-date-picker-1" name="date_of_birth" type="text" value="2016-04-04" data-date-format="yyyy-mm-dd">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="sex">Sex</label>
                                            <select class="form-control" id="sex" name="sex">
                                                <option>-Select-</option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                        <label for="marital_status">Marital Status</label>
                                        <select  class="form-control" id="marital_status" name="marital_status">
                                            <option>-Select-</option>
                                            <option value="single">Single</option>
                                            <option value="married">Married</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <div class="col-md-10">
                                        <div class="form-group" id="otherspec">
                                            <label for="my-dropzone">Upload Passport</label>
                                            <div class="dropzone" id="my-dropzone" name="my-dropzone" >
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-10">
                                    <div class="col-md-10">
                                        
                                        <div>
                                            <button type="submit" name="btn" id="btn" class="btn btn-template-main"><i class="fa fa-check-circle"></i> Save & Continue</button>
                                        </div>
                                        <br><br>
                                    </div>
                                </div>
                                <br><br><br>
                            </div>

                            <div id="disp">
                                
                            </div>