<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UiController extends Controller
{
    
    public function index(){
        return view('signup');
    }
    public function welcome(){
        return view('welcome');
    }

    public function create(){

        $date=date('Y-m-d');
      
        $abc=  DB::table('user')->insert([
            'name' => $_POST['name'],  
            'email' => $_POST['email'],
            'number' => $_POST['number'],
            'date'=>$date
        ]);

        if($abc==true){
            $users = DB::table('user')
            ->select('*')->where('email', $_POST['email'])->first();
            if($users){
            $efg=  DB::table('user_details')->insert([
                'gender' =>  $_POST['gender'],  
                'address' =>  $_POST['address'],
                'user_id' => $users->id
           
            ]);

            return redirect()->route('welcome');


            
        }else{
            print_r("error");
        }
    }



    }

public function read(){
    
    $data = DB::table('user')
    ->join('user_details', 'user.id', '=', 'user_details.user_id')
    ->select('user.*', 'user_details.gender', 'user_details.address')
    ->get();
    //$one=1;
        return view('records',compact('data'));

}

public function edit(){
   
    if(isset($_POST['delete'])){
        $deleted = DB::table('user')->where('id', $_POST['delete'])->delete();
        if($deleted){
            $delete = DB::table('user_details')->where('user_id', $_POST['delete'])->delete();
            if($delete){
            echo "record deleted";    
        }
    }
}
if(isset($_POST['edit']))
{
    $data = DB::table('user')
 ->join('user_details', 'user.id', '=', 'user_details.user_id')
 ->select('user.*', 'user_details.gender', 'user_details.address')
 ->first();
 return view('edit',compact('data'));
}

}

public function update(){
    $updated=DB::table('user')
    ->where('id', $_POST['edit'])
    ->update(['name' => $_POST['name'],'email' => $_POST['email'],'number' => $_POST['number']]);

    $updated1=DB::table('user_details')
    ->where('user_id', $_POST['edit'])
    ->update(['address' => $_POST['address'],'gender' => $_POST['gender']]);
    
    
    if($updated || $updated1){
     echo "record updated";
    }else{
        echo "nothing to update";
    }


}

public function filter(){
    return view('filter');
}

public function newfilter(){
    $firstdate=$_POST['first'];
    $seconddate=$_POST['second'];
 
    $users = DB::table('user')
    ->join('user_details', 'user.id', '=', 'user_details.user_id')
    ->select('user.*', 'user_details.gender', 'user_details.address')->whereBetween('user.date', [$firstdate,$seconddate])->get();
 
    //print_r($firstdate." ".$seconddate);
    //print_r($users);
    if($users){

     return view('filter',compact('users'));
 
 }else{
 echo "No record found";
 }
 

}


public function dashboard(){
    return view('dashboard');
}


}