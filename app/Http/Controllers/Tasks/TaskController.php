<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function create(Request $request)
        {
        $task=Task::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status,
            'duration'=>$request->duration,
            'user-id'=>$request->id,
            'project-id'=>$request->idPro,
        ]);
            return response()->json([
            'data'=>$task,
            'msg'=>'create successfully',
            'status'=>200
        ]);
        }

    public function show(Task $Task)
        {
            $task=Task::all();
            return response()->json([
                'data'=>$task,
                'msg'=>'successfully',
                'status'=>200
            ]);
        }
    public function changeStatusTask(Request $request)
        {
            $updatedtaskComment=Task::find($request->id);
            $updatedtaskComment->update([
                'status'=>$request->status]);

                return response()->json([
                'data'=>$updatedtaskComment,
                'msg'=>'updated taskComment successfully',
                'status'=>200
            ]);
        }
    public function update(Request $request)
        {
            $updatedTask=Task::find($request->id);

            $updatedTask->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'status'=>$request->status,]);

                return response()->json([
                'data'=>$updatedTask,
                'msg'=>'updated Task successfully',
                'status'=>200
            ]);
        }

    public function destroy(Request $request)
        {
            $task=Task::find($request->id);
            $task->delete();
            return response()->json([
                'msg'=>'deleted successfully'
            ]);
        }
}