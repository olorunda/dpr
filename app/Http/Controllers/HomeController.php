<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\Register;
use Mail;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 protected $registerapplicant;
	 
    public function __construct(Register $registerapplicant)
    {
		//$this->middleware('guest');
		$this->registerapplicant=$registerapplicant;
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dpr.login');
    }
	public function logout(){
		Auth::logout();
		return redirect('/login');
		
	}

	public function register (){
		
		return view ('dpr.signup');
		
	}
	
	//register user
	public function registerapplicant (Request $request){
		
		if($request->ajax()){
			
		$jobid=$request->jobid;
		$progress=2;
		}
		else{
		
		$jobid=0;
		$progress=1;
		}
		if($request->ajax()){
			$this->validate($request,[
			'first_name' => 'required|max:255',
			'last_name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			'phone_number' => 'required|max:255',
		]);
		}
		else{
				$this->validate($request,[
			'first_name' => 'required|max:255',
			'g-recaptcha-response' => 'required|captcha',
			'last_name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			'phone_number' => 'required|max:255',
		]);
			
		}
		$register=$this->registerapplicant->register(['f_name'=>$request->first_name,'email'=>$request->email,'l_name'=>$request->last_name,'email'=>$request->email,'password'=>bcrypt($request->password),'phone_num'=>$request->phone_number,'pos_id'=>$jobid,'progress'=>$progress]);
		if($register=="1"){
			
			$data=['name'=>$request->first_name.' '.$request->last_name,'email'=>$request->email];
			
			Mail::send('email.regsuccess',$data,function($message) use($data){
			$message->from('info@dpronline.org.ng','Registration Successfull');
			$message->to($data['email'],$data['name'])->subject('Registration successfull');	
			});
			
			if($request->ajax()){
				Auth::logout();
				if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
				return response()->json('success');
				}
			
				
			}
			return redirect('/register')->with('regsuccess','success');
			
		}
		else {
				if($request->ajax()){
				return response()->json('failure');
			}
			return redirect('/register')->with('regsuccess','some error occurred');
		}
	}
	
	//forgot password
	public function forget(){
		
		return view('dpr.forgot');
	}
}
