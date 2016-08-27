<?php

namespace App\Http\Controllers;

use Crypt;
use Illuminate\Http\Request;
use App\Repositories\Applicant;
use App\Http\Requests;
use App\User;
use App\contact;
use App\institution;
use App\professional_quals;
use App\relevant_exp;
use App\referee;

class ApplicantController extends Controller
{
	protected $applicant;
	
    public function __construct(Applicant $applicant){
		$this->middleware('auth');
		$this->applicant=$applicant;
		
	}
	
	//list job category
	public function listjobcat(){
		
		return view('dpr.available_jobs');
	}
	
	//get available jobs by category
	public function availablejobs($cat){
		
		$availablejob=$this->applicant->availablejob($cat);
		return view('dpr.listjobs',['listjobs'=>$availablejob]);
		
	}
	
	//set applied for jobs
	public function appliedfor($position=1,$id=1,$type){
		
		
		return view('dpr.apply',['positionid'=>$id,'title'=>$position,'type'=>$type]);
		
	}

	public function bio(Request $request) {
		$this->validate($request, [ 
			'phone'=>'required|max:13', 
			'marital_status'=>'required|string', 
			'sex'=>'required|string', 
			'dob'=>'required'
		]);
		$apply_cand = User::where('id',$request->id)
				->update([
					'm_name'=>$request->middle_name,
					'phone_num' => $request->phone, 
					'dob' => $request->dob, 
					'sex' => $request->sex, 
					'marital_status' => $request->marital_status
				]);	
		return redirect($request->url)->with('message', 'Bio-data was Successfully Updated!');
	}

	public function apply(Request $request) {

		$this->validate($request,[
			'file' => 'required|mimes:png,jpg,jpeg',
			'middle_name' => 'required|max:255|string', 
			'phone_number' => 'required|max:13', 
			'date_of_birth' => 'required|date',
		]);

			$year = date('Y');
			$year_birth = explode('-', $request->date_of_birth);
			$age = (int) $year - (int) $year_birth;
			try{
				$filename=time().'.'.$request->file('file')->getClientOriginalExtension();
				$request->file('file')->move('upload',$filename);
				$apply_cand = User::where('id',$request->id)
				->update([
					'm_name'=>$request->middle_name,
					'maiden_name' => $request->maiden_name,
					'phone_num' => $request->phone_number, 
					'dob' => $request->date_of_birth, 
					'sex' => $request->sex, 
					'image'=>$filename,
					'age' => $age,
					'marital_status' => $request->marital_status
				]);
				return "success";
			}
			catch(\Exception $ex){
				return $ex;
			}

	}

	public function contact(){
		
		
		//return view('dpr.contact',['positionid'=>$id,'title'=>$position,'type'=>$type]);

		return view('dpr.contact');
		
	}

	public function savecontact(Request $request) {

		$this->validate($request, [
			'id'=> 'required', 
			'street'  => 'required|max:255', 
			'city'    => 'required|max:100|string', 
			'lga'	  => 'required|max:100|string', 
			'state'	  => 'required|max:50|string', 
			'state_origin' => 'required|max:50|string',
		]);

		if($request->url!="") {
				//update contact information
			$updateContact = contact::where('id', $request->User()->id)
								   ->update([
								   	'street' => $request->street, 
								   	'city' => $request->city, 
								   	'state' => $request->state, 
								   	'lga' => $request->lga,
								   	'state_origin' => $request->state_origin
								   	]);
			return redirect($request->url)->with('message', 'Successfully updated.');
		}
		if(contact::where('user_ref', $request->User()->id)
							 ->where('street', $request->stret)
							 ->where('city', $request->city)
							 ->where('lga', $request->lga)
							 ->exists()) {
			//record already exists
			if($request->url!="") {
				return redirect($request->url)->with('message', 'Successfully created.');
			}
			return redirect('/education')->with('message', 'Successfully created.');
		}	
		$savecontact = contact::create([
			'user_ref' => $request->id, 
			'street' => $request->street, 
			'city' => $request->city, 
			'lga' => $request->lga,
			'state' => $request->state, 
			'state_origin' => $request->state_origin
		]);

		return redirect('/education')->with('message', 'Successfully created.');
	}

	################################################
	//----------Added by zeus 24/08/2016------------
	################################################
	public function education() {
		return view('dpr.education');
	}

