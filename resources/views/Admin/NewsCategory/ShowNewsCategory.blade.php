@extends('layouts.master')
@section('css')

@section('title')
{{trans('admin/news.news_type')}} - {{ $NewsCategory->news_category_name }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{trans('admin/news.news_type')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('admin/news.news_type')}}</a></li>
                    <li class="breadcrumb-item active">{{ $NewsCategory->news_category_name }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <p>{{ $NewsCategory->news_category_name }}</p>
                    <p>{{ $NewsCategory->Notes }}</p>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('admin/blogs.blog_name')}}</th>
                                <th>{{trans('admin/blogs.short_note')}}</th>
                                <th>{{trans('admin/blogs.news_date')}}</th>
                                <th>{{trans('admin/blogs.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($Blogs as $Blog)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td><a href="{{ route('show_blog' , [$Blog->id] ) }}">{{ $Blog->blog_name }}</a></td>
                                    <td>{{ $Blog->short_note }}</td>
                                    <td>{{ $Blog->news_Date }}</td>

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

                                    </td>
                                </tr>
                                @can('حذف خبر')
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
                                @endcan


                            @endforeach
                        </table>
                    </div>
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

@endsection
