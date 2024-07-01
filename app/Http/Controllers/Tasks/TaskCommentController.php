<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\taskComment;


class TaskCommentController extends Controller
{
    public function create(Request $request)
    {
       $taskComment=taskComment::create([
        'comment'=>$request->comment,
        'user-id'=>$request->id,
       ]);
       return $taskComment;
    }

    public function show(taskComment $taskComment)
    {
        $taskComment=taskComment::all();
         return response()->json([
            'data'=>$taskComment,
            'msg'=>'successfully',
            'status'=>200
           ]);
    }
    public function update(Request $request)
    {
        $updatedtaskComment=taskComment::find($request->id);

        $updatedtaskComment->update([
            'comment'=>$request->comment,
            'user-id'=>$request->id]);

            return response()->json([
            'data'=>$updatedtaskComment,
            'msg'=>'updated taskComment successfully',
            'status'=>200
           ]);
    }


    public function destroy(Request $request)
    {
        $taskComment=taskComment::find($request->id);
        $taskComment->delete();
        return response()->json([
            'msg'=>'deleted successfully'
        ]);
    }
}
