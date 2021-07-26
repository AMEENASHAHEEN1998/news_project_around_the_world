<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\NewsCategory;
use App\JoinReporters;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailReporter;
use App\EmailReporter;

class JoinReportersController extends Controller
{

    public function index(){
        $NewsCategorys = NewsCategory::all();
        $join_reporters = JoinReporters::orderBy('id' , 'desc')->paginate(5);
        return view('Admin.JoinReporters.show_all_request')->with(['join_reporters' => $join_reporters , 'NewsCategorys' => $NewsCategorys]);
    }

    public function show_join_request($id){
        $NewsCategorys = NewsCategory::all();
        $join_reporter = JoinReporters::findOrFail($id);
        
        return view('Admin.JoinReporters.show_single_request')->with(['join_reporter' => $join_reporter , 'NewsCategorys' => $NewsCategorys]);
    }

    public function call_reporter($id){
        $NewsCategorys = NewsCategory::all();
        $join_reporter = JoinReporters::findOrFail($id);
        
        return view('Admin.JoinReporters.call_reporter')->with(['join_reporter' => $join_reporter , 'NewsCategorys' => $NewsCategorys]);
    }

    public function send_email_reporter(Request $request){
        $data = $request->except(['_token' , 'user_id']);

        $email_reporter = EmailReporter::create($data);
        join_reporter::where('user_id' , $request->user_id)->Update([
            'status' => 1;
        ]);
        //return $request->email;
        Mail::to($request->email)->send(new SendEmailReporter($email_reporter)); 
        return redirect()->back();
    }

    public function delete(Request $request){
        $join_request = JoinReporters::findOrFail($request->id);
        $join_request->delete();
        return redirect()->route('show_all_request');
    }
}
