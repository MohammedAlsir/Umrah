@extends('layouts.main')
@section('content')
    {{-- @include('sweetalert::alert') --}}
    <div class="x_panel">
        <div class="x_title">
            <h2> تعديل بيانات المستخدم
                {{-- <small> </small> --}}
            </h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form method="POST" action="{{ route('users.update', $user->id) }}" id="demo-form2"
                class="form-horizontal form-label-left">
                @csrf
                {{ method_field('put') }}
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">الاسم بالكامل
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="name" id="first-name" required="required"
                            class="form-control col-md-7 col-xs-12" value="{{ $user->name }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">اسم المستخدم
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="email" id="last-name" required="required"
                            class="form-control col-md-7 col-xs-12" value="{{ $user->email }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> الرقم السري
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" name="password" id="last-name" class="form-control col-md-7 col-xs-12"
                            value="">
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> الدخول لإدارة الوكلاء
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="agent_status" {{ $user->agent_status == 'on' ? 'checked' : '' }} type="checkbox"
                            class="js-switch" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> الدخول لادارة الافواج
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="regiment_status" {{ $user->regiment_status == 'on' ? 'checked' : '' }} type="checkbox"
                            class="js-switch" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> الدخول لإدارة شركات الطيران
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="company_status" {{ $user->company_status == 'on' ? 'checked' : '' }} type="checkbox"
                            class="js-switch" />
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> الدخول لإدارة المتطلبات
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="requirement_status" {{ $user->requirement_status == 'on' ? 'checked' : '' }}
                            type="checkbox" class="js-switch" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> الدخول لإدارة طلبات العمرة و
                        حالاتها
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="process_status" {{ $user->process_status == 'on' ? 'checked' : '' }} type="checkbox"
                            class="js-switch" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> الدخول لإدارة التذاكر
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="ticket_status" {{ $user->ticket_status == 'on' ? 'checked' : '' }} type="checkbox"
                            class="js-switch" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> الدخول للتسليم النهائي
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="final_delivery_status" {{ $user->final_delivery_status == 'on' ? 'checked' : '' }}
                            type="checkbox" class="js-switch" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> الدخول لشجرة الحسابات
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="trees_status" {{ $user->trees_status == 'on' ? 'checked' : '' }} type="checkbox"
                            class="js-switch" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> الدخول للحسابات
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="accounts_status" {{ $user->accounts_status == 'on' ? 'checked' : '' }}
                            type="checkbox" class="js-switch" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> الدخول لكشف الحساب
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="check_account_status" {{ $user->check_account_status == 'on' ? 'checked' : '' }}
                            type="checkbox" class="js-switch" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> الدخول لادارة المستخدمين
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="users_status" {{ $user->users_status == 'on' ? 'checked' : '' }} type="checkbox"
                            class="js-switch" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> الدخول لتقارير
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="report_status" {{ $user->report_status == 'on' ? 'checked' : '' }} type="checkbox"
                            class="js-switch" />
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> تعديل سعر الدولار
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="dollar_price_status" {{ $user->dollar_price_status == 'on' ? 'checked' : '' }}
                            type="checkbox" class="js-switch" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> تعديل البيانات الاساسية
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="setting_status" {{ $user->setting_status == 'on' ? 'checked' : '' }} type="checkbox"
                            class="js-switch" />
                    </div>
                </div>






                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        {{-- <button type="submit" class="btn btn-primary">انصراف</button> --}}
                        <button type="" id="Swal" class="btn btn-success btn-block">تعديل </button>
                    </div>
                </div>

            </form>


        </div>
    </div>
@endsection
