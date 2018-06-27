<?php

namespace App\Http\Controllers;
use App\HolidayRequest;
use App\Http\Resources\User;
use AppUser;
use App\Mail\DecisionMail;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Resources\HolidayRequest as HolidayRequestResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HolidayRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//
    {
        $user = Auth::user();
        //mapping title to user.name
        $holiday = array_map(
            function($hol)
                {
                $hol['title']=$hol['user']['name'];
                unset($hol['user']); return $hol;
                },
            HolidayRequest::with("user")->whereNotIn('created_by',[$user->id])->get()->toArray()
        );

        return Response()->json($holiday);
    }

    public function indexCalendar()//
    {

        //mapping title to user.name
        $holiday = array_map(
            function($hol)
            {
                $hol['title']=$hol['user']['name'];
                unset($hol['user']); return $hol;
            },
            HolidayRequest::with("user")->where('status', 'accepted')->get()->toArray()
        );

        if (count($holiday)>0){
            return Response()->json($holiday);
        }
        else{
            return Response()->json(array("how did it go"=>'so so'));
        }


    }

    public function indexMyRequests()//
    {
        $user = Auth::user();

        //mapping title to user.name
        $holiday = array_map(
            function($hol)
            {
                $hol['title']=$hol['user']['name'];
                unset($hol['user']); return $hol;
            },
            HolidayRequest::with("user")->where('created_by',$user->id)->get()->toArray()
        );

        return Response()->json($holiday);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'start' => 'required',
            'end' => 'required',
        ]);
       $user = Auth::user();


        $task = HolidayRequest::create([
            'start' => $request->start,
            'end' => $request->end,
            'type'=>$request->type,
            'status'=>$request->status,
            'created_by'=>$user->id,
            'created_at' => $request->timestamp,
            'updated_at' => $request->timesptamp]);
        /*if(preg_match('([2][0][1][8-9]-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))', $request->get('start'))
        {
            return redirect()->back()->with("error","Error in data format");
        }*/
        return $task;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $holiday = HolidayRequest::findOrFail($id);


        return Response()->json($holiday);
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
    public function update( Request $request)
    {
        $request->validate([
            'id' => 'required',
            'status' => 'required',
    ]);

        $holiday = HolidayRequest::find($request->id);
        $holiday->status = $request->status;
        $holiday->save();
        $empid = $holiday->created_by;
        //get id of the employee who posted the request
        $employee = \App\User::find($empid);

        Mail::to($employee->email)->send(new DecisionMail($employee));

        return Response()->json($holiday);
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
