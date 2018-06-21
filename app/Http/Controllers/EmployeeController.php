<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Requests;
use App\User;
use App\Employee;
use App\Http\Resources\User as EmployeeResource;
use Illuminate\Support\Facades\Auth;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => $request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'holiday_allowance'=>$request->holiday_allowance,
            'role'=>$request->role,
            'created_at' => $request->timestamp,
            'updated_at' => $request->timesptamp]);
        return $employee;
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
