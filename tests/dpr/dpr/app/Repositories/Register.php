<?php
namespace App\Repositories;

use App\User;

class Register {
	
	
	public function register(array $data){
		
		try{
		$register=User::create($data);
		return '1';
		
		}
		catch (\Exception $ex){
			
			return $ex;
			
		}
		
	}
	
	
	
	
	
}