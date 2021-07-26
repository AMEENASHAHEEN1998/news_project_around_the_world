            <!-- Comment-->
@if (auth()->check())
<div class="middle_bar">
    <form class=" post_title wow" action ="{{ route('store_comment') }}" method="post">
        @csrf
        <a href="#" class="author_name"><i class="fa fa-user"></i>

         {{ Auth::user()->name }}</a>
        <br>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" id="">
        <input type="hidden" name="blog_id" value="{{ $Blog->id }}" id="">
        <div class="col-md-12">
        <input type="text" class="form-control   @error('comment') is-invalid @enderror " name="comment" placeholder="Add comment">
        @error('comment')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
        @enderror
    </div>
        <br><br>
        <input class="btn btn-primary col-md-2" type="submit" value="Comment" />
        <br><br>
    </form>

        @foreach ($comments as $comment )
            <div class=" mt-2">
                <div class="d-flex flex-row align-items-center justify-content-between commented-user">
                    <h4 class="mr-2">{{ $comment->user->name }}</h4>
                </div>
                <div class="comment-text-sm"><span>  {{ $comment->comment }}</span></div>
                
                    <a class="btn btn-info btn-sm " href="" data-toggle="modal"
                    data-target="#edit{{ $comment->id }}"> {{ trans('website.edit') }}</a>

                        <form action="{{ route('delete_comment') }} " class="d-inline" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $comment->id }}" name = "id">
                            <input type="submit" value="{{ trans('website.delete') }}" class="btn btn-danger btn-sm">
                        </form>

                
                {{-- edit comment  --}}
                <div class="modal fade" id="edit{{ $comment->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                   id="exampleModalLabel">
                                   edit comment
                               </h5>
                               <button type="button" class="close" data-dismiss="modal"
                                       aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                               </button>
                           </div>
                           <div class="modal-body">
                               <!-- add_form -->
                               <form action="{{route('edit_comment',[$comment->id])}}" method="post">

                                   @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" id="">
                                    <input type="hidden" name="blog_id" value="{{ $Blog->id }}" id="">
                                    <div class="col-md-12">
                                        <input type="text" value="{{ $comment->comment }}" class="form-control   @error('comment') is-invalid @enderror " name="comment" placeholder="Add comment">
                                        @error('comment')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                   <br><br>

                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary"
                                               data-dismiss="modal">{{ trans('admin/news.Close') }}</button>
                                       <button type="submit"
                                               class="btn btn-success">{{ trans('admin/news.submit') }}</button>
                                   </div>
                               </form>

                           </div>
                       </div>
                   </div>
               </div>


            </div><hr>
        @endforeach




</div>
@else
<div class="middele_bar">
    You must login to show comment <a href="{{ route('login') }}">Login her</a>
</div>
@endif

