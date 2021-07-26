@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('admin/news.news_type')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('admin/news.news_type_all')}}
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
                    @can('اضافة صنف جديد')
                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{trans('admin/news.add_news_type')}}
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
                                <th>{{trans('admin/news.news_category_name')}}</th>
                                <th>{{trans('admin/news.Notes')}}</th>
                                <th>{{trans('admin/news.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($NewsCategorys as $NewsCategory)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $NewsCategory->news_category_name }}</td>
                                    <td>{{ $NewsCategory->Notes }}</td>
                                    <td>
                                        @can('تعديل صنف')
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $NewsCategory->id }}"
                                        title="{{ trans('admin/news.Edit') }}"><i
                                        class="fa fa-edit"></i></button>
                                        @endcan
                                        @can('حذف صنف')
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $NewsCategory->id }}"
                                        title="{{ trans('admin/news.Delete') }}"><i
                                        class="fa fa-trash"></i></button>
                                        @endcan



                                    </td>
                                </tr>

                                @can('تعديل صنف')
                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $NewsCategory->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog" role="document">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                   id="exampleModalLabel">
                                                   {{ trans('admin/news.edit_category_news') }}
                                               </h5>
                                               <button type="button" class="close" data-dismiss="modal"
                                                       aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                               </button>
                                           </div>
                                           <div class="modal-body">
                                               <!-- add_form -->
                                               <form action="{{route('NewsCategory.update','test')}}" method="post">
                                                   {{method_field('patch')}}
                                                   @csrf
                                                   <div class="row">
                                                       <div class="col">
                                                           <label for="Name"
                                                                  class="mr-sm-2">{{ trans('admin/news.news_category_name_ar') }}
                                                               :</label>
                                                           <input id="Name" type="text" name="Name"
                                                                  class="form-control"
                                                                  value="{{$NewsCategory->getTranslation('news_category_name', 'ar')}}"
                                                                  required>
                                                           <input id="id" type="hidden" name="id" class="form-control"
                                                                  value="{{ $NewsCategory->id }}">
                                                       </div>
                                                       <div class="col">
                                                           <label for="Name_en"
                                                                  class="mr-sm-2">{{ trans('admin/news.news_category_name_en') }}
                                                               :</label>
                                                           <input type="text" class="form-control"
                                                                  value="{{$NewsCategory->getTranslation('news_category_name', 'en')}}"
                                                                  name="Name_en" required>
                                                       </div>
                                                   </div>
                                                   <div class="form-group">
                                                       <label
                                                           for="exampleFormControlTextarea1">{{ trans('admin/news.Notes') }}
                                                           :</label>
                                                       <textarea class="form-control" name="Notes"
                                                                 id="exampleFormControlTextarea1"
                                                                 rows="3">{{ $NewsCategory->Notes }}</textarea>
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
                                @endcan

                                @can('حذف صنف')
                                    <!-- delete_modal_Grade -->
                                    <div class="modal fade" id="delete{{ $NewsCategory->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('admin/news.delete_category_news') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('NewsCategory.destroy','test')}}" method="post">
                                                    {{method_field('Delete')}}
                                                    @csrf
                                                    {{ trans('admin/news.warning_category_news') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $NewsCategory->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('admin/news.Close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{ trans('admin/news.Delete') }}</button>
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


        <!-- add_modal_Grade -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            {{ trans('admin/news.add_news_type') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('NewsCategory.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="Name"
                                           class="mr-sm-2">{{ trans('admin/news.news_category_name_ar') }}
                                        :</label>
                                    <input id="Name" type="text" name="Name" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="Name_en"
                                           class="mr-sm-2">{{ trans('admin/news.news_category_name_en') }}
                                        :</label>
                                    <input type="text" class="form-control" name="Name_en" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label
                                    for="exampleFormControlTextarea1">{{ trans('admin/news.Notes') }}
                                    :</label>
                                <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                          rows="3"></textarea>
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

    <!-- row closed -->

    </div>
</div>
</div>
@endsection
@section('js')
            @toastr_js
            @toastr_render
@endsection
