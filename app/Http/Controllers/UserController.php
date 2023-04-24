<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{


    public function create(Request $request){

        $validated = $request->validate([
            'name' => 'required|max:255',
           'email' => 'required|email|max:255',
          'number' => 'required|numeric|min:10|max:10',
          'gender'=>'required',
          'address'=>'required',
          
        ]);
        $date=date('Y-m-d');
      
      $abc=  DB::table('user')->insert([
            'name' => $request->name,  
            'email' => $request->email,
            'number' => $request->number,
            'date'=>$date
        ]);
        if($abc==true){
            $users = DB::table('user')
            ->select('*')->where('email', $request->email)->first();
            if($users){
            $efg=  DB::table('user_details')->insert([
                'gender' => $request->gender,  
                'address' => $request->address,
                'user_id' => $users->id
           
            ]);

            return ["status"=>true,"message"=>"data inserted"];
        }else{
            return ["status"=>false,"message"=>"Error"];
        }
    }
    
    }

    public function update(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
           'email' => 'required|email|max:255',
          'number' => 'required|numeric|min:10|max:10',
          'gender'=>'required',
          'address'=>'required',
        ]);

        $updated=DB::table('user')
        ->where('id', $request->id)
        ->update(['name' => $request->name,'email' => $request->email,'number' => $request->number]);

        $updated1=DB::table('user_details')
        ->where('user_id', $request->id)
        ->update(['address' => $request->address,'gender' => $request->gender]);
        
        
        if($updated || $updated1){
            return ["status"=>true,"data"=>"update successfuly"];
    
        }else{
            return ["status"=>false,"message"=>"No record found"];
    
        }




    }
    public function delete(Request $request){
        $deleted = DB::table('user')->where('id', $request->id)->delete();
        if($deleted){
            $delete = DB::table('user_details')->where('user_id', $request->id)->delete();
            if($delete){
            return ["status"=>true,"data"=>"deleted successfuly"];
    
        }
    }else{
        return ["status"=>false,"message"=>"No record found"];

    }

        
    }
    public function read(Request $request){
        if(!($request->id)){
  //          print_r("first");
        // $users = DB::table('user')
        //     ->select('*')
        //     ->get();
            $users = DB::table('user')
            ->join('user_details', 'user.id', '=', 'user_details.user_id')
            ->select('user.*', 'user_details.gender', 'user_details.address')
            ->get();

            if($users){
                return ["status"=>true,"data"=>$users];
        
            }else{
                return ["status"=>true,"message"=>"no record found"];
        
            }
        }else{
//            print_r("second");
$users = DB::table('user')
->join('user_details', 'user.id', '=', 'user_details.user_id')
->select('user.*', 'user_details.gender', 'user_details.address')->where('user.id', $request->id)->first();
            if($users){
                return ["status"=>true,"data"=>$users];
        
            }else{
                return ["status"=>true,"message"=>"no record found"];
        
            }
    
        }
    }

    public function filter(Request $request){

   $firstdate=$request->first;
   $seconddate=$request->second;

   $users = DB::table('user')
   ->join('user_details', 'user.id', '=', 'user_details.user_id')
   ->select('user.*', 'user_details.gender', 'user_details.address')->whereBetween('user.date', [$request->first,$request->second])->get();

   //print_r($firstdate." ".$seconddate);

   //print_r($users);
   if($users){
    return ["status"=>true,"data"=>$users];

}else{
    return ["status"=>true,"message"=>"no record found"];

}

    }

}
