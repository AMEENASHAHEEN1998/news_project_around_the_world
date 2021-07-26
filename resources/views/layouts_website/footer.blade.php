<footer id="footer">
    <div class="footer_top">
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="single_footer_top wow fadeInLeft">
                <h2>{{ trans("website.follow_by_email") }}</h2>
                <div class="subscribe_area">
                    <p>"Subscribe here to get our newsletter, it is safe just Put your Email and click subscribe"</p>
                    <form action="#">
                        <div class="subscribe_mail">
                            <input class="form-control" type="email" placeholder="Email Address">
                            <i class="fa fa-envelope"></i></div>
                        <input class="submit_btn" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="single_footer_top wow fadeInLeft">
                <h2>{{ trans('website.popular_post') }}</h2>
                <ul class="catg3_snav ppost_nav">
                    @foreach(App\Models\admin\Blog::where('Value_Status' , 2)->get() as $Blog)
                        <li>
                            <div class="media"> <a href="{{route('show_news' ,[$Blog->id])}}" class="media-left"> <img alt="" src="{{ URL::to('/Attachments/'.$Blog->image_name)}}"> </a>
                                <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> {{$Blog->blog_name}}</a></div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="single_footer_top wow fadeInRight">
                <h2>{{ trans('website.category') }}</h2>
                <ul class="footer_labels">
                    @foreach(App\Models\admin\NewsCategory::all() as $NewsCategory )
                        <li><a href="{{route('show_category' ,[$NewsCategory->id])}}">{{$NewsCategory->news_category_name}}</a></li>

                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="single_footer_top wow fadeInRight">
                <h2>{{ trans('website.contact_form') }}</h2>
                <form action="#" class="contact_form">
                    <label>{{ trans('website.name') }}</label>
                    <input class="form-control" type="text">
                    <label>{{ trans('website.email') }}</label>
                    <input class="form-control" type="email">
                    <label>{{trans('website.message')}}</label>
                    <textarea class="form-control" cols="30" rows="10"></textarea>
                    <input class="send_btn" type="submit" value="{{ trans('website.send') }}">
                </form>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="footer_bottom_left">
            <p>{{ trans("website.copyright") }} &copy; 2045</p>
        </div>
        <div class="footer_bottom_right">
            <ul>
                <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Googel+" href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Youtube" href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Rss" href="#"><i class="fa fa-rss"></i></a></li>
            </ul>
        </div>
    </div>
</footer>
