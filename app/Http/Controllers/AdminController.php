<?php

namespace App\Http\Controllers;

use App\Models\AuthorRequest;
use App\Models\User;

class AdminController extends Controller
{
    public function admindashboard(){
        $requests = AuthorRequest::where('status','pending')->get();
        return view('admin.index',compact('requests'));
    }
    
    public function deletRequest($requestId){
        AuthorRequest::findOrFail($requestId)->update(['status' => 'rejected']);
        return redirect()->back()->with('success','Your request has been removed successfully.');
    }

    public function acceptRequest($requestId,$userId){
        $requestAccepted = AuthorRequest::find($requestId);
        $user = User::find($userId);
        if(!$requestAccepted || !$user){
            return redirect()->back()->with('error', 'Request or user not found.');
        }
        $requestAccepted->status = 'approved';
        $requestAccepted->save();
        $user->role = 'author';
        $user->save();
        return redirect()->back()->with('success','You granted a user the role of an author.');
    }

    public function approvedRequests(){
        $requests = AuthorRequest::where('status','approved')->get();
        return view('admin.approvedRequests',compact('requests'));
    }

    public function rejectedRequests(){
        $requests = AuthorRequest::where('status','rejected')->get();
        return view('admin.rejectedRequests',compact('requests'));
    }

    public function storeRejectedRequests($requestId){
        AuthorRequest::findOrFail($requestId)->update(['status' => 'rejected']);
        return redirect()->back()->with('success','You rejected a request');
    }

    public function storeApprovedRequests($requestId){
        AuthorRequest::findOrFail($requestId)->update(['status' => 'approved']);
        return redirect()->back()->with('success','You approved a request');
    }
}