	public function saveducation(Request $request) {

		if($request->url!="") {
			$this->validate($request, [
				'user_ref' => 'required', 
				'iname' => 'required|string|max:200', 
				'sname' => 'required|string|max:200', 
				'pname' => 'required|string|max:200', 
				'course' => 'required|string|max:100',
			]);
		} else {

			$this->validate($request, [
				'file'=> 'required|mimes:.docx,.doc,.pdf',
				'user_ref' => 'required', 
				'iname' => 'required|string|max:200', 
				'sname' => 'required|string|max:200', 
				'pname' => 'required|string|max:200', 
				'course' => 'required|string|max:100',
			]);
		}

		$idate = $request->idate;
		$sdate = $request->sdate;
		$pdate = $request->pdate;

		$istart_date = strtotime(str_ireplace('/', '-', substr($idate, 0, 10)));
		$iend_date = strtotime(str_ireplace('/', '-', substr($idate, 12, 21)));

		$sstart_date = strtotime(str_ireplace('/', '-', substr($sdate, 0, 10)));
		$send_date = strtotime(str_ireplace('/', '-', substr($sdate, 12, 21)));

		$pstart_date = strtotime(str_ireplace('/', '-', substr($pdate, 0, 10)));
		$pend_date = strtotime(str_ireplace('/', '-', substr($pdate, 12, 21)));

		//convert to date
		$istart_date = date("Y-d-m", $istart_date);
		$iend_date = date("Y-d-m", $iend_date);

		$sstart_date = date("Y-d-m", $sstart_date);
		$send_date = date("Y-d-m", $send_date);

		$pstart_date = date("Y-d-m", $pstart_date);
		$pend_date = date("Y-d-m", $pend_date);

		if($request->url!="") {
			$filenames = [$request->iresult, $request->sresult, $request->presult];
		} else {
			try {
				//loop through the images and upload and upload
				foreach($request->file('file') as $files){
					$filename = $request->User()->f_name . rand(00000000000,99999999999).'.'.$files->getClientOriginalExtension();
					$files->move('upload/profiles', $filename);
					$filenames[] = $filename;
					//return $filename1;
				}

				if($filenames[1]=="" || $filenames[2]=="") {
					return "Incomplete Files! Make Sure You Upload All Three Files";
				}
			} catch(\Exception $e) {
				return $e;
			}
		}
		 
		 //check if result have previously been uploaded
		 if(institution::where('user_ref',$request->user_ref)->exists()) {

		 	//record exists just update info
		 	try{
						//database save info
		 		$updateducation = institution::where('user_ref',$request->user_ref)
				->update([
					'user_ref' => $request->user_ref,
								'iname' => $request->iname, 
								'sname' => $request->sname, 
								'pname' => $request->pname,
								'course' => $request->course,
								'istart_date' => $istart_date, 
								'iend_date' => $iend_date, 
								'sstart_date' => $sstart_date, 
								'send_date' => $send_date, 
								'pstart_date' => $pstart_date, 
								'pend_date' => $pend_date,
								'grade' => $request->igrade, 
								'degree' => $request->idegree, 
								'ifile' => $filenames[0], 
								'sfile' => $filenames[1], 
								'pfile' => $filenames[2]
				]);
				$updateUserAccount = User::where('id', $request->user_ref)
								   ->update(['progress' => 4]);

				if($request->url!="") {
					return redirect($request->url)->with('message', 'success');
				} else {
					return "success";
				}
			
			}
			catch (\Exception $ex ){
				return $ex;
			}

		 } else {
		 	//record doesn't exist so create one
		 	try{
						//database save info
							$saveducation = institution::create([
								'user_ref' => $request->user_ref,
								'iname' => $request->iname, 
								'sname' => $request->sname, 
								'pname' => $request->pname,
								'course' => $request->course,
								'istart_date' => $istart_date, 
								'iend_date' => $iend_date, 
								'sstart_date' => $sstart_date, 
								'send_date' => $send_date, 
								'pstart_date' => $pstart_date, 
								'pend_date' => $pend_date,
								'grade' => $request->igrade, 
								'degree' => $request->idegree, 
								'ifile' => $filenames[0], 
								'sfile' => $filenames[1], 
								'pfile' => $filenames[2]
							]);	
							$updateUserAccount = User::where('id', $request->user_ref)
								   ->update(['progress' => 4]);
							return "success";
			
			}
			catch (\Exception $ex ){
				return $ex;
			}
		 }
	}

	public function others(Request $request) {

		$quals = $this->applicant->fetchquals($request->user()->id);
		$relexp = $this->applicant->fetchexperience($request->user()->id);
		$refs = $this->applicant->fetchrefs($request->user()->id);
		return view('dpr.others',[
			   'professional_quals'=>$quals,
			   'relevant_exp'=>$relexp, 
			   'refs'=>$refs
		]);
	}

	public function saveothersquals(Request $request) {

		$this->validate($request, [
			'id' => 'required', 
			'name' => 'required|max:200', 
			'position' => 'required|max:200',
		]);
		//check if the qualification has been previously updated
		if(professional_quals::where('user_ref', $request->User()->id)
							 ->where('name', $request->name)
							 ->where('position', $request->position)
							 ->exists()) {
			//record already exists
			if($request->url!=""){
				return redirect($request->url)->with('message', 'Record was Successfully Added!');
			}
			return redirect('/others')->with('message', 'Record Already Exists!');
		} else {
			//record does not exist, save record
			$saveothersquals = professional_quals::create([
				'user_ref' => $request->User()->id, 
				'name' => $request->name, 
				'position' => $request->position
			]);
			if($request->url!=""){
				return redirect($request->url)->with('message', 'Record was Successfully Added!');
			}
			return redirect('/others')->with('message', 'Record was Successfully Added!');
		}
	}

