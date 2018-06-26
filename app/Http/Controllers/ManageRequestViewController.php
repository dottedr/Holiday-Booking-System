<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageRequestViewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($hrequestid=null)
    {
        if($hrequestid==null){
        //TODO: return only to admin
            return view('viewrequests', array("hrequestid"=>$hrequestid));
        }
        else{
            return view('singlerequest', array("hrequestid"=>$hrequestid));
        }
    }
    public function indexMyRequests($hrequestid=null)
    {
        return view('myrequests');
    }



}
