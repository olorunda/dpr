<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Applicant;
use App\Repositories\Excel;
use App\Http\Requests;

use Mail;


class AdminController extends Controller
{
	protected $applicants;
	protected $excel;
    public function __construct(Applicant $applicants, Excel $excel){
		
		$this->middleware('auth');
		$this->middleware('role');
		$this->applicants=$applicants;
		$this->excel=$excel;
	}
	
	public function panel(){
		
		$allapplicants=$this->applicants->allapplicants();
		$index=1;
		return view('dpr.panel',['applicants'=>$allapplicants,'index'=>$index]);
		
	}
	
	//mass approve applicants or not
	public function decision(Request $request){
	##########################################33
	###########################################
	//approve reject
	
	#######################################
	//the email value of checkbox array
	//individual accept
	if($request->ajax()){
		$select=$request->select;
		$aprrovereject=$this->applicants->approvereject($select,$request->approval);
			if($aprrovereject=="1"){
			if($request->approval=="1"){
				//send congrat email
				$data=['email'=>trim($select)];
			
			Mail::send('email.approved',$data,function($message) use($data){
			$message->from('info@dpronline.com','DPRJobPortal');
			$message->to($data['email'],'Applicant')->subject('Congratulations');	
			});
			}
			else{
				$data=['email'=>trim($select)];
			
				Mail::send('email.rejected',$data,function($message) use($data){
			$message->from('info@dpronline.com','DPRJobPortal');
			$message->to($data['email'],'Applicant')->subject('Sorry!!');	
			});
			}
			
				
				//send email to user 
			}
			else{
			
		return response()->json('0');	
	
			}
return response()->json('1');	
				
	}
	
	
	//massaccept
	if(!isset($request->select)){
			return redirect('/panel');
	}
		foreach($request->select as $select){
			
			$aprrovereject=$this->applicants->approvereject($select,$request->approval);
			if($aprrovereject=="1"){
			if($request->approval=="1"){
				//send congrat email
				$data=['email'=>trim($select)];
			
			Mail::send('email.approved',$data,function($message) use($data){
			$message->from('info@dpronline.com','DPRJobPortal');
			$message->to($data['email'],'Applicant')->subject('Congratulations');	
			});
			}
			else{
				$data=['email'=>trim($select)];
			
				Mail::send('email.rejected',$data,function($message) use($data){
			$message->from('info@dpronline.com','DPRJobPortal');
			$message->to($data['email'],'Applicant')->subject('Sorry!!');	
			});
			}
			
				
				//send email to user 
			}
			else{
				if($request->ajax()){
		return response()->json('0');	
		}
				return redirect('/panel');
			}
			
		}
		if($request->ajax()){
		return response()->json('1');	
		}
		
		return redirect('/panel');
		//##############################################
		
	}
	
	//export excel
	public function exportexcel(Request $request){
		
		$excel=$this->applicants->toexcel($request->region,$request->center);
	     
		return $excel;
		
}

//manage positions
public function manageposition(){
	
	$allpositions=$this->applicants->availablejob('all');
	$index=1;
	
	return view('dpr.managepos',['allpos'=>$allpositions,'index'=>$index]);
}

public function disppostbycat(Request $request){
	
	$posbycat=$this->applicants->availablejob($request->poscat);
	$index=1;
	return view('dpr.managepos',['allpos'=>$posbycat,'index'=>$index]);

}
	
	//return $excel;
//addd positions
public function addposition($jobcat,$ref_no,$title,$qualreq,$desc){
	$addposition=$this->applicants->addposition(['ref_no'=>$ref_no,'position'=>$title,'qualification'=>$qualreq,'description'=>$desc,'type'=>$jobcat]);
	
	return $addposition;
	
}		

public function deletepos($id){
	
	$deletepos=$this->applicants->deletepos($id);
	return $deletepos;
}

	//modify pos
	public function modifyposition($jobcat,$ref_no,$title,$qualreq,$desc){
	$modifyposition=$this->applicants->modifyposition(['ref_no'=>$ref_no,'position'=>$title,'qualification'=>$qualreq,'description'=>$desc,'type'=>$jobcat]);
	
	return $modifyposition;
	
}

//download cv
public function downloadcv ($appid){
	
	$downloadcv=$this->applicants->downloadcv($appid);
	return response()->download(public_path('/upload/'.$downloadcv));
}

//search and sort
public function search(Request $request){
	
	$searchresult=$this->applicants->search(['state'=>$request->state,'fromage'=>$request->age,'toage'=>$request->ageto,'region'=>$request->region,'status'=>$request->status]);
	$index=1;
		return view('dpr.panel',['applicants'=>$searchresult,'index'=>$index,'message'=>'show','status'=>$request->status]);
		
}
	
}
