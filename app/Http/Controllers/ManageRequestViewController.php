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
        $this->middleware('auth');
    }
    /**
     * Show employees requests
     *
     * @return view
     */
    public function index($hrequestid=null)
    {
        if($hrequestid==null){
            return view('viewrequests', array("hrequestid"=>$hrequestid));
        }
        else{
            return view('singlerequest', array("hrequestid"=>$hrequestid));
        }
    }
    /**
     * Show your requests
     *
     * @return view
     */
    public function indexMyRequests($hrequestid=null)
    {
        if($hrequestid==null){
            return view('myrequests', array("hrequestid"=>$hrequestid));
        }
        else{
            return view('mysinglerequest', array("hrequestid"=>$hrequestid));
        }
    }

}
