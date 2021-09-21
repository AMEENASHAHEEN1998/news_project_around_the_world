<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
    <div class="box_wrapper">
        <header id="header">
            <div class="header_top">
                <nav class=" admin-header navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav custom_nav">
                                <li class="nav-item"><a href="{{route('website')}}">{{ trans('website.home_page') }}</a></li>
                                <!-- App\Models\admin\NewsCategory::all() -->
                                @foreach(App\Models\admin\NewsCategory::all() as $NewsCategory )
                                    @if(App\Models\admin\NewsCategory::find($NewsCategory->id)->Blogs()->count() > 0)

                                    <li class="nav-item" ><a  class = "{{ (request()->routeIs('show_category' ,[$NewsCategory->id])) ? 'active' : '' }}"
                                        href="{{route('show_category' ,[$NewsCategory->id])}}">{{$NewsCategory->news_category_name}}</a></li>
                                    @endif
                                @endforeach


                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    @if ($localeCode != App::getLocale())
                                    <li class="nav-item">
                                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                    @endif

                                @endforeach

                                @if(auth()->check() )
                                <li class="nav-item"> <a href="{{ route('join_the_reporters') }}">{{ trans('website.join_the_reporters') }}</a><li>
                                <li class="nav-item"><a  href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                         class="bx bx-log-out"></i>{{trans('admin/user.logout')}}</a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     @csrf
                                 </form></li>
                                 @else
                                 <li class="nav-item">
                                 <a href="{{ route('login') }}">{{ trans('website.login') }}</a>
                                 </li>
                                 @endif
                            </ul>

                        </div>

                    </div>

                </nav>

                <div class="header_search">

                    <button id="searchIcon"><i class="fa fa-search"></i></button>
                    <div id="shide">
                        <div id="search-hide">
                            <form action="#">
                                <input type="text" size="40" placeholder="Search here ...">
                            </form>
                            <button class="remove"><span><i class="fa fa-times"></i></span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_bottom">
                <div class="logo_area"><a class="logo" href="#"><img style="height: 100px;" src="{{URL::asset('assets/website/images/logo.jpg')}}" alt="">{{trans('admin/news.around_theworld')}}<span></span></a></div>
                <div class="top_addarea"><a href="#"><img src="{{URL::asset('assets/website/images/addbanner_728x90_V1.jpg')}}" alt=""></a></div>
            </div>
        </header>
        <div class="latest_newsarea"> <span>{{ trans('website.latest_news') }}</span>
            <ul id="ticker01" class="news_sticker">
                @foreach(App\Models\admin\Blog::where('Value_Status' , 2)->orderBy('id' , 'desc')->get() as $Blog)

                    <li><a href="{{route('show_news_without_increase' ,[$Blog->id])}}">{{$Blog->blog_name}}</a></li>
                @endforeach

            </ul>
        </div>
