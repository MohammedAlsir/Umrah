@extends('layouts.main')
@section('content')
 <div class="x_panel">
    <div class="x_title">
        <h2>التقارير عن المعاملات
            {{-- <small> </small> --}}
        </h2>

        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br/>
        <form  method="POST" action="{{route('reports.process.post')}}" id="demo-form2"  class="form-horizontal form-label-left">
            @csrf
            <div id="" class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"> نوع المعاملة
                    <span class="required">*</span>
                </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                     <select  name="type" class="select_2 form-control">
                         <option value="all">كل الانواع</option>
                         @foreach ($types as $type)
                             <option value="{{$type->id}}">{{$type->name}}</option>
                         @endforeach
                     </select>

                </div>
            </div>

             <div id="" class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">الوكيل
                    <span class="required">*</span>
                </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                     <select  name="agent_id" class="select_2 form-control">
                       <option value="all">كل الوكلاء</option>
                         @foreach ($agents as $agent)
                             <option value="{{$agent->id}}">{{$agent->name}}</option>
                         @endforeach
                     </select>

                </div>
            </div>

            <div id="" class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">حالة المعاملة
                    <span class="required">*</span>
                </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                     <select  name="status" class="select_2 form-control">
                         <option value="all">كل الحالات</option>
                         <option value="1">المعاملات التي تم تسليمها</option>
                         <option value="0">المعاملات التي لم يتم تسليمها</option>
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
