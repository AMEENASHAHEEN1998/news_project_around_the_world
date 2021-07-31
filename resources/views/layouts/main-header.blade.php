        <!--=================================
 header start-->
        <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper">
                <h6 class="text-center">{{trans('admin/news.around_theworld')}}</h6>
                <p class="text-center">By Eng Ameena Shaheen</p>
            </div>
            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                        href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                </li>
                {{-- <li class="nav-item">
                    <div class="search">
                        <a class="search-btn not_click" href="javascript:void(0);"></a>
                        <div class="search-box not-click">
                            <input type="text" class="not-click form-control" placeholder="Search" value=""
                                name="search">
                            <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
                        </div>
                    </div>
                </li> --}}
            </ul>
            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">

                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    @if ($localeCode != App::getLocale())
                    <li class="nav-item " style="padding-top: 10px">
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                    @endif

                @endforeach

                <li class="nav-item fullscreen">
                    <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
                </li>

                {{-- <li class="nav-item dropdown ">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="ti-bell"></i>
                        <span class="badge badge-danger notification-status"> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                        <div class="dropdown-header notifications">
                            <strong>Notifications</strong>
                            <span class="badge badge-pill badge-warning">05</span>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">New registered user <small
                                class="float-right text-muted time">Just now</small> </a>
                        <a href="#" class="dropdown-item">New invoice received <small
                                class="float-right text-muted time">22 mins</small> </a>
                        <a href="#" class="dropdown-item">Server error report<small
                                class="float-right text-muted time">7 hrs</small> </a>
                        <a href="#" class="dropdown-item">Database report<small class="float-right text-muted time">1
                                days</small> </a>
                        <a href="#" class="dropdown-item">Order confirmation<small class="float-right text-muted time">2
                                days</small> </a>
                    </div>
                </li> --}}
                <li class="nav-item dropdown ">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="true"> <i class=" ti-view-grid"></i> </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-big">
                        <div class="dropdown-header">
                            <strong>Quick Links</strong>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="nav-grid">
                            <a href="{{route('Blog.create')}}" class="nav-grid-item"><i class="ti-pencil-alt text-warning"></i>
                                <h5>{{trans('admin/blogs.add_new_blog')}}</h5>
                            </a>
                            <a href="{{route('NewsCategory.index')}}" class="nav-grid-item"><i class="ti-check-box text-success"></i>
                                <h5>{{trans('admin/news.add_news_type')}}</h5>
                            </a>
                        </div>
                        <div class="nav-grid">
                            <a href="{{ route('website') }}" class="nav-grid-item"><i class="fa fa-globe" aria-hidden="true"></i>

                                <h5>{{trans('admin/user.site')}}</h5>
                            </a>
                            <a href="{{ route('users.create') }}" class="nav-grid-item"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                <h5>{{trans('admin/user.add_user')}} </h5>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown mr-30">
                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('assets/images/profile-avatar.jpg') }} " alt="avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-0">{{ auth()->user()->name }}</h5>
                                    <span>{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class=" ti-unlock"></i>
                                     {{trans('admin/user.logout')}}</a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>

                   </div>
                </li>
            </ul>
        </nav>

        <!--=================================
 header End-->
