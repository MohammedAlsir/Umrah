@extends('layouts.main')
@section('content')
{{-- @include('sweetalert::alert') --}}
<div class="x_panel">
    <div class="x_title">
        <h2>إضافة تأشيرة جديدة
            {{-- <small> </small> --}}
        </h2>

        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br/>
        <form  method="POST" action="{{route('visas.store')}}" id="demo-form2"  class="form-horizontal form-label-left">
            @csrf


            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> الوكيل
                    <span class="required">*</span>
                </label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                        <div id="gender" class="btn-group" data-toggle="buttons">
                            <label id="one"  class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input   type="radio"> &nbsp; وكيل جديد &nbsp;
                            </label>
                            <label  id="two" class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input  data-bs-toggle="modal" data-bs-target="#exampleModal" type="radio" name="gender" value="female" data-parsley-multiple="gender"> وكيل موجود مسبقا
                            </label>
                        </div>
                   </div>
            </div>

            {{-- وكيل جديد --}}
            <div id="one_input" style="display: none">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">   اسم الوكيل
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="agent_second_name" type="text" name="agent_second_name"
                                class="form-control col-md-7 col-xs-12" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">  رقم هاتف الوكيل
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="agent_second_phone"  type="number" name="agent_second_phone"
                                class="form-control col-md-7 col-xs-12" value="">
                    </div>
                </div>
            </div>

            <div id="two_input"  class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> اسم الوكيل
                    <span class="required">*</span>
                </label>




                 <div class="col-md-6 col-sm-6 col-xs-12">
                     <select  id="agent_id" name="agent_id" style="width: 100%" class="select_2 form-control">
                         @foreach ($agents as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                         @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">  رقم التأشيرة
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="visa_number"  required="required"
                            class="form-control col-md-7 col-xs-12" value="">
                </div>
            </div>





             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">  اسم الكفيل
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="guarantor_name"   required="required"
                            class="form-control col-md-7 col-xs-12" value="">
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">   عنوان الكفيل
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="guarantor_address"   required="required"
                            class="form-control col-md-7 col-xs-12" value="">
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> رقم هاتف الكفيل
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" name="guarantor_number"   required="required"
                            class="form-control col-md-7 col-xs-12" value="">
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> رقم  السجل
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" name="record_number"   required="required"
                            class="form-control col-md-7 col-xs-12" value="">
                </div>
            </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">    المهنة
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="work"   required="required"
                            class="form-control col-md-7 col-xs-12" value="">
                </div>
            </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">    اسم صاحب الجواز
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="passport_name"   required="required"
                            class="form-control col-md-7 col-xs-12" value="">
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">    ملاحظات
                     <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                     <textarea name="notes" class="form-control" rows="3" placeholder=''></textarea>
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

        $("#agent_second_name").prop('required',true);
        $("#agent_second_phone").prop('required',true);
        $("#agent_id").val('');
        $("#two_input").hide();

    });

    $("#two").click(function() {

    $("#two_input").show();
        $("#agent_second_name").prop('required',false);
        $("#agent_second_phone").prop('required',false);
        $("#agent_second_name").val('');
        $("#agent_second_phone").val('');
        $("#one_input").hide();
    });


  </script>
@endsection
