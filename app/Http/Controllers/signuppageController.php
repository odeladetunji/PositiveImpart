<?php
namespace App\Http\Controllers;
use DB;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class SignuppageController extends BaseController
{

	public function insertToDatabase($username, $password, $theRandomNumber){
	            // student table
	            DB::insert('insert into studentregistration (username, password, identity) values (?, ?, ?)', [$username, $password, $theRandomNumber]);
	}

	public function updatingUniqueIdentities($emptySpace, $theRandomNumber, $username, $password){
				$emptySpace = " ";
		 	    $uniqueIdentities = Storage::get('uniqueIdentity.json');
		        $updatedValue = $uniqueIdentities . $emptySpace . $theRandomNumber;
		        Storage::put('uniqueIdentity.json', $updatedValue);
		        $this->insertToDatabase($username, $password, $theRandomNumber);
	}

	public function randomStringGenerator($username, $password){
			    $theRandomNumber;
		        $emptySpace = " ";
		        $randomNumber = mt_rand(10, 1000000);
		        $formalData = Storage::get('uniqueIdentity.json');
		        $checkingValue = strpos($formalData, $randomNumber);

	            if($checkingValue == false ){
	               $theRandomNumber = $randomNumber;
	               $this->updatingUniqueIdentities($emptySpace, $theRandomNumber, $username, $password);
	               return $theRandomNumber;
	            }else{
	            	  $this->randomStringGenerator($username, $password);  // recursive function call
	            }
	}

    public function signuppage(Request $request){
    	$username = $request->username;
    	$password = $request->password;

    	$theRandomNumber = $this->randomStringGenerator($username, $password);  // returns a random number
    	 if ($theRandomNumber != null) {
    	 	  //On a general note, returning a view outside method other than 
    	 	  //the primariy method asked to handle request will return an empty
    	 	  //html document. which is not what you want.
    	 	  return view('signuppage')->with('identity', $theRandomNumber);
    	 }	   
    }
}


