@extends('layouts_website.master')

@section('css')

@section('title')
    {{ trans('website.home_page') }}
@stop
@endsection
@section('page-header')
    <div class="thumbnail_slider_area">
        <div class="owl-carousel">
            @foreach($Blogs as $Blog)

                <div class="signle_iteam"> <img src="{{ URL::to('/Attachments/'.$Blog->image_name)}}" alt="">
                <div class="sing_commentbox slider_comntbox">
                    <p><i class="fa fa-calendar"></i>{{$Blog->news_Date}}</p>
                    <a href="#"><i class="fa fa-comments"></i>20 Comments</a></div>
                    <form action="{{route('show_news' ,[$Blog->id])}}" method="post" style="" class="slider_tittle ">
                        @csrf
                        <input type="hidden" value="{{ ++$Blog->views }}" name="views">
                        <input type="hidden" value="{{ $Blog->id }}" name="id">
                        <div>
                        <button class="form_views">{{$Blog->blog_name}}</button>

                        </div>
                    </form>
                {{-- <a class="slider_tittle" href="{{route('show_news' ,[$Blog->id])}}">{{$Blog->blog_name}}</a> --}}
            </div>
            @endforeach
        </div>
    </div>
@endsection
@section('content')

            <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
                <div class="row">
                    <div class="middle_bar">
                        <div class="featured_sliderarea">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach($Blogs as $Blog)
                                    <li data-target="#myCarousel" data-slide-to="{{$Blog->id}}"
                                        @if($loop->first )
                                            class="active"
                                        @else
                                            class =""
                                        @endif
                                    ></li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    @foreach($Blogs as $Blog)

                                    <div class="item
                                    @if($loop->first )
                                        active"
                                    @else
                                        "
                                    @endif> <img src="{{ URL::to('/Attachments/'.$Blog->image_name)}}" alt="">
                                        <div class="carousel-caption">
                                            <form action="{{route('show_news' ,[$Blog->id])}}" method="post" style="" class="slider_tittle ">
                                                @csrf
                                                <input type="hidden" value="{{ ++$Blog->views }}" name="views">
                                                <input type="hidden" value="{{ $Blog->id }}" name="id">
                                                <div>
                                                <button class="form_views">{{$Blog->blog_name}}</button>

                                                </div>
                                            </form>
                                            {{-- <h1><a href="#"> {{$Blog->blog_name}}</a></h1> --}}
                                        </div>
                                    </div>
                                @endforeach

                                </div>
                                <a class="left left_slide" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> </a>
                                    <a class="right right_slide" href="#myCarousel" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> </a></div>
                        </div>
                        <div class="single_category wow fadeInDown">
                            @foreach($NewsCategorys as $NewsCategory)
                            @if(App\Models\admin\NewsCategory::find($NewsCategory->id)->Blogs()->count() > 0)
                            <div class="category_title"> <a href="{{route('show_category' ,[$NewsCategory->id])}}"> {{$NewsCategory->news_category_name}}</a></div>
                            <div class="single_category_inner">
                                <ul class="catg_nav">

                                    @foreach(App\Models\admin\NewsCategory::find($NewsCategory->id)->Blogs()->orderBy('id' , 'desc')->take(4)->get() as $Blog_Category)

                                        @if($Blog_Category->Value_Status == 2)
                                            <li style="margin-right: 9px;">
                                                <div class="catgimg_container"> <a class="catg1_img" href=""> <img src="{{ URL::to('/Attachments/'.$Blog_Category->image_name)}}" alt=""> </a></div>
                                                <form action="{{route('show_news' ,[$Blog_Category->id])}}" method="post" style="" class=" ">
                                                    @csrf
                                                    <input type="hidden" value="{{ ++$Blog_Category->views }}" name="views">
                                                    <input type="hidden" value="{{ $Blog_Category->id }}" name="id">
                                                    <div>
                                                    <button class="form_views_text catg_title">{{$Blog_Category->blog_name}}</button>

                                                    </div>
                                                </form>
                                                {{-- <a class="catg_title" href="{{route('show_news' ,[$Blog_Category->id])}}"> {{$Blog_Category->blog_name}}</a> --}}
                                                <div class="sing_commentbox">
                                                    <p><i class="fa fa-calendar"></i>{{$Blog_Category->news_Date}}</p>
                                                    <a href="#"><i class="fa fa-comments"></i>20 Comments</a></div>
                                            </li>
                                        @endif


                                    @endforeach

                                </ul>
                            </div>
                            @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

@endsection
@section('js')

@endsection
