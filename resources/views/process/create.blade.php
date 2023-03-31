@extends('layouts.main')
@section('content')
    {{-- @include('sweetalert::alert') --}}
    <div class="x_panel">
        <div class="x_title">
            <h2>إضافة طلب عمرة
                {{-- <small> </small> --}}
            </h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form method="POST" action="{{ route('process.store') }}" id="demo-form2" class="form-horizontal form-label-left">
                @csrf


                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> الوكيل
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="agent_id" class="select_2 form-control">
                            @foreach ($agents as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> اسم المستفيد
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="beneficiary" id="first-name" required="required"
                            class="form-control col-md-7 col-xs-12" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> رقم هاتف المستفيد
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="beneficiary_phone" id="last-name" required="required"
                            class="form-control col-md-7 col-xs-12" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> رقم التأشيرة
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="visa_number" required="required" class="form-control col-md-7 col-xs-12"
                            value="">
                    </div>
                </div>






                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> طريقة الدفع
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div id="gender" class="btn-group" data-toggle="buttons">
                            <label id="one" class="btn btn-default active" data-toggle-class="btn-primary"
                                data-toggle-passive-class="btn-default">
                                <input type="radio"> &nbsp; دفع اجل &nbsp;
                            </label>

                            <label id="two" class="btn btn-primary" data-toggle-class="btn-primary"
                                data-toggle-passive-class="btn-default">
                                <input data-bs-toggle="modal" data-bs-target="#exampleModal" type="radio" name="gender"
                                    value="female" data-parsley-multiple="gender"> دفع نقدي
                            </label>
                        </div>
                    </div>
                </div>

                <div id="one_input">
                </div>


                <div id="two_input" class="form-group" style="display: none">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> اختر الحساب
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="tree4_code" name="tree4_code" style="width: 100%" class="select_2 form-control">
                            <option value="">اختر الحساب</option>
                            @foreach ($tree4 as $item)
                                <option value="{{ $item->tree4_code }}">{{ $item->tree4_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                @livewire('type-processe', ['type' => $type, 'setting' => $setting])


                {{-- @livewire('add-process', ['setting' => $setting]) --}}

                {{-- <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">    رقم الجواز
                    <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="passport_number" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">   الرقم التسلسلي للمعاملة لدى المكتب
                    <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="serial_number" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">    تاريخ ادخال المعاملة للسفارة
                    <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="date" name="date_entry" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">   التاريخ المتوقع لتسليم المعاملة
                    <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="date" name="expected_date" class="form-control">
                </div>
            </div>
            --}}


                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> الربح

                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" name="profit" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> البيان
                        <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea name="Statement" class="form-control" rows="3" placeholder=' '></textarea>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> ملاحظات
                        <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea name="notes" class="form-control" rows="3" placeholder=' '></textarea>
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

@section('after_js')
    {{-- <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script> --}}


    <script>
        $("#one").click(function() {

            $("#one_input").show();

            $("#tree4_code").prop('required', false);
            // $("#agent_second_phone").prop('required',true);
            // $("#agent_id").val('');
            $("#two_input").hide();

        });

        $("#two").click(function() {

            $("#two_input").show();
            $("#tree4_code").prop('required', true);
            // $("#agent_second_phone").prop('required',false);
            // $("#agent_second_name").val('');
            // $("#agent_second_phone").val('');
            $("#one_input").hide();
        });
    </script>
@endsection
