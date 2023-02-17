@extends('layouts.main')
@section('content')
{{-- @include('sweetalert::alert') --}}
 <div class="x_panel">
    <div class="x_title">
        <h2>  تعديل بيانات الوكيل
            {{-- <small> </small> --}}
        </h2>

        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br/>
        <form  method="POST" action="{{route('agents.update',$agent->id)}}" id="demo-form2"  class="form-horizontal form-label-left">
            @csrf
            {{-- {{ method_field('put') }} --}}
            @method('put')
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >الاسم بالكامل
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="name"  required="required"
                            class="form-control col-md-7 col-xs-12" value="{{ $agent->name }}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">اسم المستخدم
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="user_name"   required="required"
                            class="form-control col-md-7 col-xs-12" value="{{ $agent->user_name }}">
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"> الرقم السري
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="password" name="password"  
                            class="form-control col-md-7 col-xs-12" >
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">  رقم الهاتف
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="phone" id="last-name"  required="required"
                            class="form-control col-md-7 col-xs-12" value="{{ $agent->phone }}">
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
