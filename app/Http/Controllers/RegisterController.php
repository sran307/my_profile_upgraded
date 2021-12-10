<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Validator, DB, Session
};
use App\Models\User;
class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            "first_name"        =>  "required",
            "last_name"         =>  "required",
            "email"             =>  "required | email | unique:users",
            "mobile_number"      =>  "required | max:10",
            "gender"            =>  "required",
            "interest"          =>  "required",
            "job"               =>  "required",
            "user_id"           =>  "required | unique:users",
            "password"          =>  "required | min:5",
            "image"             =>  "required"
        ])->validate();
        //image handling
        $image=$request->file("image");
        $image_name=$image->getClientOriginalName();
        $date=date("M-Y");
        $destination="images/profile_image/".$date;
        $image->move($destination, $image_name);
        //admin data creation
        $admin_data=User::where("user_type", 1)->get();
        //dd($image);
        //dd(json_encode($request["interest"]));
        $prefix="sr";
        $suffix="an";
        if(count($admin_data)==0)
        {
            DB::beginTransaction();
            try
            {
                User::create([
                    "first_name"    =>  "sreeraj",
                    "last_name"     =>  "s",
                    "email"         =>  "sreerajs728@gmail.com",
                    "mobile_number"  =>  740329125,
                    "gender"        =>  "male",
                    "interest"      =>  "coding",
                    "job"           =>  "business man",
                    "user_id"       =>  "sr82an71",
                    "password"      =>  md5("sr82an71"),
                    "user_type"     =>  1
                ]);
                DB::commit();
                
            }
            catch(\Exception $e)
            {
                dd($e);
                DB::rollback();
            }
        }
        DB::beginTransaction();
        try
        {
            User::create([
                "first_name"    =>  $request["first_name"],
                "last_name"     =>  $request["last_name"],
                "email"         =>  $request["email"],
                "mobile_number"  =>  $request["mobile_number"],
                "gender"        =>  $request["gender"],
                "interest"      =>  json_encode($request["interest"]),
                "job"           =>  $request["job"],
                "user_id"       =>  $request["user_id"],
                "password"      =>  md5($request["password"]),
                "image"         =>  $date.'/'.$image_name
            ]);
            DB::commit();
            return redirect()->route("login")->with([
                Session::flash("message", "Registration successfull"), 
                Session::flash("alert-class", "alert-success")
            ]);
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return redirect()->route("register")->with([
                Session::flash("message", "Registration failed"),
                Session::flash("alert-class", "alert-danger")

            ]);
        }
        
    }
}
