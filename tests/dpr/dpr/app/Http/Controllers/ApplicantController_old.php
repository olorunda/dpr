<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Applicant;
use App\Http\Requests;

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
}
