<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invitation;
use App\Mail\InvitationEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\userProjects;

class SendInventionController extends Controller
{
    public function sendInvitation(Request $request)
    {
        $user = User::where('email',$request->email)->first();

        if ($user) {
            Mail::to($request->email)->send(new InvitationEmail());
            return response()->json([
                'message' => 'Invitation email sent successfully'],
                 200);
        }
        return response()->json(['message' => 'User not found'], 404);
        $invitation = Invitation::create([
            'email' => $request->email,
            'accepted' => false,
        ]);

        //add User To Project if accepted invitation
        if(Invitation::where('accepted',true)->first()) {
            $addUserToProject=userProjects::create([
                'role' => $request->role,
                'status'=>$request->status,
                'user-id'=>$user->id,
                'project-id'=>$request->projectId,
                ]);
    }

}
}