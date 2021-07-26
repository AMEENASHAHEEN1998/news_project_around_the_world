@extends('layouts_website.master')

@section('css')
@toastr_css
@section('title')
    {{ trans('website.join_the_reporters') }}
@stop
@endsection
@section('page-header')

@endsection
@section('content')
<div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
    <div class="row">
        <div class="middle_bar">


            <form action="{{ route('store_join_the_reporters') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}

                <h3> {{ trans('website.request') }}</h3>
                <br>
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="row">
                    <div class="col-md-6">
                        <label for="full_name" class="control-label">{{trans('website.full_name')}}</label>
                        <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name"
                                title="{{trans('website.full_name')}}"
                                value="{{ auth()->user()->name }}" >
                                @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="control-label">{{trans('website.email')}}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                title="{{trans('website.email')}}"
                                value="{{ auth()->user()->email }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>{{trans('website.gender')}}</label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="gender" value="male"  class="custom-control-input @error('gender') is-invalid @enderror">
                            <label class="custom-control-label " for="customRadioInline1">{{trans('website.male')}}</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="gender" value="femail" class="custom-control-input" >
                            <label class="custom-control-label" for="customRadioInline2">{{trans('website.female')}}</label>
                        </div>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label> {{trans('website.birth_Date')}}</label>
                        <input class="form-control fc-datepicker @error('birth_Date') is-invalid @enderror" name="birth_Date" value="{{ old('birth_Date') }}"  placeholder="YYYY-MM-DD"
                                type="date" value="{{ date('Y-m-d') }}" >
                                @error('birth_Date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                </div>



                {{-- 2 --}}
                <div class="row">
                    <div class="col-md-6">
                        <label for="college">{{trans('website.college')}}</label>
                        <input type="text" class="form-control @error('college') is-invalid @enderror" id="college" name="college" value="{{  old('college') }}"
                        title="{{trans('website.college')}}" >
                        @error('college')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="average">{{trans('website.average')}}</label>
                        <input type="number" class="form-control @error('average') is-invalid @enderror" id="average" name="average" value = "{{ old('average') }}"
                        title="{{trans('website.average')}}" >
                        @error('average')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <label for="reason">{{trans('website.reason')}}</label>
                        <textarea class="form-control @error('reason') is-invalid @enderror" id="reason" name="reason" rows="3">{{ old('reason') }}</textarea>
                        @error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div><br>

                <p class="text-danger"> {{trans('admin/blogs.attachment_format')}}</p>
                <h5 class="card-title">{{trans('admin/blogs.attachments')}}</h5>
                <br>
                <div class="custom-file col-sm-12 col-md-12">
                    <label class="custom-file-label" for="certificate_photo"> {{ trans('website.certificate_photo') }}</label>

                    <input type="file" name="certificate_photo" class="custom-file-input @error('certificate_photo') is-invalid @enderror" accept=".jpg, .png,.jpeg, image/jpeg, image/png"
                            data-height="70" id="certificate_photo"
                            value="{{ old('certificate_photo') }}" />
                            @error('certificate_photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror

                </div><br>
                <div class="custom-file col-sm-12 col-md-12">
                    <label class="custom-file-label" for="photograph">{{ trans('website.photograph') }}</label>

                    <input type="file" name="photograph" class="custom-file-input @error('photograph') is-invalid @enderror" accept=".jpg, .png, .jpeg, image/jpeg, image/png"
                            data-height="70" id="photograph"
                            value="{{ old('photograph') }}" />
                            @error('photograph')
                                <span class="invalid-feedback " role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror

                </div><br><br>


                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">{{trans('admin/blogs.sent')}}</button>
                </div>


            </form>

        </div>
    </div>
</div>

@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
