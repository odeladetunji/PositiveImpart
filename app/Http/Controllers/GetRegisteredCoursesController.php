<?php
namespace App\Http\Controllers;
use DB;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GetRegisteredCoursesController extends BaseController
{
    public function getTheCoursesRegistered(Request $request){
    	// try inner joins to select two tables
        $data = DB::select('select * from courses, students');
    	return response()->json(array('data' => , $data));
    }
}


