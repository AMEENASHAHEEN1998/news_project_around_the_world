<?php

namespace App\Http\Controllers\website;

use App\comment;
use App\Models\admin\Blog;
use App\Website;
use Illuminate\Http\Request;
use App\Models\admin\NewsCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\JoinReporterRequest;
use App\JoinReporters;
use App\User;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $NewsCategorys = NewsCategory::all();
        $Blogs = Blog::where('Value_Status' , 2)->orderBy('id' , 'desc')->get();

        return view('Website.index', compact('NewsCategorys' ,'Blogs' ));
    }

    public function show_category($id){
        //$NewsCategorys = NewsCategory::all();
        $Blogs = Blog::where('Value_Status' , 2)->where('news_category_id',$id)->orderBy('id' , 'desc')->get();
        $NewsCategory = NewsCategory::where('id' , $id);

        return view('Website.page_category' ,compact( 'NewsCategory' ,'Blogs'));
    }

    public function show_news(Request $request , $id){
        $Blog = Blog::where('id' , $id)->where('Value_Status' , 2)->get();

        $views = Blog::findOrFail($request->id);
        $views->update([
            $views->views = $request->views,
        ]);

        $Blogs = Blog::where('Value_Status' , 2)->get();
        $comments = comment::where('blog_id' , $id)->get() ;


        return view('Website.page_news' , compact('Blog' ,'Blogs' , 'comments' ));
    }
    public function show_news_without_increase($id){
        $Blog = Blog::where('id' , $id)->where('Value_Status' , 2)->get();

        $Blogs = Blog::where('Value_Status' , 2)->get();
        $comments = comment::where('blog_id' , $id)->get() ;

        return view('Website.page_news' , compact('Blog' ,'Blogs' , 'comments' ));
    }

    public function join_the_reporters(){
        return view('Website.join_the_reporters');
    }

    // تخزين الصور
    public function store_join_the_reporters(JoinReporterRequest $request){


        //dd($request->all());
        //$certificate_photo = $request->file('certificate_photo')->getClientOriginalName();
        $certificate_photo_ex = $request->file('certificate_photo')->getClientOriginalExtension();
        $new_certificate_photo = 'AroundWorldNews_' .time() . '_'. rand() . '.'. $certificate_photo_ex;

        $photograph_ex = $request->file('photograph')->getClientOriginalExtension();
        $new_photograph = 'AroundWorldNews_' . time()  . '_'. rand() . '.' . $photograph_ex;

         JoinReporters::create([
            'user_id'            => $request->user_id,
            'gender'             => $request->gender,
            'birth_Date'         => $request->birth_Date,
            'college'            => $request->college,
            'average'            => $request->average,
            'reason'             => $request->reason,
            'certificate_photo'  => $new_certificate_photo,
            'photograph'         => $new_photograph,
            'status'             => 0,       
        ]);

        $request->file('certificate_photo')->move(public_path('uploads') , $new_certificate_photo);
        $request->file('photograph')->move(public_path('uploads') , $new_photograph);

        auth()->user()->update([
            'name'  => $request->full_name,
            'email' => $request->email,
        ]);
        toastr()->success(trans('website.success'));
        return redirect()->route('website');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function show(Website $website)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function edit(Website $website)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Website $website)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function destroy(Website $website)
    {
        //
    }
}
