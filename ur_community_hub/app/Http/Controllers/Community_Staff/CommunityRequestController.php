<?php

namespace App\Http\Controllers\Community_staff;

use App\Http\Controllers\Controller;
use App\Models\CommunityRegistrationRequest;
use Illuminate\Http\Request;
use App\Mail\CommunityApprovalMail;
use Illuminate\Support\Facades\Mail;

class CommunityRequestController extends Controller
{

    public function index()
    {
        $requests = CommunityRegistrationRequest::orderBy('created_at', 'desc')->get();
        return view('user.community-staff.community-requests.index', compact('requests'));
    }

    public function show($id)
    {
        $request = CommunityRegistrationRequest::findOrFail($id);
        return view('user.community-staff.community-requests.show', compact('request'));
    }

    public function approve($id, Request $request)
    {
        $registrationRequest = CommunityRegistrationRequest::findOrFail($id);

        $registrationRequest->status = 'approved';
        $registrationRequest->admin_notes = $request->admin_notes;
        $registrationRequest->save();

        $user = $registrationRequest->user;
        if ($user) {
            $user->user_role = \App\Enums\UserRole::Community_Leader->value;
            $user->save();
            Mail::to($registrationRequest->email)->send(new CommunityApprovalMail($registrationRequest));
        }

        return redirect()->back()->with('success', 'Community registration request has been approved and user role updated.');
    }


    public function reject($id, Request $request)
    {
        $registrationRequest = CommunityRegistrationRequest::findOrFail($id);
        $registrationRequest->status = 'rejected';
        $registrationRequest->admin_notes = $request->admin_notes;
        $registrationRequest->save();

        // Send notification to the user
        // Add notification logic here if needed

        return redirect()->back()->with('success', 'Community registration request has been rejected.');
    }
}
