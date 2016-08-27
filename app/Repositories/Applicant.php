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
	public function allapplicants($perpage){
		
		$allapplicant=DB::table('users')
		->join('available_jobs','users.pos_id','=','available_jobs.id')
		->select('users.*','available_jobs.position')
		->where('users.type','=',0)
		->where('users.complete','=',1)
		->orderBy('id','desc')
		->paginate($perpage);
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
			$datas=User::select('f_name','l_name','m_name','dob','region','phone_num','email','age','sex','created_at')
			->where('type',0)
			->where('complete',1)
			->get();
		}
		else{
		$datas=User::select('f_name','l_name','m_name','dob','region','phone_num','email','age','sex','created_at')
			->where('region',$region)
			->where('center',$center)
			->where('type',0)
			->where('complete',1)
			->get();
		}
		foreach($datas as $data){
			$result[]=['First Name'=>$data->f_name,'Last Name'=>$data->l_name,'Date of Birth'=>$data->dob,'sex'=>$data->sex,'Apllication Date & Time'=>$data->created_at,'region'=>$data->region,'phone number'=>$data->phone_num,'email'=>$data->email,'age'=>$data->age];
			
		}
	$data=$result;
	
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
		$usercv=institution::where('user_ref',$appid)
		->get();
			foreach($usercv as $doc){
				return (['cv1'=>$doc->ifile,'cert1'=>$doc->sfile,'result1'=>$doc->pfile]);
			}
		}
		
		//search 
		public function search(array $data){
			//state
			if($data['state']=="all"){
			$state="";
			$eq1="!=";
		}	
		else{
			$state=$data['state'];
			$eq1="=";
		}
		//status
		if($data['status']=="all"){
			$status="";
			$eq2="!=";
		}
		else{
			$status=$data['status'];
			$eq2="!=";
		}
			
		//region
		if($data['region']=="all"){
			$region="";
			$eq3="!=";
		}
		else{
			$region=$data['region'];
			$eq3="!=";
		}
		//sex
		if($data['sex']=="all"){
			$sex="";
			$eq4="!=";
		}
		else{
			$sex=$data['sex'];
			$eq4="!=";
		}
			
		$searchdb=DB::table('users')
		->join('available_jobs','users.pos_id','=','available_jobs.id')
		->select('users.*','available_jobs.position')
		->where('users.type','=',0)
		->whereBetween('users.age',[$data['fromage'],$data['toage']])
		->whereBetween('users.textscore',[$data['scorefrom'],$data['scoreto']])
		->whereBetween('users.created_at',[$data['from'],$data['to']])
	
		->where('users.state_of_origin',$eq1,$state)
			
		->where('users.approved',$eq2,$status)
		
		->where('users.region',$eq3,$region)
		
		->where('users.sex',$eq4,$sex)
			
		->where('users.complete','=',1)
		->paginate(30);
		
		if(session()->has('count')){
			
		}
		else{
		$searchdbs=DB::table('users')
		->join('available_jobs','users.pos_id','=','available_jobs.id')
		->where('users.type','=',0)
		->whereBetween('users.age',[$data['fromage'],$data['toage']])
		->whereBetween('users.textscore',[$data['scorefrom'],$data['scoreto']])
		->whereBetween('users.created_at',[$data['from'],$data['to']])
	
		->where('users.state_of_origin',$eq1,$state)
			
		->where('users.approved',$eq2,$status)
		
		->where('users.region',$eq3,$region)
		
		->where('users.sex',$eq4,$sex)
			
		->where('users.complete','=',1)
		->count('users.type');
			session(['count'=>$searchdbs]);
		}
		
		if(session()->has('counttotal')){
			
		}
		else{
			$totalrec=User::where('complete',1)->count('id');
			session(['counttotal'=>$totalrec]);
		}
		
	
			
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
	
	
	