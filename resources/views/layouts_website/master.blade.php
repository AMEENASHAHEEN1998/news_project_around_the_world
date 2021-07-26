<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts_website.head')
</head>

<body>



        @include('layouts_website.main-header')

        @include('layouts_website.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->

            @yield('page-header')
        <section id="contentbody">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                    <div class="row">
                        <div class="left_bar">
                            <div class="single_leftbar">
                                <h2><span>{{ trans('website.latest_news') }}</span></h2>
                                <div class="singleleft_inner">
                                    <ul class="recentpost_nav wow fadeInDown">
                                        @foreach($recent_blogs as $Blog)
                                            <li><a href="{{route('show_news' ,[$Blog->id])}}"><img src="{{ URL::to('/Attachments/'.$Blog->image_name)}}" alt=""></a> <a class="recent_title" href="{{route('show_news' ,[$Blog->id])}}"> {{$Blog->blog_name}}</a></li>

                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="single_leftbar wow fadeInDown">
                                <h2><span>{{ trans('website.ad') }}</span></h2>
                                <div class="singleleft_inner"> <a href="#"><img src="{{URL::asset('assets/website/images/150x600.jpg')}}" alt=""></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            @yield('content')

            <!--=================================
 wrapper -->

            <!--=================================
 footer -->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="row">
                <div class="right_bar">
                    <div class="single_leftbar wow fadeInDown">
                        <h2><span>{{ trans('website.popular_post') }}</span></h2>
                        <div class="singleleft_inner">
                            <ul class="catg3_snav ppost_nav wow fadeInDown">
                                @foreach($popular_blogs as $Blog)
                                    <li>
                                        <div class="media"> <a href="{{route('show_news' ,[$Blog->id])}}" class="media-left"> <img alt="" src="{{ URL::to('/Attachments/'.$Blog->image_name)}}"> </a>
                                            <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> {{$Blog->blog_name}}</a></div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="single_leftbar wow fadeInDown">
                        <h2><span>{{ trans('website.ad') }}</span></h2>
                        <div class="singleleft_inner"> <a href="#"><img alt="" src="{{URL::asset('assets/website/images/262x218.jpg')}}"></a></div>
                    </div>
                    <div class="single_leftbar wow fadeInDown">
                        <ul class="nav nav-tabs custom-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">{{ trans('website.latest_news') }}</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{ trans('website.most_popular') }}</a></li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">{{ trans('website.most_comment') }}</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                <ul class="catg3_snav ppost_nav wow fadeInDown">
                                    
                                @foreach($recent_blogs as $Blog)
                                    <li>
                                        <div class="media"> <a class="media-left" href="{{route('show_news' ,[$Blog->id])}}"> <img src="{{ URL::to('/Attachments/'.$Blog->image_name)}}" alt=""> </a>
                                            <div class="media-body"> <a class="catg_title" href="{{route('show_news' ,[$Blog->id])}}"> {{$Blog->blog_name}}</a></div>
                                        </div>
                                    </li>
                                @endforeach
                                    
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                <ul class="catg3_snav ppost_nav wow fadeInDown">
                                    
                                @foreach($popular_blogs as $Blog)
                                    <li>
                                        <div class="media"> <a class="media-left" href="{{route('show_news' ,[$Blog->id])}}"> <img src="{{ URL::to('/Attachments/'.$Blog->image_name)}}" alt=""> </a>
                                            <div class="media-body"> <a class="catg_title" href="#"> {{$Blog->blog_name}}</a></div>
                                        </div>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="messages">
                                <ul class="catg3_snav ppost_nav wow fadeInDown">
                                    <li>
                                        <div class="media"> <a class="media-left" href="#"> <img src="images/70x70.jpg" alt=""> </a>
                                            <div class="media-body"> <a class="catg_title" href="#"> Aliquam malesuada diam eget turpis varius</a></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media"> <a class="media-left" href="#"> <img src="images/70x70.jpg" alt=""> </a>
                                            <div class="media-body"> <a class="catg_title" href="#"> Aliquam malesuada diam eget turpis varius</a></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media"> <a class="media-left" href="#"> <img src="images/70x70.jpg" alt=""> </a>
                                            <div class="media-body"> <a class="catg_title" href="#"> Aliquam malesuada diam eget turpis varius</a></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media"> <a class="media-left" href="#"> <img src="images/70x70.jpg" alt=""> </a>
                                            <div class="media-body"> <a class="catg_title" href="#"> Aliquam malesuada diam eget turpis varius</a></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media"> <a class="media-left" href="#"> <img src="images/70x70.jpg" alt=""> </a>
                                            <div class="media-body"> <a class="catg_title" href="#"> Aliquam malesuada diam eget turpis varius</a></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media"> <a class="media-left" href="#"> <img src="images/70x70.jpg" alt=""> </a>
                                            <div class="media-body"> <a class="catg_title" href="#"> Aliquam malesuada diam eget turpis varius</a></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media"> <a class="media-left" href="#"> <img src="images/70x70.jpg" alt=""> </a>
                                            <div class="media-body"> <a class="catg_title" href="#"> Aliquam malesuada diam eget turpis varius</a></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="single_leftbar wow fadeInDown">
                        <h2><span>{{ trans('website.category') }}</span></h2>
                        <div class="singleleft_inner">
                            <ul class="label_nav">

                                @foreach( App\Models\admin\NewsCategory::all() as $NewsCategory )
                                    <li><a href="{{route('show_category' ,[$NewsCategory->id])}}">{{$NewsCategory->news_category_name}}</a></li>

                                @endforeach

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
        </section>

            @include('layouts_website.footer')


    @include('layouts_website.footer-scripts')

</body>

</html>
