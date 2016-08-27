<?php
namespace App\Repositories;

use App\User;
use DB;
use Excel;
use App\available_job;
use App\professional_quals;
use App\relevant_exp;
use App\referee;
use App\contact;
use App\institution;

class Applicant {
	
	
	//get available jobs by category
	public function availablejob($cat){
		if($cat=="all"){
		$listjob=available_job::orderBy('id','desc')
		->paginate(10);
			//session(['cat'=>'Graduate Trainee']);
			return $listjob;	
		}
		if($cat=="graduate-trainee"){
			$listjob=available_job::where('type','1')
			->orderBy('id','desc')
			->paginate(10);
			session(['cat'=>'Graduate Trainee']);
			return $listjob;
		}
		else{
			$listjob=available_job::where('type','2')
			->orderBy('id','desc')
			->paginate(10);
			session(['cat'=>'Experience Hire']);
			return $listjob;
		}
		
	}
	
	//all aplicant
	public function allapplicants(){
		$allapplicant=DB::table('users')
		->join('available_jobs','users.pos_id','=','available_jobs.id')
		->select('users.*','available_jobs.position')
		->where('users.type','=',0)
		->orderBy('id','desc')
		->paginate(10);
		return $allapplicant;
	}
	
	//approve applicant 
	public function approvereject($applicantemail, $decision){
		
		try{
		$approvereject=User::where('email',$applicantemail)
		->update(['approved'=>$decision]);
		return "1";
		}
		catch(\Exception $ex){
			
			return $ex;
		}
		
	}
	
	//to excel
	
	public function toexcel($region,$center){
		if($region=="all"){
			$data=User::select('f_name','l_name')
			->get();
		}
		else{
		$data=User::where('region',$region)
		->where('center',$center)
		->get();
		}
	
	Excel::create('Filename', function($excel) use($data) {

    $excel->sheet('Sheetname', function($sheet) use($data) {

        $sheet->fromArray($data);

    });

})->export('xls');
		//return $usertoexcel;
	}
	
	//addposition
	public function addposition(array $data){
		
		try{
		$addposition=available_job::create($data);
		return response()->json("1",200);
		}
		catch(\Exception $ex){
			return response()->json("0",500);
		}
	}
	
	//delete position
	public function deletepos($id){
		try{
			
			$deletepos=available_job::where('id',$id)
			->delete();
			return response()->json("1");
		}
		catch(\Exception $ex){
			return response()->json("0");
		}
		
	}
	
	//modify position
	public function modifyposition(array $data){
		try{
		$addposition=available_job::where('ref_no',$data['ref_no'])
		->update($data);
		return response()->json("1",200);
		}
		catch(\Exception $ex){
			return response()->json("0",500);
		}
		
	}
	
	//download cv
	public function downloadcv($appid){
		$usercv=User::where('id',$appid)
		->get();
			foreach($usercv as $cv){
				return $cv->cv;
			}
		}
		
		//search 
		public function search(array $data){
			
			
			
		$searchdb=DB::table('users')
		->join('available_jobs','users.pos_id','=','available_jobs.id')
		->select('users.*','available_jobs.position')
		->where('users.type','=',0)
		->whereBetween('users.age',[$data['fromage'],$data['toage']])
		->where('users.state_of_origin','=',$data['state'])
		->where('users.approved','=',$data['status'])
		->where('users.region','=',$data['region'])
		->paginate(10);
			
			return $searchdb;
		}
		
		################################################
		//----------Added by zeus 24/08/2016------------
		################################################
		public function fetchquals($id) {
			return professional_quals::where('user_ref',$id)
									  ->orderBy('created_at', 'asc')
									  ->get();
		}

		public function deletequal($id){

			$deletequal=professional_quals::where('id',$id)
											->delete();
			return "success";
		}

		public function fetchexperience($id) {
			return relevant_exp::where('user_ref', $id)
								->orderBy('created_at', 'asc')
								->get();
		}

		public function deleteexp($id) {
			$deleteexp = relevant_exp::where('id', $id)
									  ->delete();
			return  "success";
		}

		public function fetchrefs($id) {
			return referee::where('user_ref',$id)
									  ->orderBy('created_at', 'asc')
									  ->get();
		}

		public function deleteref($id) {
			$deleteref = referee::where('id', $id)
									  ->delete();
			return  "success";
		}

		public function fetchcontact($id) {
			return contact::where('user_ref', $id)->first();
		}

		public function fetchinstitute($id) {
			return institution::where('user_ref', $id)->first();
		}

		public function fetchuser($id) {
			return User::where('id', $id)->first();
		}

	}
	
	
	