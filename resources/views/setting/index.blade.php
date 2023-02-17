@extends('layouts.main')
@section('content')
{{-- @include('sweetalert::alert') --}}
 <div class="x_panel">
    <div class="x_title">
        <h2>  تعديل   البيانات الاساسية
            {{-- <small> </small> --}}
        </h2>

        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br/>
        <form  method="POST" action="{{route('settings_edit')}}" id="demo-form2" enctype="multipart/form-data" class="form-horizontal form-label-left">
            @csrf
            {{ method_field('put') }}
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >  اسم المكتب
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="office_name"  required="required"
                            class="form-control col-md-7 col-xs-12" value="{{ $setting->office_name }}">
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >   العنوان
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="address"  required="required"
                            class="form-control col-md-7 col-xs-12" value="{{ $setting->address }}">
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >  رقم الترخيص
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="license_number"  required="required"
                            class="form-control col-md-7 col-xs-12" value="{{ $setting->license_number }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-4">
                    <img style="width: 150px; height: 150px; object-fit: cover;"  src="{{asset('uploads/setting/'.$setting->logo)}}" alt="لا يوجد شعار حاليا" srcset="">
                </div>
            </div>

            <div class="form-group" >
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >  الشعار
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input style="padding-top: 5px !important" type="file" name="logo"
                            class="form-control col-md-7 col-xs-12" >
                </div>
            </div>


             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >  رقم الهاتف 1
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" name="phone_1"
                            class="form-control col-md-7 col-xs-12" value="{{ $setting->phone_1 }}">
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >  رقم الهاتف 2
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" name="phone_2"
                            class="form-control col-md-7 col-xs-12" value="{{ $setting->phone_2 }}">
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >  البريد الالكتروني 1
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="email" name="email_1"
                            class="form-control col-md-7 col-xs-12" value="{{ $setting->email_1 }}">
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >  البريد الالكتروني 2
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="email" name="email_2"
                            class="form-control col-md-7 col-xs-12" value="{{ $setting->email_2 }}">
                </div>
            </div>


            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    {{-- <button type="submit" class="btn btn-primary">انصراف</button> --}}
                    <button type="submit"  class="btn btn-success btn-block">تعديل </button>
                </div>
            </div>

        </form>


    </div>
</div>

@endsection
