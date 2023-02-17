@extends('layouts.main')

{{--  --}}


@section('content')
{{-- @include('sweetalert::alert') --}}
 <div class="x_panel">
    <div class="x_title">
        <h2>إضافة حالة جديدة
            {{-- <small> </small> --}}
        </h2>

        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br/>
        <form  method="POST" action="{{route('status.store')}}" id="demo-form2"  class="form-horizontal form-label-left">
            @csrf
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">الحالة
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="name" required="required"
                            class="form-control col-md-7 col-xs-12" value="">
                </div>
            </div>


            {{-- <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ينتمي الى
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select  name="belongs_to" required="required"
                            class="form-control col-md-7 col-xs-12">
                            <option value="">ينتمي الى </option>
                            <option value="1" >المعاملات</option>
                            <option value="2" >التأشيرات</option>
                    </select>
                </div>
            </div> --}}


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
