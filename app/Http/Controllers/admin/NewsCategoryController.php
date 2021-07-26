<?php

namespace App\Http\Controllers\admin;
use App\Http\Requests\NewsCategoryRequest;
use App\Models\admin\NewsCategory;
use App\Models\admin\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $NewsCategorys = NewsCategory::all();
        return view('Admin.NewsCategory.NewsCategory' , compact('NewsCategorys'));

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
    public function store(NewsCategoryRequest $request)
    {
        try {
            $validated = $request->validated();

            $NewsCategory = new NewsCategory();
            $NewsCategory->news_category_name =['en' => $request->Name_en, 'ar' => $request->Name];
            $NewsCategory->Notes = $request->Notes;
            $NewsCategory->save();
            toastr()->success(trans('messages.success'));

            return redirect()->route('NewsCategory.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id )
    {
        $NewsCategory = NewsCategory::where('id', $id)->first();
        $NewsCategorys = NewsCategory::all();
        $Blogs = Blog::where('news_category_id' , $id)->get();
        return view('Admin.NewsCategory.ShowNewsCategory', compact('Blogs' , 'NewsCategory' ,'NewsCategorys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsCategory $newsCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(NewsCategoryRequest $request)
    {
        try {
            $validated = $request->validated();

            $NewsCategory = NewsCategory::findOrFail($request->id);
            $NewsCategory->update([
                $NewsCategory->news_category_name =['en' => $request->Name_en, 'ar' => $request->Name],
                $NewsCategory->Notes = $request->Notes,
            ]);

            toastr()->success(trans('messages.success'));

            return redirect()->route('NewsCategory.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $NewsCategory = NewsCategory::findOrFail($request->id);
        $NewsCategory->delete();

        toastr()->success(trans('messages.Delete'));

        return redirect()->route('NewsCategory.index');
    }
}
