                        <div>
                             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                             <input type="hidden" name="id" id="id" value="{{ Auth::User()->id }}">
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
                                                        <input type="text" class="form-control" name="iname" id="iname">
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
                                                        <input type="text" class="form-control" name="course" id="course" name="course">
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
                                                        <input class="form-control data-range-picker" type="text" name="date-range-picker" id="idate" data-date-format="yyyy-mm-dd">
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
                                                        <select class="chosen-select form-control" id="degree" data-placeholder="Choose a State...">
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
                                                        <select class="chosen-select form-control" id="igrade" data-placeholder="Choose a State...">
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
                                                        <input type="text" class="form-control" name="sname" id="sname">
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
                                                        <input class="form-control data-range-picker" type="text" name="date-range-picker" id="sdate" data-date-format="yyyy-mm-dd">
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
                                                        <input type="text" class="form-control" name="pname" id="pname">
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
                                                        <input class="form-control data-range-picker" type="text" name="date-range-picker" id="pdate" data-date-format="yyyy-mm-dd">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>


                                <div class="col-md-9">
                                    <div class="form-group">
                                            <label for="my-dropzone-files">Upload your:&emsp; Higher Institution | Secondary | Primary School&emsp; ResultsRespectively</label>
                                            <div class="dropzone" id="my-dropzone-files" name="my-dropzone-files">
                                                
                                            </div>
                                        </div>
                                </div>

                                <div class="col-md-10">
                                    <div class="col-md-10">
                                        <br><br>
                                        <div class="text-center">
                                            <button type="submit" name="btn" id="btned" class="btn btn-template-main"><i class="fa fa-check-circle"></i> Next</button>
                                        </div>
                                        <br><br>
                                    </div>
                                </div>
                                <br><br><br>
                            </div>
                            <div id="disp">
                                
                            </div>