
@extends('layouts.master')
@section('css')

@section('title')
    {{trans('admin/blogs.edit_blog')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('admin/blogs.edit_blog')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('admin/blogs.blogs')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('admin/blogs.edit_blog')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{ route('Blog.update' , [$Blog->id]) }}" method="post" enctype="multipart/form-data"
                          autocomplete="off">
                        {{method_field('patch')}}
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                        <input type="hidden" value="0" name="views">

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">{{trans('admin/blogs.blog_name_ar')}}</label>
                                <input type="text" class="form-control" id="inputName" name="blog_name_ar"
                                       title="{{trans('admin/blogs.blog_name_title')}}" value="{{$Blog->getTranslation('blog_name', 'ar')}}" required>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">{{trans('admin/blogs.blog_name_en')}}</label>
                                <input type="text" class="form-control" id="inputName" name="blog_name_en"
                                       title="{{trans('admin/blogs.blog_name_title')}}" value="{{$Blog->getTranslation('blog_name', 'en')}}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">{{trans('admin/blogs.blog_category')}}</label>
                                <select name="news_category_name" class="form-control SlectBox" value="{{$Blog->news_category_id}}" required >
                                    <!--placeholder-->
                                    <option value="" selected disabled>{{trans('admin/blogs.choose_blog_category')}}</option>
                                    @foreach ($NewsCategorys as $NewsCategory)
                                        <option value="{{ $NewsCategory->id }}"> {{ $NewsCategory->news_category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label> {{trans('admin/blogs.news_date')}}</label>
                                <input class="form-control fc-datepicker" name="news_Date" placeholder="YYYY-MM-DD"
                                       type="date" value="{{ $Blog->news_Date }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">{{trans('admin/blogs.short_note_ar')}}</label>
                                <textarea class="form-control" id="exampleTextarea" name="note_ar" rows="3"
                                          value="{{$Blog->getTranslation('short_note', 'ar')}}" required></textarea>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">{{trans('admin/blogs.short_note_en')}}</label>
                                <textarea class="form-control" id="exampleTextarea" name="note_en" rows="3"
                                          value="{{$Blog->getTranslation('short_note', 'en')}}" required></textarea>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">{{trans('admin/blogs.the_details_ar')}}</label>
                                <textarea class="form-control" id="exampleTextarea" name="note_details_ar" rows="3"
                                          value="{{$Blog->getTranslation('long_notes', 'ar')}}"></textarea>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">{{trans('admin/blogs.the_details_en')}}</label>
                                <textarea class="form-control" id="exampleTextarea" name="note_details_en" rows="3"
                                          value="{{$Blog->getTranslation('long_notes', 'en')}}"></textarea>
                            </div>
                        </div><br>
                        <input type="hidden" name="pic" class="dropify" accept=".jpg, .png, image/jpeg, image/png"
                               data-height="70" value="{{$Blog->image_name}}" />

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">{{trans('admin/blogs.sent')}}</button>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
