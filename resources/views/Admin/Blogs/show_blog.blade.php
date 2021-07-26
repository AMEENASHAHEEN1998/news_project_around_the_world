
@extends('layouts.master')
@section('css')
    @toastr_css

@section('title')
    {{trans('admin/blogs.show_blog')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('admin/blogs.show_blog')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('admin/blogs.blogs')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('admin/blogs.show_blog')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

<div class="col-lg-12 col-md-12 col-sm-8 col-xs-12">
    <div class="row">


            <div class="single_post_area">
                <h2 class="post_title wow ">{{$Blog->blog_name}} </h2>
                <br><br>
                <?php $user =  App\User::where('id' , $Blog->user_id)->get();?>
                @foreach ($user as $user)
                    <a href="#" class="author_name"><i class="fa fa-user"></i>{{ $user->name }}</a> <a href="#" class="post_date"><i class="fa fa-clock-o"></i>{{$Blog->news_Date}}</a>
                @endforeach

                <div class="single_post_content">
                    <br> <br>
                    <p> {{$Blog->short_note}}</p>
                    <br> <br> <br>
                    <img class="img-center" style="margin: 5px 50px 10px 50px" src="{{ URL::to('/Attachments/'.$Blog->image_name)}}" alt="">
                    <br> <br> <br>
                    <p>{{$Blog->long_notes}}</p>


            </div>


    </div>
</div>
@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection
