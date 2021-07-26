<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('admin/news.dashboard')}}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>

                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('admin/news.around_theworld')}} </li>
                    <!-- menu item Elements-->
                    @can('كل الاخبار')

                    <li>

                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{trans('admin/news.total_news')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            @can('كل الاخبار')
                            <li><a href="{{route('Blog.index')}}">{{trans('admin/news.total_news_list')}}</a></li>

                            @endcan
                            @can('الأخبار المنشورة')
                            <li><a href="{{ url('/' . $page='published_news') }}">{{trans('admin/blogs.published_news')}}</a></li>

                            @endcan
                            @can('الموافقة على الأخبار ')
                            <li><a href="{{ url('/' . $page='approval_of_the_news') }}">{{trans('admin/blogs.approval_of_the_news')}}</a></li>

                            @endcan
                            @can('الأخبار المرفوضة')
                            <li><a href="{{ url('/' . $page='unacceptable_news') }}">{{trans('admin/blogs.unacceptable_news')}}</a></li>

                            @endcan

                        </ul>
                    </li>
                    @endcan

                    @can('أصناف الأخبار')
                        <!-- menu title -->
                        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('admin/news.news_type')}} </li>
                        <!-- menu item calendar-->
                        <li>
                            @can('كافة أصناف الأخبار')
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                                <div class="pull-left"><i class="ti-calendar"></i><span
                                        class="right-nav-text">{{trans('admin/news.news_type')}}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @endcan

                            @can('كل صنف من الأخبار')
                            <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{route('NewsCategory.index')}}">{{trans('admin/news.news_type_all')}} </a> </li>
                                @foreach($NewsCategorys as $NewsCategory)
                                    <li> <a href="{{ url('NewsCategory') }}/{{ $NewsCategory->id }})}}">{{ $NewsCategory->news_category_name }} </a> </li>
                                @endforeach
                            </ul>
                            @endcan

                        </li>
                    @endcan

                    @can('أصناف الأخبار')
                        <!-- menu title -->
                        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('admin/join_reporters.join_reporters')}} </li>
                        <!-- menu item calendar-->
                        <li>
                            @can('كافة أصناف الأخبار')
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#join_reporters">
                                <div class="pull-left"><i class="ti-calendar"></i><span
                                        class="right-nav-text">{{trans('admin/join_reporters.join_reporters')}}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @endcan

                        </li>

                        @can('كل صنف من الأخبار')
                            <ul id="join_reporters" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{route('show_all_request')}}">{{trans('admin/join_reporters.join_reporters_request')}} </a> </li>

                            </ul>
                            @endcan
                    @endcan

                    @can('المستخدمين')

                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('admin/user.users')}} </li>


                    <li>
                        @can('المستخدمين')
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elementsuser">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{trans('admin/user.users')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        @endcan

                        <ul id="elementsuser" class="collapse" data-parent="#sidebarnav">
                            @can('قائمة المستخدمين')
                            <li><a  href="{{ url('/' . $page='users') }}">{{trans('admin/user.users_list')}}</a></li>

                            @endcan
                            @can('صلاحية المستخدمين')
                            <li><a  href="{{ url('/' . $page='roles') }}">{{trans('admin/user.roles_user')}} </a></li>

                            @endcan

                        </ul>
                    </li>
                    @endcan
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('admin/user.site')}} </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#site">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{trans('admin/user.site')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="site" class="collapse" data-parent="#sidebarnav">
                            <li><a  href="{{ route('website') }}">{{trans('admin/user.site_link')}}</a></li>

                        </ul>
                    </li>
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('admin/user.logout')}} </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#logout">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{trans('admin/user.logout')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="logout" class="collapse" data-parent="#sidebarnav">
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                     class="bx bx-log-out"></i>{{trans('admin/user.logout')}}</a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form></li>


                        </ul>
                    </li>



                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
