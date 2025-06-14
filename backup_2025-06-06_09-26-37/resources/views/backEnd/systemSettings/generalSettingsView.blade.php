@extends('backEnd.master')
@section('title')
@lang('system_settings.general_settings')
@endsection
@section('mainContent')
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('system_settings.general_settings')</h1>
            <div class="bc-pages">
                <a href="{{route('dashboard')}}">@lang('common.dashboard')</a>
                <a href="#">@lang('system_settings.system_settings')</a>
                <a href="#">@lang('system_settings.general_settings')</a>
            </div>
        </div>
    </div>
</section>
<section class="student-details">
    <div class="container-fluid p-0">
        @include('backEnd.partials.alertMessage')
        <div class="row row-gap-24">
            <div class="col-lg-4 col-md-12 col-xl-4">
                <div class="row row-gap-24">
                    <div class="col-sm-6 col-lg-12">
                        @if(Illuminate\Support\Facades\Config::get('app.app_sync'))
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'admin-dashboard', 'method' => 'GET', 'enctype' => 'multipart/form-data']) }}
                        @else
                            @if(userPermission('update-school-logo'))
                                {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'update-school-logo', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                            @endif
                        @endif
                      

                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15">@lang('system_settings.change_logo')</h3>
                            </div>
                            <input type="hidden" name="url" id="url" value="{{URL::to('/')}}">
                            <div class="text-center">
                                
                            @if(isset($editData->logo))
                                                      
                                <img id="upload_logo_preview" class="img-fluid Img-100" src="{{asset($editData->logo)}}" alt="" >
                            @else
                                <img id="upload_logo_preview" class="img-fluid" src="{{asset('public/uploads/settings/logo.png')}}" alt="">
                            @endif
                            </div>

                            <div class="mt-40">
                                <div class="text-center">
                                    <label class="primary-btn small fix-gr-bg" for="upload_logo">@lang('system_settings.upload')</label>
                                    <input type="file" class="d-none form-control" name="main_school_logo" id="upload_logo">
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                    
                                @if(Illuminate\Support\Facades\Config::get('app.app_sync'))
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo "> <button class="primary-btn small fix-gr-bg  demo_view" style="pointer-events: none;" type="button" >@lang('system_settings.change_logo')</button></span>
                                @else
                                    @if(userPermission('update-school-logo'))
                                    <button class="primary-btn fix-gr-bg small  "    >
                                        <span class="ti-check"></span>
                                        @lang('common.save') 
                                    </button>
                                    @endif 
                                @endif 
                             
                                @if ($errors->has('main_school_logo'))
                                    <span class="text-danger d-block" >
                                        {{ $errors->first('main_school_logo') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <div class="col-sm-6 col-lg-12">

                        @if(Illuminate\Support\Facades\Config::get('app.app_sync'))
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'admin-dashboard', 'method' => 'GET', 'enctype' => 'multipart/form-data']) }}
                        @else
                        @if(userPermission('update-school-logo'))
                            {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'update-school-logo', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}

                            @endif
                        @endif
                       
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15">@lang('system_settings.change_fav') </h3>
                            </div>
                            <input type="hidden" name="url" id="url" value="{{URL::to('/')}}">
                            <div class="text-center">
                            @if(isset($editData->favicon) && !empty(@$editData->favicon))                            
                                <img  id="upload_favicon_preview" class="img-fluid Img-50" src="{{@$editData->favicon}}" alt="" >
                            @else
                                <img  id="upload_favicon_preview" class="img-fluid" src="{{asset('public/uploads/settings/favicon.png')}}" alt="">
                            @endif
                            </div>

                            <div class="mt-40">
                                <div class="text-center">
                                    <label class="primary-btn small fix-gr-bg" for="upload_favicon">@lang('system_settings.upload')</label>
                                    <input type="file" class="d-none form-control" name="main_school_favicon" id="upload_favicon">
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                @if(Illuminate\Support\Facades\Config::get('app.app_sync'))
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo "> <button class="primary-btn small fix-gr-bg  demo_view" style="pointer-events: none;" type="button" >@lang('system_settings.change_fav')</button></span>
                                @else
                                @if(userPermission("update-school-favicon"))
                                    <button class="primary-btn fix-gr-bg small white_space">
                                            <span class="ti-check"></span>
                                        @lang('common.save')
                                    </button>
                                    @endif  
                                @endif  
                                @if ($errors->has('main_school_favicon'))
                                    <span class="text-danger d-block" >
                                        {{ $errors->first('main_school_favicon') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>


                <!-- <div class="row mt-40">
                    
                </div> -->

                
            </div>

            <div class="col-lg-8 col-xl-8">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <div class="row xm_3">
                                <div class="col-lg-7 col-xl-7 no-apadmin col-sm-6">
                                    <div class="main-title">
                                        <h3 class="mb-15">@lang('system_settings.general_settings_view')</h3>
                                    </div>
                                </div>
                                <div class=" col-lg-5 col-xl-5 text-right col-md-6 col-sm-6 sm2_10">
                                    @if(userPermission('update-general-settings'))
                                        <a href="{{route('update-general-settings')}}" class="primary-btn small fix-gr-bg "> <span class="ti-pencil-alt"></span> @lang('common.edit')
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <div class="student-meta-box">
                                
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('common.school_name')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->school_name}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('system_settings.site_title')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->site_title}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('common.address')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->address}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('common.phone_no')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->phone}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('common.email_address')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->email}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('system_settings.fees_income_head')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->incomeHead->head}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('system_settings.school_code')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->school_code}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('common.academic_year')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">

                                               @if(moduleStatusCheck('University'))
                                                    {{@$editData->unAcademic->name }}   [ {{@dateConvert($editData->unAcademic->start_date) }} - {{@dateConvert($editData->unAcademic->end_date) }}   ]
                                                @else
                                                    {{@$editData->academic_Year->year }} -
                                                    [ {{@$editData->academic_Year->title }}  ]

                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('system_settings.language')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">

                                                @if(isset($editData))

                                                {{@$editData->languages != ""? @$editData->languages->language_name:""}}

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('system_settings.date_format')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->dateFormats != ""? @$editData->dateFormats->normal_view:""}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('system_settings.week_start_day')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->week_start_id != ""? @$editData->weekStartDay->name:""}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('system_settings.time_zone')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->timeZone->time_zone}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('system_settings.currency')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->currency}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('system_settings.currency_symbol')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->currency_symbol}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('system_settings.max_upload_file_size')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->file_size}} MB
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('student.multiple_roll_number')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                    @if (@$editData->multiple_roll != "" && @$editData->multiple_roll == 1)
                                                        {{ __('common.enable') }}
                                                    @else

                                                        {{ __('common.disable') }}
                                                    @endif
                                                {{-- {{@$editData->promotionSetting != ""? @$editData->promotionSetting == 1:""}} --}}
                                                {{-- {{$editData->promotionSetting}} --}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('system_settings.promotion_without_exam')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                    @if (!@$editData->promotionSetting)
                                                    {{ __('common.enable') }}
                                                    @else
                                                    {{ __('common.disable') }}
                                                    @endif
                                                {{-- {{@$editData->promotionSetting != ""? @$editData->promotionSetting == 1:""}} --}}
                                                {{-- {{$editData->promotionSetting}} --}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('system_settings.subject_attendance_layout')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                    @if (@$editData->attendance_layout != "" && @$editData->attendance_layout == 1)
                                                        <img src="{{asset('public/backEnd/img/first_layout.png')}}" width="200px" height="auto" class="layout_image" for="first_layout" alt="">
                                                    @else
                                                        <img src="{{asset('public/backEnd/img/second_layout.png')}}" width="200px" height="auto" class="layout_image" for="second_layout" alt="">
                                                    @endif
                                                {{-- {{@$editData->promotionSetting != ""? @$editData->promotionSetting == 1:""}} --}}
                                                {{-- {{$editData->promotionSetting}} --}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(moduleStatusCheck('Fees') && !moduleStatusCheck('University'))
                                    <div class="single-meta">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="name">
                                                    @lang('fees::feesModule.new_fees_module')
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="value text-left">
                                                    @if (@$editData->fees_status == 1)
                                                        @lang('fees::feesModule.enable')
                                                    @else
                                                        @lang('fees::feesModule.disable')
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('system_settings.result_type')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if (@$editData->result_type == 'gpa')
                                                    @lang('system_settings.gpa')
                                                @else
                                                    @lang('system_settings.100_%_mark')
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if(moduleStatusCheck('Lms'))

                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('lms::lms.lms_checkout_option')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if (@$editData->lms_checkout == 1)
                                                    @lang('common.enable')
                                                @else
                                                    @lang('common.disable')
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('system_settings.student_admission')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if (@$editData->with_guardian == 1)
                                                @lang('system_settings.with_guardian')
                                                @else
                                                @lang('system_settings.without_guardian')
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('system_settings.due_fees_login_restrictation')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if (@$editData->due_fees_login)
                                                @lang('system_settings.enable')
                                                @else
                                                @lang('common.disable')
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('common.in_news_auto_approval_comment')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if (@$editData->auto_approve == 1)
                                                    @lang('system_settings.enable')
                                                @else
                                                    @lang('common.disable')
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('common.in_news_can_comment')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if (@$editData->is_comment == 1)
                                                @lang('system_settings.enable')
                                                @else
                                                @lang('common.disable')
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('common.Blog Search')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if (@$editData->blog_search == 1)
                                                @lang('system_settings.enable')
                                                @else
                                                @lang('common.disable')
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('common.Recent Blog')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if (@$editData->recent_blog == 1)
                                                    @lang('system_settings.enable')
                                                @else
                                                    @lang('common.disable')
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('common.role_based_sidebar')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if (@$editData->role_based_sidebar == 1)
                                                    @lang('system_settings.enable')
                                                @else
                                                    @lang('common.disable')
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('common.Queue Connection')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if (env('QUEUE_CONNECTION') == 'database')
                                                    @lang('common.Database')
                                                @else
                                                    @lang('common.SYNC')
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('system_settings.copyright_text') 
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(! is_null($editData->copyright_text))
                                                {!! @$editData->copyright_text !!}

                                                @else

                                                Copyright 2019 All rights reserved by infinia 
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade admin-query question_image_preview"  >
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">@lang('system_settings.layout_image')</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <img src="" width="100%" class="question_image_url" alt="">
            </div>

        </div>
    </div>
</div>
<script>
    
    $(document).on('click', '.layout_image', function(){
        $('.question_image_url').attr('src',this.src);   
        $('.question_image_preview').modal('show');
    })
    $(document).on('change', '#upload_logo', function(event) {
        imageChangeWithFile($(this)[0], '#upload_logo_preview');
    });
    $(document).on('change', '#upload_favicon', function(event) {
        imageChangeWithFile($(this)[0], '#upload_favicon_preview');
    });
</script>
@endsection
