<?php

namespace App\Http\Controllers;


use App\PublicHoliday;
use Illuminate\Http\{
    Request
};
use App\Http\Resources\PublicHoliday as PublicHolidayResource ;
class PublicHolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $holidays = PublicHoliday::get(['title','start','end','color']);
        return Response()->json($holidays);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $holiday = PublicHoliday::findOrFail($id);
        return new PublicHolidayResource($holiday);
    }


}
