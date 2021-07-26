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

        <div class="card-body">

            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                {{ csrf_field() }}
                {{-- 1 --}}

        <h3> {{ trans('website.request') }}</h3>
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
                <label>{{trans('website.gender')}}</label><br>
                @if ($join_reporter->gender == 'male')
                <div class="custom-control custom-radio custom-control-inline">

                    <input type="radio" id="customRadioInline1" name="gender" value="male"  class="custom-control-input check" readonly>
                    <label class="custom-control-label  " for="customRadioInline1">{{trans('website.male')}} </label>


                </div>
                @else
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="gender" value="femail" class="custom-control-input check" readonly>
                    <label class="custom-control-label" for="customRadioInline2">{{trans('website.female')}}</label>
                </div>
                @endif
            </div>
            <div class="col-md-6">
                <label> {{trans('website.birth_Date')}}</label>
                <input class="form-control fc-datepicker " name="birth_Date"   placeholder="YYYY-MM-DD"
                        type="text" value="{{ $join_reporter->birth_Date }}" readonly >

            </div>

        </div>



        {{-- 2 --}}
        <div class="row">
            <div class="col-md-6">
                <label for="college">{{trans('website.college')}}</label>
                <input type="text" class="form-control r" id="college" name="college" value="{{  $join_reporter->college}}"
                        title="{{trans('website.college')}}" readonly >

            </div>

            <div class="col-md-6">
                <label for="average">{{trans('website.average')}}</label>
                <input type="number" class="form-control " id="average" name="average" value="{{ $join_reporter->average }}"
                title="{{trans('website.average')}}" readonly>

            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <label for="reason">{{trans('website.reason')}}</label>
                <textarea class="form-control " id="reason" name="reason" rows="3" readonly>{{ $join_reporter->reason }}</textarea>

            </div>
        </div><br>

        <p class="text-danger"> {{trans('admin/blogs.attachment_format')}}</p>
        <h5 class="card-title">{{trans('admin/blogs.attachments')}}</h5>
        <br>
        <div class="col-sm-12 col-md-6">
            <h4 class="" for="certificate_photo"> {{ trans('website.certificate_photo') }}</h4>

            <img style="height: 350px ; width:300px" src="{{ asset('uploads/'.$join_reporter->certificate_photo) }}">


        </div><br>
        <div class="col-sm-12 col-md-6">
            <h4 class="" for="photograph">{{ trans('website.photograph') }}</h4>

            <img style="height: 350px ; width:300px" src="{{ asset('uploads/'.$join_reporter->photograph) }}">



        </div><br><br>


        {{-- <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">{{trans('admin/join_reporters.call')}}</button>
        </div> --}}


    </form>
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
