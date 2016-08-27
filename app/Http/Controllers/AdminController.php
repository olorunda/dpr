<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Applicant;
use App\Repositories\Register;
use App\Repositories\Excel;
use App\Http\Requests;

use Mail;


class AdminController extends Controller
{
	protected $applicants;
	protected $excel;
	protected $register;
    public function __construct(Applicant $applicants, Excel $excel,Register $register){
		
		$this->middleware('auth');
		$this->middleware('role');
		$this->applicants=$applicants;
		$this->register=$register;
		$this->excel=$excel;
	}
	//sharepoint report
	public function report(){
		
		return view('dpr.report');
	}
	//admin panelome populated with applicantsdata
	public function panel(Request $request){
		
		if(isset($request->perpage)){
			session(['perpage'=>$request->perpage]);
			
		}
		if($request->session()->has('perpage')){
			$perpage=session('perpage');
		}
		else{
			$perpage=10;
		}
		$allapplicants=$this->applicants->allapplicants($perpage);
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
	
	
	//mass accept applicants
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
	
	//export data to excel
	public function exportexcel(Request $request){
		
		$excel=$this->applicants->toexcel($request->region,$request->center);
	     
		return $excel;
		
}

//manage job postings
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
	

//add positions
public function addposition($jobcat,$ref_no,$title,$qualreq,$desc){
	$addposition=$this->applicants->addposition(['ref_no'=>$ref_no,'position'=>$title,'qualification'=>$qualreq,'description'=>$desc,'type'=>$jobcat]);
	
	return $addposition;
	
}		

//delete positon
public function deletepos($id){
	
	$deletepos=$this->applicants->deletepos($id);
	return $deletepos;
}

	//modify positon
	public function modifyposition($jobcat,$ref_no,$title,$qualreq,$desc){
	$modifyposition=$this->applicants->modifyposition(['ref_no'=>$ref_no,'position'=>$title,'qualification'=>$qualreq,'description'=>$desc,'type'=>$jobcat]);
	
	return $modifyposition;
	
}

//route to add applicants
public function addapplicant(){
	$allpositions=$this->applicants->availablejob('all');
	
	return view('dpr.addapplicant',['jobs'=>$allpositions]);
}




//download cv
public function downloadcv ($appid){
	
	try{
	$downloadcv=$this->applicants->downloadcv($appid);
	return response()->download(public_path('/upload/profiles/'.$downloadcv['cv1']));
	return response()->download(public_path('/upload/profiles/'.$downloadcv['cert1']));
	return response()->download(public_path('/upload/profiles/'.$downloadcv['result1']));
	}
	catch(\Exception $ex){
		return $ex;
		//redirect('/panel');
	}
}


//search and sort
public function search($state,$region,$status,$sex,$age,$ageto,$froms,$to,$scorefrom,$scoreto){
	$searchresult=$this->applicants->search(['state'=>$state,'fromage'=>$age,'toage'=>$ageto,'region'=>$region,'status'=>$status,'sex'=>$sex,'from'=>$froms,'to'=>$to,'scorefrom'=>$scorefrom,'scoreto'=>$scoreto]);
	$index=1;
		return view('dpr.panel',['applicants'=>$searchresult,'index'=>$index,'message'=>'show','status'=>$status]);
		
}
	
}
