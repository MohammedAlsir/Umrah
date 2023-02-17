@extends('layouts.main')

{{--  --}}


@section('content')
{{-- @include('sweetalert::alert') --}}
 <div class="x_panel">
    <div class="x_title">
        <h2>إضافة تذكرة جديدة
            {{-- <small> </small> --}}
        </h2>

        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br/>
        <form  method="POST" action="{{route('ticket.store')}}" id="demo-form2"  class="form-horizontal form-label-left">
            @csrf

            <input type="hidden" name="processe_id" value="{{$process->id}}">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">  شركة الطيران
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select  name="company_id"   required="required"
                            class="form-control col-md-7 col-xs-12">
                            <option value="">اختر شركة الطيران المناسبة </option>
                            @foreach ($company as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >الاسم
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" readonly name="name" required="required"
                            class="form-control col-md-7 col-xs-12" value="{{$process->beneficiary}}">
                </div>
            </div>



            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >  رقم التأشيرة
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="visa_number"  readonly required="required"
                            class="form-control col-md-7 col-xs-12" value="{{$process->visa_number}}">
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >  الحالة
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select  name="status"   required="required"
                            class="form-control col-md-7 col-xs-12">

                            <option value="">الحالة</option>
                            <option value="رضيع">رضيع</option>
                            <option value="طفل">طفل</option>
                            <option value="بالغ">بالغ</option>
                    </select>
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >  السعر
                     <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="price"   required="required"
                            class="form-control col-md-7 col-xs-12" value="">
                </div>
            </div>


            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    {{-- <button type="submit" class="btn btn-primary">انصراف</button> --}}
                    <button type="" id="Swal" class="btn btn-success btn-block">حجز</button>
                </div>
            </div>

        </form>


    </div>
</div>

@endsection
