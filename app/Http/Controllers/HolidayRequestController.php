<?php

namespace App\Http\Controllers;
use App\HolidayRequest;
use Illuminate\Http\Request;
use App\Http\Resources\HolidayRequest as HolidayRequestResource;
use Illuminate\Support\Facades\Auth;

class HolidayRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//
    {
        //mapping title to user.name
        $holiday = array_map(
            function($hol)
                {
                $hol['title']=$hol['user']['name'];
                unset($hol['user']); return $hol;
                },
            HolidayRequest::with("user")->get()->toArray()
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
        /*$request->validate([
            'start' => 'required',
            'end' => 'required',
        ]);*/
       $user = Auth::user();


        $task = HolidayRequest::create([
            'start' => $request->start,
            'end' => $request->end,
            'type'=>$request->type,
            'status'=>$request->status,
            'created_by'=>$user->id,
            'created_at' => $request->timestamp,
            'updated_at' => $request->timesptamp]);
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
    public function update( Request $request, $id)
    {
        $request->validate([
        'status' => 'required',
    ]);

        $holiday = HolidayRequest::find($id);
        $holiday->status = $request->input('status');
        $holiday->save;

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
