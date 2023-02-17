@extends('layouts.main')
@section('content')
 <div class="x_panel">
    <div class="x_title">
        <h2>كشف حساب
            {{-- <small> </small> --}}
        </h2>

        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br/>
        <form  method="POST" action="{{route('statement.show')}}" id="demo-form2"  class="form-horizontal form-label-left">
            @csrf
            <div id="" class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"> كسف حساب
                    <span class="required">*</span>
                </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                     <select  required name="tree4" class="select_2 form-control">
                         <option value="">اختر الحساب </option>
                         @foreach ($tree4s as $tree4)
                             <option value="{{$tree4->tree4_code}}">{{$tree4->tree4_name}}</option>
                         @endforeach
                     </select>

                </div>
            </div>

            <div id="" class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"> من
                    <span class="required">*</span>
                </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                     <input type="date" name="start" value="<?php echo date('Y-m-d'); ?>"  class="daterange form-control" />
                </div>
            </div>

            <div id="" class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"> الى
                    <span class="required">*</span>
                </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="date" name="end" value="<?php echo date('Y-m-d'); ?>" class="daterange form-control" />
                </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    {{-- <button type="submit" class="btn btn-primary">انصراف</button> --}}
                    <button type="" id="Swal" class="btn btn-success btn-block">بحث</button>
                </div>
            </div>

        </form>


    </div>
</div>

@endsection
