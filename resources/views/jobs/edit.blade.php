@extends('layouts.main')
@section('content')
{{-- @include('sweetalert::alert') --}}
 <div class="x_panel">
    <div class="x_title">
        <h2>  تعديل بيانات الوظيفة
            {{-- <small> </small> --}}
        </h2>

        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br/>
        <form  method="POST" action="{{route('jobs.update',$jobs->id)}}" id="demo-form2"  class="form-horizontal form-label-left">
            @csrf
            {{-- {{ method_field('put') }} --}}
            @method('put')
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">الاسم
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="name" required="required"
                            class="form-control col-md-7 col-xs-12" value="{{$jobs->name}}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> الوصف
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                    <textarea name="description" class="form-control col-md-7 col-xs-12" cols="30" rows="10">{{$jobs->description}}</textarea>
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
