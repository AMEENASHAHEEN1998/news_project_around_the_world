<?php

namespace App\Http\Controllers\website;

use App\comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'comment' => 'required',
        ]);
        $comment = new comment();
        $comment->comment = $request->comment;
        $comment->user_id = $request->user_id;
        $comment->blog_id = $request->blog_id;
        $comment->save();
        toastr()->success('تم اضافة التعليق بنجاح');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'comment' => 'required',
        ]);
        comment::findOrFail($request->id)->update([
            'comment' => $request->comment,
            'user_id' => $request->user_id,
            'blog_id' => $request->blog_id,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        comment::findOrFail($request->id)->delete();
        return redirect()->back();
    }
}
