@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
    @toastr_css
@section('title')
{{trans('admin/join_reporters.join_reporters')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('admin/join_reporters.join_reporters')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table key-buttons text-md-nowrap">
                    <thead>
                    <tr>
                        <th class="border-bottom-0">#</th>
                        <th class="border-bottom-0">  {{trans('admin/join_reporters.user_name')}}</th>
                        <th class="border-bottom-0">{{trans('admin/join_reporters.email')}} </th>
                        <th class="border-bottom-0">  {{trans('admin/join_reporters.gender')}}</th>
                        <th class="border-bottom-0">{{trans('admin/join_reporters.college')}} </th>
                        <th class="border-bottom-0">{{trans('admin/join_reporters.average')}}</th>
                        <th class="border-bottom-0">{{trans('admin/join_reporters.process')}}</th>




                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0 ;?>
                    @foreach($join_reporters as $join_reporter)
                    <tr>
                        <?php  $i++?>
                        <td>{{$i}}</td>
                        <td>{{ $join_reporter->user->name }}</td>
                        <td>{{ $join_reporter->user->email }}</td>
                        <td>{{ $join_reporter->gender }}</td>
                        <td>{{ $join_reporter->college }}</td>
                        <td>{{ $join_reporter->average }}</td>
                        <td>

                            <button type="button" class="btn btn-info btn-sm"
                            title="{{trans('admin/join_reporters.contact')}}"><a href="{{route('call_reporter',[$join_reporter->id])}}"><i
                            class="fa fa-call"></i> Contact</a></button>

                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#delete{{ $join_reporter->id }}"
                            title="{{ trans('admin/blogs.Delete') }}"><i
                            class="fa fa-trash"></i></button>

                            <a href="{{ URL::route('show_join_request', [$join_reporter->id]) }}">{{trans('admin/join_reporters.details')}}</a>


                        </td>
                    </tr>
<!-- delete_modal_Grade -->
<div class="modal fade" id="delete{{ $join_reporter->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                   id="exampleModalLabel">
                   {{ trans('admin/join_reporters.delete_request') }}
               </h5>
               <button type="button" class="close" data-dismiss="modal"
                       aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <form action="{{route('delete_request' )}}" method="post">
                   {{method_field('Delete')}}
                   @csrf
                   {{ trans('admin/blogs.warning_blog') }}
                   <input id="id" type="hidden" name="id" class="form-control"
                          value="{{ $join_reporter->id }}">
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






                    </tbody>
                </table>
            </div>
        </div>
        {{ $join_reporters->links() }}

        <!-- row closed -->
    </div>
</div>
</div>

        @endsection
        @section('js')
            @toastr_js
            @toastr_render
@endsection
