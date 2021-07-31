<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
</head>

<body>

<div class="wrapper">

    <!--=================================
preloader -->

    <div id="pre-loader">
        <img src="assets/images/pre-loader/loader-01.svg" alt="">
    </div>

    <!--=================================
preloader -->

@include('layouts.main-header')

@include('layouts.main-sidebar')

<!--=================================
 Main content -->
    <!-- main-content -->
    <div class="content-wrapper">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> {{trans('admin/news.dashboard')}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
        <!-- widgets -->
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">{{trans('admin/blogs.published_news')}}</p>
                                <h4>{{ count_publish_blogs()}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top ">
                        {{trans('admin/news.total_news')}} <h5 class='d-inline'>{{count_blogs()}}</h5>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">{{trans('admin/blogs.approval_of_the_news')}}</p>
                                <h4>{{count_accept_blogs()}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-success">
                                        <i class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">{{trans('admin/join_reporters.join_reporters')}}</p>
                                <h4>{{count_join_reporter()}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fa fa-twitter highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">{{trans('admin/user.users')}}</p>
                                <h4>{{count_user()}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        {{trans('admin/user.admin')}} <h5 class='d-inline'>{{count_admin()}}</h5>

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Orders Status widgets-->
        <div class="row">
            <div class="col-xl-4 mb-30">
                <div class="card card-statistics h-100">
                    <!-- action group -->
                    <div class="btn-group info-drop">
                        <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><i class="text-primary ti-reload"></i>Refresh</a>
                            <a class="dropdown-item" href="#"><i class="text-secondary ti-eye"></i>View
                                all</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ trans('admin/blogs.blogs') }}</h5>
                        <h4>{{count_blogs()}} </h4>
                        <div class="row mt-20">
                            <div class="col-4">
                                <h6>{{ trans('admin/Blogs.published_news') }}</h6>
                                <b class="text-info">{{ average_publish_news() }} </b>
                            </div>
                            <div class="col-4">
                                <h6>{{ trans('admin/Blogs.approval_of_the_news') }}</h6>
                                <b class="text-warning"> {{ average_approval_news() }}</b>
                            </div>
                            <div class="col-4">
                                <h6>{{ trans('admin/Blogs.unacceptable_news') }}</h6>
                                <b class="text-danger">{{ average_unpublish_news() }} </b>
                            </div>
                        </div>
                    </div>
                    <div id="sparkline2" class="scrollbar-x text-center"></div>
                </div>
            </div>
            <div class="col-xl-8 mb-30">
                <div class="card h-100">
                    <div class="btn-group info-drop">
                        <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><i class="text-primary ti-reload"></i>Refresh</a>
                            <a class="dropdown-item" href="#"><i class="text-secondary ti-eye"></i>View
                                all</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-block d-md-flexx justify-content-between">
                            <div class="d-block">
                                <h5 class="card-title">{{ trans('admin/blogs.blogs') }} </h5>
                            </div>
                            <div class="d-flex">
                                <div class="clearfix mr-30">
                                    <h6 class="text-success">{{ trans('admin/blogs.published_news') }}</h6>
                                    <p>{{ count_publish_blogs()}}</p>
                                </div>
                                <div class="clearfix  mr-50">
                                    <h6 class="text-danger"> {{ trans('admin/blogs.approval_of_the_news') }}</h6>
                                    <p>{{count_accept_blogs()}}</p>
                                </div>
                            </div>
                        </div>
                        <div id="morris-area" style="height: 320px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xl-12 mb-120">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{trans('admin/news.news_type')}}</h5>
                        <ul class="list-unstyled">
                            @foreach ($NewsCategorys as $NewsCategory )
                            <li class="mb-20">
                                <div class="media">
                                    <div class="position-relative">
                                        <img class="img-fluid mr-15 avatar-small" src="images/item/01.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-0">{{ $NewsCategory->news_category_name }} <span class="float-right text-danger">
                                                    {{ $NewsCategory->Blogs->count() }}</span> </h6>
                                        <p>{{ $NewsCategory->Notes }} </p>
                                    </div>
                                </div>
                                <div class="divider dotted mt-20"></div>
                            </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
            </div>


        </div>


        <!--=================================
wrapper -->

        <!--=================================
footer -->

        @include('layouts.footer')
    </div><!-- main content wrapper end-->
</div>
</div>
</div>

<!--=================================
footer -->

@include('layouts.footer-scripts')

</body>

</html>
