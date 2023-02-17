@extends('layouts.main')
@section('content')

 <div class="x_panel">
    <div class="x_title">
        <h2>إضافة مستخدم جديد
            {{-- <small> </small> --}}
        </h2>

        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br/>
        <form  method="POST" action="{{route('users.store')}}" id="demo-form2"  class="form-horizontal form-label-left">
            @csrf
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">الاسم بالكامل
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="name" id="first-name" required="required"
                            class="form-control col-md-7 col-xs-12" value="{{ old('name') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">اسم المستخدم
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="email" id="last-name"  required="required"
                            class="form-control col-md-7 col-xs-12" value="{{ old('email') }}">
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> الرقم السري
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="password" name="password" id="last-name"  required="required"
                            class="form-control col-md-7 col-xs-12" value="{{ old('email') }}">
                </div>
            </div>


             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">   الدخول لإدارة الوكلاء
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input checked name="agent_status" type="checkbox" class="js-switch" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">   الدخول لإدارة شركات الطيران
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input checked name="company_status" type="checkbox" class="js-switch" />
                </div>
            </div>



            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">   الدخول لإدارة المتطلبات
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input checked name="requirement_status" type="checkbox" class="js-switch" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">   الدخول لإدارة طلبات العمرة و حالاتها
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input checked name="process_status" type="checkbox" class="js-switch" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">   الدخول لإدارة التذاكر
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input checked name="ticket_status" type="checkbox" class="js-switch" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">   الدخول للتسليم النهائي
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input checked name="final_delivery_status" type="checkbox" class="js-switch" />
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">   الدخول  لشجرة الحسابات
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input checked name="trees_status" type="checkbox" class="js-switch" />
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">   الدخول للحسابات
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input checked name="accounts_status" type="checkbox" class="js-switch" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >   الدخول لكشف الحساب
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input checked name="check_account_status" type="checkbox" class="js-switch" />
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">   الدخول لادارة المستخدمين
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input checked name="users_status" type="checkbox" class="js-switch" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">   الدخول لتقارير
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input checked name="report_status" type="checkbox" class="js-switch" />
                </div>
            </div>


             {{-- <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">   الدخول لكشف الحساب
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input checked name="check_account_status" type="checkbox" class="js-switch" />
                </div>
            </div> --}}



             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">     تعديل سعر الدولار
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input  name="dollar_price_status" type="checkbox" class="js-switch" />
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">   تعديل البيانات الاساسية
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="setting_status" type="checkbox" class="js-switch" />
                </div>
            </div>




            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    {{-- <button type="submit" class="btn btn-primary">انصراف</button> --}}
                    <button type="" id="Swal" class="btn btn-success btn-block">إضافة</button>
                </div>
            </div>

        </form>


    </div>
</div>


@endsection
