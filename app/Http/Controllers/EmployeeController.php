<?php

namespace App\Http\Controllers;

use App\VerifyUser;
use Illuminate\Http\Request;

use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Requests;
use App\User;
use App\Http\Resources\User as EmployeeResource;
use Illuminate\Support\Facades\Auth;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $isadmin = Auth::user()->isadmin;
        if($isadmin==1) {
            $employee = User::all();
            return Response()->json(array("status"=>true, "data"=>$employee));
        }
        else{
            return Response()->json(array("status"=>false));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = User::create([
            'isadmin' => $request->isadmin,
            'verified'=> $request->verified,
            'name' => $request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'holiday_allowance'=>$request->holiday_allowance,
            'role'=>$request->role,
            'created_at' => $request->timestamp,
            'updated_at' => $request->timestamp]);

        $verifyUser = VerifyUser::create([
            'user_id' => $employee->id,
            'token' => str_random(40)]);

        Mail::to($employee->email)->send(new VerifyMail($employee));

        return Response()->json(array("status"=>true, "data"=>$employee));
    }

    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
        }else{
            return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
        }
        return redirect('/login')->with('status', $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $employee=User::findOrFail($id);
        return Response()->json(array("status"=>true, "data"=>$employee));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
