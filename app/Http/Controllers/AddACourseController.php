<?php
namespace App\Http\Controllers;
use DB;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\UploadedFile;

class AddACourseController extends BaseController
{   
    public $objStore = array("data" => "data");
    

    public function generateIdentity($name, $theRandomNumber, $title, $author, $coursecode, $price, $duration, $description, $advertpicture){
            $picture = $theRandomNumber . $name;
            DB::insert('insert into courses (picture, title, author, coursecode, price, duration, description, advertpicture) values (?, ?, ?, ?, ?, ?, ?, ?)', [$theRandomNumber . $name, $title, $author, $coursecode, $price, $duration, $description, $advertpicture]);
    }

    public function randomStringGenerator($name, $title, $author, $coursecode, $price, $duration, $description, $advertpicture){
            $theRandomNumber;
            $emptySpace = " ";
            $randomNumber = mt_rand(10, 1000000);
            $formalData = Storage::get('uniqueIdentity.json');
            $checkingValue = strpos($formalData, $randomNumber);

            if($checkingValue == false ){
               $theRandomNumber = $randomNumber;
               $this->generateIdentity($name, $theRandomNumber, $title, $author, $coursecode, $price, $duration, $description, $advertpicture);
               return $theRandomNumber;
            }else{
                  $this->randomStringGenerator($name, $title, $author, $coursecode, $price, $duration, $description, $advertpicture);  // recursive function call
            }
    }

    public function secondRandomStringGenerator(){
            $randomNumber = mt_rand(10, 1000000);
            $formalData = Storage::get('uniqueIdentity.json');
            $checkingValue = strpos($formalData, $randomNumber);

            if($checkingValue == false ){
               $theRandomNumber = $randomNumber;
               return $theRandomNumber;
            }else{
                  $this->randomStringGenerator();  // recursive function call
            }
    }

    public function addACourse(Request $request){
    	
        $title = $request->input('title');
        $author = $request->input('author');
        $coursecode = $request->input('coursecode');
        $price = $request->input('price');
        $duration = $request->input('duration');
        $description = $request->input('description');
        $adPicture = $request->advertpicture;
        $nameAdvertPicture = $adPicture->getClientOriginalName();
        $identity2 = $this->secondRandomStringGenerator();
        $advertpicture = $identity2 . $nameAdvertPicture; // uniqueIdnetity

        Storage::putFileAs('/public/images', new File($adPicture), $advertpicture);
        DB::insert('insert into courses (coursecode, advertpicture) values (?, ?)', [$coursecode, $advertpicture]);

        $pictures = $request->pictures;
        //$counter = 0;

        foreach ($pictures as $photo) {
            //counter ++;
            $name = $photo->getClientOriginalName();

            $identity = $this->randomStringGenerator($name, $title, $author, $coursecode, $price, $duration, $description, $advertpicture);
            
            //$objStore[$counter] = $identity . $name; 

            Storage::putFileAs('/public/images', new File($photo), $identity . $name);
        }

        return response()->json(array('message' => true), 200);
    	
    }
}