	public function deletequal(Request $request, $id) {
		$deletedRow = professional_quals::where('id', $id)->delete();
		if($request->url!=""){
			return redirect($request->url)->with('message', 'Record was Successfully Added!');
		}
		return redirect('/others')->with('message', 'Record was successfully deleted!');
	}

	public function saveothersexp(Request $request) {
		$this->validate($request, [
			'id' => 'required', 
			'name' => 'required|max:200', 
			'position' => 'required|max:200',
		]);

		//check if the experience has been previously updated
		if(relevant_exp::where('user_ref', $request->User()->id)
							 ->where('name', $request->name)
							 ->where('position', $request->position)
							 ->exists()) {
			//record already exists
			if($request->url!=""){
				return redirect($request->url)->with('message', 'Record was Successfully Added!');
			}
			return redirect('/others')->with('message', 'Record Already Exists!');
		} else {
			//record does not exist, save record
			$saveothersexp = relevant_exp::create([
				'user_ref' => $request->User()->id, 
				'name' => $request->name, 
				'position' => $request->position
			]);
			if($request->url!=""){
				return redirect($request->url)->with('message', 'Record was Successfully Added!');
			}
			return redirect('/others')->with('message', 'Record was Successfully Added!');
		}

	}

	public function deleteexp(Request $request, $id) {
		$deletedRow = relevant_exp::where('id', $id)->delete();
		if($request->url!=""){
			return redirect($request->url)->with('message', 'Record was Successfully deleted!');
		}
		return redirect('/others')->with('message', 'Record was successfully deleted!');
	}

	public function saveothersref(Request $request) {
		$this->validate($request, [
			'id' => 'required', 
			'name' => 'required|max:100', 
			'organization' => 'required|max:200', 
			'position' => 'required|max:100', 
			'email' => 'required|max:100',
			'phone' => 'required|max:11',
		]);

		//check if the experience has been previously updated
		if(referee::where('user_ref', $request->User()->id)
							 ->where('name', $request->name)
							 ->where('position', $request->position)
							 ->exists()) {
			//record already exists
			if($request->url != "") {
				return redirect($request->url)->with('message', 'Record was Successfully Added!');
			}
			return redirect('/others')->with('message', 'Record Already Exists!');
		} else {
			//record does not exist, save record
			$saveothersref = referee::create([
				'user_ref' => $request->User()->id, 
				'name' => $request->name, 
				'organization' => $request->organization, 
				'position' => $request->position,
				'email' => $request->email, 
				'phone' => $request->phone
			]);
			if($request->url != "") {
				return redirect($request->url)->with('message', 'Record was Successfully Added!');
			}
			return redirect('/others')->with('message', 'Record was Successfully Added!');
		}
	}

	public function deleteref(Request $request, $id) {
		$deletedRow = referee::where('id', $id)->delete();
		if($request->url != "") {
				return redirect($request->url)->with('message', 'Record was Successfully Added!');
		}
		return redirect('/others')->with('message', 'Record was successfully deleted!');
	}

	public function profiledit(Request $request, $id) {
		$year = date("Y");
		$num = 100 + $request->user()->id;
		$ref_num = "DPR/" . $year .'/'. $num; 
		$updateUserAccount = User::where('id', $request->User()->id)
								   ->update([
								   	'progress' => 5, 
								   	'ref_num' => $ref_num
								   	]);
		try {
			$did = Crypt::decrypt($id);
		} catch(\Exception $ex) {
			return redirect('/malicious');
		}
		$user = $this->applicant->fetchuser($did);
		$contacts = $this->applicant->fetchcontact($did);
		$institute = $this->applicant->fetchinstitute($did);
		$quals = $this->applicant->fetchquals($did);
		$relexp = $this->applicant->fetchexperience($did);
		$refs = $this->applicant->fetchrefs($did);
		return view('dpr.profile',[
				'user'=> $user,
				'contacts'=>$contacts,
				'institute'=>$institute,
			    'professional_quals'=>$quals,
			    'relevant_exp'=>$relexp, 
			    'refs'=>$refs, 
			    'ref_num'=>$ref_num
		]);
	}

	public function appcomplete() {
		return view(dpr.appcomplete);
	}

	public function savecenter(Request $request) {
		$updateCenter = User::where('id', $request->User()->id)
							->update([
								'region'=>$request->region,
								'center'=>$request->center
							]);
		$enc=Crypt::encrypt($request->User()->id);
		if($request->url!="") {
			return redirect($request->url);
		}
		return redirect('/profile/'.$enc);
	}
}
