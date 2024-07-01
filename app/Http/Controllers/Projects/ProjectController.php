<?php

namespace App\Http\Controllers\Projects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{

    public function create(Request $request)
        {
        $poject=Project::create([
            'title'=>$request->title,
            'description'=>$request->description,
        ]);
        return $poject;
        }

    public function show(){
            $data=Project::all();
            return response()->json([
                'data'=>$data,
                'msg'=>'successfully',
                'status'=>200]);
        }
    public function update(Request $request)
        {
            $updatedPoject=Project::find($request->id);
            $updatedPoject->update([
                'title'=>$request->title,
                'description'=>$request->description,]);

            return response()->json([
            'data'=>$updatedPoject,
            'msg'=>'updated Poject successfully',
            'status'=>200]);
        }


    public function showDetailProject(Request $request){
            $data=Project::find($request->id);
            $data->usersProjects;
            return $data;
        }



    public function destroy(Request $request)
        {
            $Poject=Project::find($request->id);
            $Poject->delete();
            return response()->json([
                'msg'=>'deleted successfully'
            ]);
        }
}