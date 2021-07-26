@extends('layouts_website.master')

@section('css')

@section('title')
    {{ trans('website.category_page') }}
@stop
@endsection
@section('page-header')

@endsection
@section('content')

            <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
                <div class="row">
                    <div class="middle_bar">
                        @foreach($Blogs as $Blog)
                        <div class="category_archive_area">
                            <div class="single_archive wow fadeInDown"> <a href="single_page.html"><img src="{{ URL::to('/Attachments/'.$Blog->image_name)}}" alt=""></a> 
                                
                                <form action="{{route('show_news' ,[$Blog->id])}}" method="post" style="" class="read_more ">
                                    @csrf
                                    <input type="hidden" value="{{ ++$Blog->views }}" name="views">
                                    <input type="hidden" value="{{ $Blog->id }}" name="id">
                                    <div>
                                    <button class="form_views">{{ trans('website.read_more') }} <i class="fa fa-angle-double-right"></i> </button>
            
                                    </div>
                                </form>
                                {{-- <a href="" class="read_more">{{ trans('website.read_more') }} <i class="fa fa-angle-double-right"></i></a> --}}
                                <div class="singlearcive_article">
                                    <form action="{{route('show_news' ,[$Blog->id])}}" method="post" style="" class="">
                                        @csrf
                                        <input type="hidden" value="{{ ++$Blog->views }}" name="views">
                                        <input type="hidden" value="{{ $Blog->id }}" name="id">
                                        <div>
                                        <button class="form_views">{{$Blog->blog_name}}</button>
                
                                        </div>
                                    </form>
                                    {{-- <h2><a href="">{{$Blog->blog_name}}</a></h2> --}}
                                    <?php $user =  App\User::where('id' , $Blog->user_id)->get();?>
                            @foreach ($user as $user)
                                <a href="#" class="author_name"><i class="fa fa-user"></i>{{$user->name}}</a> <a href="#" class="post_date"><i class="fa fa-clock-o"></i>{{$Blog->news_Date}}</a>

                            @endforeach

                                    <p>{{$Blog->short_note}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

@endsection
@section('js')

@endsection
