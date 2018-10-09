<?php
namespace App\Http\Controllers;
use DB;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class TheStudentPageController extends BaseController
{
    public function theStudent(Request $request){
    	      $username = $request->username;
    	      $identity = DB::select('select identity from studentregistration where username = ?', [$username]);
    	 	  return view('studentpage')->with('identity', $identity[0]->identity);
    }
}


