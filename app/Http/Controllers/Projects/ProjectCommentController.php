<?php

namespace App\Http\Controllers\Projects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\projectComment;

class ProjectCommentController extends Controller
{
    public function create(Request $request)
    {
       $projectComment=projectComment::create([
        'comment'=>$request->comment,
        'user-id'=>$request->id,
       ]);
       return $projectComment;
    }

    public function show(projectComment $projectComment)
    {
        $projectComment=projectComment::all();
         return response()->json([
            'data'=>$projectComment,
            'msg'=>'successfully',
            'status'=>200
           ]);
    }


    public function update(Request $request)
    {
        $updatedprojectComment=projectComment::find($request->id);

        $updatedprojectComment->update([
            'comment'=>$request->comment]);

            return response()->json([
            'data'=>$updatedprojectComment,
            'msg'=>'updated projectComment successfully',
            'status'=>200
           ]);
    }

    public function destroy(Request $request)
    {
        $projectComment=projectComment::find($request->id);
        $projectComment->delete();
        return response()->json([
            'msg'=>'deleted successfully'
        ]);
    }
}
