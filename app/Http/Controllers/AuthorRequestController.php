<?php

namespace App\Http\Controllers;

use App\Models\AuthorRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthorRequestController extends Controller
{
    public function showRequestForm(){
        return view('formes.requestForm');
    }

    public function validateRequest(){
        $existingRequest = AuthorRequest::where('user_id',Auth::id())->where('status','pending')->first();
        if($existingRequest){
            return redirect('/')->with('error','You have send a request yet');
        }

        AuthorRequest::create([
            'user_id' => Auth::id(),
            'status' => 'pending'
        ]);

        return redirect('/')->with('success','Your request is under review.');
    }
}
