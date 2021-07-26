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
{{trans('admin/join_reporters.join_reporter')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('admin/join_reporters.join_reporter')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">


<form action="{{route('send_email_reporter')}}" method="post"  autocomplete="off">
                {{ csrf_field() }}
                {{-- 1 --}}
        <h3> {{trans('admin/join_reporters.send_mail') }}{{ $join_reporter->User->name}}  </h3>

        
        <br>
        <input type="hidden" name="user_id" value="{{ $join_reporter->user->id }}">
        <div class="row">
            <div class="col-md-6">
                <label for="full_name" class="control-label">{{trans('website.full_name')}}</label>
                <input type="text" class="form-control " id="full_name" name="full_name"
                        title="{{trans('website.full_name')}}"
                        value="{{ $join_reporter->user->name }}" readonly>

            </div>
            <div class="col-md-6">
                <label for="email" class="control-label">{{trans('website.email')}}</label>
                <input type="email" class="form-control " id="email" name="email"
                        title="{{trans('website.email')}}"
                        value="{{ $join_reporter->user->email }}" readonly>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="date" class="control-label">{{trans('admin/join_reporters.date')}}</label>
                <input type="date" class="form-control " id="date" name="date"
                        title="{{trans('admin/join_reporters.date')}}" required>

            </div>
            <div class="col-md-6">
                <label for="time" class="control-label">{{trans('admin/join_reporters.time')}}</label>
                <input type="text" class="form-control " id="time" name="time"
                        title="{{trans('admin/join_reporters.time')}}" required>

            </div>
        </div>
        



        


        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">{{trans('admin/join_reporters.send_email')}}</button>
        </div>


    </form>

        <!-- row closed -->
    </div>
</div>
</div>

        @endsection
        @section('js')
            @toastr_js
            @toastr_render
@endsection
