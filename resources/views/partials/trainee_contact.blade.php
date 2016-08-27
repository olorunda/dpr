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

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/contact') }}">
                             <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                             <input type="hidden" name="id" id="id" value="{{ Auth::User()->id }}">
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="street">Street</label>
                                            <input type="text" class="form-control" name="street" id="street">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" name="city" id="city">
                                        </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="lga">Local Government Area</label>
                                            <input type="text" class="form-control" name="lga" id="lga">
                                        </div>
                                </div>
                                <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <select class="form-control" name="state" id="state">
                                                @foreach($states as $state)
                                                    <option value="{{ $state }}">{{ $state }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="state_origin">State of Origin</label>
                                            <select class="form-control" name="state_origin" id="state_origin">
                                                @foreach($states as $state)
                                                    <option value="{{ $state }}">{{ $state }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                                <div class="col-md-10">
                                    <div style="margin-left:-18px;">
                                       
                                        <div>
                                            <button type="submit" name="btn" id="btn" class="btn btn-template-main"><i class="fa fa-check-circle"></i>  Save & Continue</button>
                                        </div>
                                        <br><br>
                                    </div>
                                </div>
                                <br><br><br>
                            </form>