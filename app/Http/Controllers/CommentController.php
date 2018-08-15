<?php

namespace App\Http\Controllers;
use App\Comment;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\HolidayRequest;



class CommentController extends Controller
{
    public function indexForAdmin($id){
        
        $holiday_request = HolidayRequest::find($id);
        $id=$holiday_request->id;
        $comments=Comment::with('HolidayRequest')->where('request_id', $id)->get()->toArray();

        return Response()->json($comments);
    }

    protected function create(Request $request){

        $user = Auth::user();

        $comment = Comment::create([
            'id' => $request->id,
            'comment' => $request->comment,
            'author' =>$user->id,
            'request_id' =>$request->request_id,
            'created_at' => $request->timestamp,
            'updated_at' => $request->timesptamp]);

        return $comment;
    }
}
