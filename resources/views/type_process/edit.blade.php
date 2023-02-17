@extends('layouts.main')
@section('content')
{{-- @include('sweetalert::alert') --}}
 <div class="x_panel">
    <div class="x_title">
        <h2>  تعديل البيانات 
            {{-- <small> </small> --}}
        </h2>

        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br/>
        <form  method="POST" action="{{route('type_process.update',$type->id)}}" id="demo-form2"  class="form-horizontal form-label-left">
            @csrf
            {{ method_field('put') }}
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> اسم المعاملة
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="name" id="first-name" required="required"
                            class="form-control col-md-7 col-xs-12" value="{{ $type->name }}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">المتطلبات
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="select2Multiple" name="requirements[]" required="required"
                            class="select2-multiple form-control col-md-7 col-xs-12" multiple>
                            @foreach ($requirements as $item)
                                <option
                                    @foreach ($requirement_type_process as $one)
                                        {{$one->requirement_id ==$item->id ? 'selected':''}}
                                    @endforeach  value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> تكلفة المعاملة بالدولار
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" name="price" value="{{$type->price}}" id="first-name" required="required"
                            class="form-control col-md-7 col-xs-12" value="">
                </div>
            </div>

               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> تكلفة المعاملة بالريال
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" name="price_sr" value="{{$type->price_sr}}" id="first-name" required="required"
                            class="form-control col-md-7 col-xs-12" value="">
                </div>
            </div>


            {{-- <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> التأمين
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <div class="checkbox">
                        <label class="">
                            <div class="icheckbox_flat-green" style="position: relative;">
                                <input name="status_insurance"  {{$type->status_insurance =='on'? 'checked':''}} type="checkbox" class="flat"  style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                            تفعيل التأمين
                        </label>
                    </div>
                </div>
            </div> --}}

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

@section('after_js')
    <script>
        $(document).ready(function() {
            // Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "اختر المتطلبات",
                allowClear: true,

            });

        });

    </script>

@endsection
