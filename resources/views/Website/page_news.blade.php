@extends('layouts_website.master')

@section('css')
@toastr_css
@section('title')
    {{ trans('website.news_page') }}
@stop
@endsection
@section('page-header')

@endsection
@section('content')

            <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
                <div class="row">
                    <div class="middle_bar">
                        @foreach($Blog as $Blog)
                        {{-- <form action="{{ route('increase_view') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ ++$Blog->views }}" name="views">
                            <input type="hidden" value="{{ $Blog->id }}" name="id">
                            <div>
                            <input type="submit" value="View" >

                            </div>
                        </form> --}}

                        <div class="single_post_area">
                            <ol class="breadcrumb">
                                <li><a href="{{ route('website') }}"><i class="fa fa-home"></i>{{ trans('website.home') }}<i class="fa fa-angle-right"></i></a></li>
                                <li><a href="{{ route('show_category' , [$Blog->news_category_id]) }}">{{ trans('website.category') }}<i class="fa fa-angle-right"></i></a></li>
                                <li class="active">{{$Blog->blog_name}}</li>
                            </ol>
                            <h2 class="post_title wow ">{{$Blog->blog_name}} </h2>
                            <?php $user =  App\User::where('id' , $Blog->user_id)->get();?>
                            @foreach ($user as $user)
                                <a href="#" class="author_name"><i class="fa fa-user"></i>{{$user->name}}</a> <a href="#" class="post_date"><i class="fa fa-clock-o"></i>{{$Blog->news_Date}}</a>

                            @endforeach


                            <div class="single_post_content">
                                <p> {{$Blog->short_note}}</p>
                                <img class="img-center" src="{{ URL::to('/Attachments/'.$Blog->image_name)}}" alt="">
                                <p>{{$Blog->long_notes}}</p>




                                </div>



                        </div>

                        @endforeach

                    </div>
                </div>

                <div class="row">@include('include.comment')</div>
            </div>


@endsection

@section('js')
    @toastr_js
    @toastr_render
@endsection
