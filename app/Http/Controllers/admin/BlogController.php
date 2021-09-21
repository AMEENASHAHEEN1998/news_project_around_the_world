<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\BlogsNewsRequest;
use App\Models\admin\Blog;
use App\Models\admin\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $NewsCategorys = NewsCategory::all();
        $Blogs = Blog::orderBy('id' , 'desc')->get();
        return view('Admin.Blogs.show_all_blogs' , compact('Blogs' , 'NewsCategorys'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $NewsCategorys = NewsCategory::all();
        return view('Admin.Blogs.add_blog' , compact(  'NewsCategorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogsNewsRequest $request)
    {

        //dd($request->all());
        //try {
            $validated = $request->validated();
            if ($request->hasFile('pic')){
                $image = $request->file('pic');
                $file_name = $image->getClientOriginalName();
            }else{
                $file_name = '';
            }
            $Blog = new Blog();
            $Blog->user_id = $request->user_id;
            $Blog->views = $request->views;
            $Blog->blog_name = ['en' => $request->blog_name_en, 'ar' => $request->blog_name_ar];
            $Blog->short_note = ['en' => $request->note_en, 'ar' => $request->note_ar] ;
            $Blog->long_notes = ['en' => $request->note_details_en, 'ar' => $request->note_details_ar] ;
            $Blog->image_name = $file_name;
            $Blog->Status = ['en' => 'Approve The Blog' , 'ar' => 'الموافقة على الخبر'];
            $Blog->Value_Status = 1;
            $Blog->news_Date = $request->news_Date;
            $Blog->news_category_id = $request->news_category_name ;
            $Blog->save();

            if($file_name !== ''){
                // move pic
                $imageName = $request->pic->getClientOriginalName();
                $request->pic->move(public_path('Attachments/'), $imageName);
            }

            toastr()->success(trans('messages.success'));
            return back();
        // }
        // catch (\Exception $e){
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $NewsCategorys = NewsCategory::all();
        $Blog = Blog::where('id', $id)->first();
        return view('Admin.Blogs.show_status_blog' , compact(  'Blog' , 'NewsCategorys'));

    }

    public function show_blog_dashboard($id)
    {
        $NewsCategorys = NewsCategory::all();

        $Blog = Blog::where('id', $id)->first();
        return view('Admin.Blogs.show_blog' , compact(  'Blog' ,  'NewsCategorys'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $NewsCategorys = NewsCategory::all();
        $Blog = Blog::findOrFail($id);
        return view('Admin.Blogs.edit_blog' , compact(  'NewsCategorys' , 'Blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogsNewsRequest $request , $id )
    {
        //try {

            $validated = $request->validated();

            $Blog = Blog::findOrFail($id);

            if ($request->hasFile('pic')) {
                $imageName = $request->pic->getClientOriginalName();
                $request->pic->move(public_path('Attachments/'), $imageName);
            if (File::exists($Blog->imageName)) {
                File::delete($Blog->imageName);
            }
            $Blog->update([
                'image_name' => $imageName
            ]);
            }

            $Blog->update([
                $Blog->user_id = $request->user_id,
                $Blog->views = 0,
                $Blog->blog_name = ['en' => $request->blog_name_en, 'ar' => $request->blog_name_ar],
                $Blog->short_note = ['en' => $request->note_en, 'ar' => $request->note_ar] ,
                $Blog->long_notes = ['en' => $request->note_details_en, 'ar' => $request->note_details_ar] ,
                $Blog->Status = ['en' => 'Approve The Blog' , 'ar' => 'الموافقة على الخبر'],
                $Blog->Value_Status = 1,
                $Blog->news_Date = $request->news_Date,
                $Blog->news_category_id = $request->news_category_name ,
            ]);


            toastr()->success(trans('messages.Update'));

            return redirect()->route('Blog.index');
        // }
        // catch (\Exception $e){
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $Blog = Blog::findOrFail($request->id);
        $Blog->delete();
        toastr()->success(trans('messages.Delete'));

        return redirect()->route('Blog.index');
    }

    public function update_status($id , Request $request){
        $Blog = Blog::findOrFail($request->id);
        if ($request->Status === 'الأخبار المنشورة') {
            $Blog->update([
                'Value_Status' => 2,
                'Status' => ['ar'=>$request->Status , 'en'=>'Published News'],
                'news_Date' => $request->news_Date,
            ]);
        }elseif ($request->Status === 'لأخبار المرفوضة') {
            $Blog->update([
                'Value_Status' => 3,
                'Status' => ['ar'=>$request->Status , 'en'=>'Unapproved News'],
                'news_Date' => $request->news_Date,
            ]);
        }
        toastr()->success(trans('messages.Update'));

        return redirect()->route('Blog.index');
    }

    public function published_news(){
        $NewsCategorys = NewsCategory::all();
        $Blogs = Blog::where('Value_Status' , '2')->get();
        $Blogs_Page = trans('admin/blogs.published_news');
        return view('Admin.Blogs.status_blogs',compact('Blogs' , 'Blogs_Page' , 'NewsCategorys'));
    }
    public function approval_of_the_news(){
        $NewsCategorys = NewsCategory::all();
        $Blogs = Blog::where('Value_Status' , '1')->get();
        $Blogs_Page = trans('admin/blogs.approval_of_the_news');
        return view('Admin.Blogs.status_blogs',compact('Blogs' , 'Blogs_Page' ,'NewsCategorys'));
    }
    public function unacceptable_news(){
        $NewsCategorys = NewsCategory::all();
        $Blogs = Blog::where('Value_Status' , '3')->get();
        $Blogs_Page = trans('admin/blogs.unacceptable_news');
        return view('Admin.Blogs.status_blogs',compact('Blogs' , 'Blogs_Page' , 'NewsCategorys'));
    }
}
