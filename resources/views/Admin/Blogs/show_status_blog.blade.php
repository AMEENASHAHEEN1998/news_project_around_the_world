
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
                    <form action="{{ route('update_status' , [$Blog->id]) }}" method="post" enctype="multipart/form-data"
                          autocomplete="off">

                        {{ csrf_field() }}
                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">{{trans('admin/blogs.blog_name_ar')}}</label>
                                <input type="text" class="form-control" id="inputName" name="blog_name_ar"
                                       title="{{trans('admin/blogs.blog_name_title')}}" value="{{$Blog->getTranslation('blog_name', 'ar')}}" required readonly>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">{{trans('admin/blogs.blog_name_en')}}</label>
                                <input type="text" class="form-control" id="inputName" name="blog_name_en"
                                       title="{{trans('admin/blogs.blog_name_title')}}" value="{{$Blog->getTranslation('blog_name', 'en')}}" required readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">{{trans('admin/blogs.blog_category')}}</label>
                                <select name="news_category_name" class="form-control SlectBox" value="{{$Blog->news_category_id}}" required readonly >
                                    <!--placeholder-->
                                    <option value="" selected disabled>{{trans('admin/blogs.choose_blog_category')}}</option>
                                    @foreach ($NewsCategorys as $NewsCategory)
                                        <option value="{{ $NewsCategory->id }}"> {{ $NewsCategory->news_category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">{{trans('admin/blogs.short_note_ar')}}</label>
                                <textarea class="form-control" id="exampleTextarea" name="note_ar" rows="3"
                                           required readonly>{{$Blog->getTranslation('short_note', 'ar')}}</textarea>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">{{trans('admin/blogs.short_note_en')}}</label>
                                <textarea class="form-control" id="exampleTextarea" name="note_en" rows="3"
                                           required readonly>{{$Blog->getTranslation('short_note', 'en')}}</textarea>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">{{trans('admin/blogs.the_details_ar')}}</label>
                                <textarea class="form-control" id="exampleTextarea" name="note_details_ar" rows="3"
                                           readonly>{{$Blog->getTranslation('long_notes', 'ar')}}</textarea>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">{{trans('admin/blogs.the_details_en')}}</label>
                                <textarea class="form-control" id="exampleTextarea" name="note_details_en" rows="3"
                                           readonly>{{$Blog->getTranslation('long_notes', 'en')}}</textarea>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">{{trans('admin/blogs.status_blog')}}</label>
                                <select class="form-control" id="Status" name="Status" required>
                                    <option selected="true" disabled="disabled"> {{trans('admin/blogs.identify_status_blog')}}</option>
                                    <option value="الأخبار المنشورة">{{trans('admin/blogs.approve_blog')}}</option>
                                    <option value="الأخبار المرفوضة"> {{trans('admin/blogs.un_approve_blog')}}</option>
                                </select>
                            </div>

                            <div class="col">
                                <label>{{trans('admin/blogs.date_of_publication')}}</label>
                                <input class="form-control fc-datepicker" name="news_Date" value="{{ $Blog->news_Date }}"
                                       type="text" required>
                            </div>


                        </div><br>

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
    @toastr_js
    @toastr_render
    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>
@endsection
