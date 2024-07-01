<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invitation;


class ShowInvitaions extends Controller
{
   public function ShowInvitation(Request $request){
    $data=Invitation::all();
    return response()->json([
       'data'=>$data,
       'status'=>200,
      ]);

   }
}