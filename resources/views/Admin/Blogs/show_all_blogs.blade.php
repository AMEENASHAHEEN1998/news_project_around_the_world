@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('admin/blogs.blogs')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('admin/blogs.around_theworld')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @can('اضافة خبر جديد')
                    <button type="button" class="button x-small" >
                        <a href="{{route('Blog.create')}}">{{trans('admin/blogs.add_new_blog')}}</a>

                    </button>
                    @endcan

                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('admin/blogs.blog_name')}}</th>
                                <th>{{trans('admin/blogs.blog_author')}}</th>
                                <th>{{trans('admin/blogs.blog_category')}}</th>
                                <th>{{trans('admin/blogs.short_note')}}</th>
                                <th>{{trans('admin/blogs.news_date')}}</th>
                                <th>{{trans('admin/blogs.status_blog')}}</th>
                                <th>{{trans('admin/blogs.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($Blogs as $Blog)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td> <a href="{{ route('show_blog' , [$Blog->id] ) }}">{{ $Blog->blog_name }} </a></td>
                                    <?php $user =  App\User::where('id' , $Blog->user_id)->get();?>
                                    @foreach ($user as $user)
                                        <td> {{$user->name}} </td>
                                    @endforeach

                                    <td>{{ $Blog->NewsCategory->news_category_name }}</td>
                                    <td>{{ $Blog->short_note }}</td>
                                    <td>{{ $Blog->news_Date }}</td>

                                        <td>
                                            @if ($Blog->Value_Status == 2)
                                                <span class="text-success">{{ $Blog->Status  }}</span>
                                            @elseif($Blog->Value_Status == 3)
                                                <span class="text-danger">{{ $Blog->Status  }}</span>
                                            @else
                                                <span class="text-warning">{{ $Blog->Status  }}</span>
                                            @endif

                                        </td>
                                    <td>
                                        @can('تعديل خبر')
                                        <button type="button" class="btn btn-info btn-sm"
                                        title="{{ trans('admin/blogs.Edit') }}"><a href="{{route('Blog.edit', [$Blog->id ])}}"><i
                                        class="fa fa-edit"></i></a></button>
                                        @endcan
                                        @can('حذف خبر')
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $Blog->id }}"
                                        title="{{ trans('admin/blogs.Delete') }}"><i
                                        class="fa fa-trash"></i></button>
                                        @endcan
                                        @can('عرض خبر')
                                        <a href="{{ URL::route('Status_show', [$Blog->id]) }}">&nbsp;تغير حالة الخبر</a>

                                        @endcan
                                    </td>
                                </tr>

                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $Blog->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('admin/blogs.delete_blog') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Blog.destroy','test')}}" method="post">
                                                    {{method_field('Delete')}}
                                                    @csrf
                                                    {{ trans('admin/blogs.warning_blog') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $Blog->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('admin/blogs.Close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{ trans('admin/blogs.Delete') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- row closed -->
    </div>
</div>
</div>

        @endsection
        @section('js')
            @toastr_js
            @toastr_render
@endsection
