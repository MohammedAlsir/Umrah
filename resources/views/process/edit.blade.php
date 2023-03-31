@extends('layouts.main')
@section('content')
    {{-- @include('sweetalert::alert') --}}
    <div class="x_panel">
        <div class="x_title">
            <h2> تعديل بيانات طلب العمرة
                {{-- <small> </small> --}}
            </h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form method="POST" action="{{ route('process.update', $process->id) }}" id="demo-form2"
                class="form-horizontal form-label-left">
                @csrf
                {{ method_field('put') }}
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> الوكيل
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="agent_id" style="width: 100%" class="select_2 form-control">
                            @foreach ($agents as $item)
                                <option {{ $process->agent_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> اسم المستفيد
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" value="{{ $process->beneficiary }}" name="beneficiary" id="first-name"
                            required="required" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> رقم هاتف المستفيد
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" value="{{ $process->beneficiary_phone }}" name="beneficiary_phone"
                            required="required" class="form-control col-md-7 col-xs-12" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> رقم التأشيرة
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="visa_number" required="required" class="form-control col-md-7 col-xs-12"
                            value="{{ $process->visa_number }}">
                    </div>
                </div>





                @livewire('edit-process', ['process' => $process, 'type' => $type])

                {{-- <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">    رقم الجواز
                    <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" value="{{$process->passport_number}}" name="passport_number" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">   الرقم التسلسلي للمعاملة لدى المكتب
                    <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" value="{{$process->serial_number}}" name="serial_number" class="form-control">
                </div>
            </div> --}}

                {{-- <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">    تاريخ ادخال المعاملة للسفارة
                    <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="date" value="{{$process->date_entry}}" name="date_entry" class="form-control">
                </div>
            </div> --}}

                {{-- <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">   التاريخ المتوقع لتسليم المعاملة
                    <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="date" value="{{$process->expected_date}}" name="expected_date" class="form-control">
                </div>
            </div> --}}

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> الربح

                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" name="profit" value="{{ $process->profit }}"
                            class="form-control col-md-7 col-xs-12" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> البيان
                        <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea name="Statement" class="form-control" rows="3">
@isset($process->daily[0]->Statement)
{{ $process->daily[0]->Statement }}
@endisset
</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> ملاحظات
                        <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea name="notes" class="form-control" rows="3" placeholder=''>{{ $process->notes }}</textarea>
                    </div>
                </div>




                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        {{-- <button type="submit" class="btn btn-primary">انصراف</button> --}}
                        <button type="" id="Swal" class="btn btn-success btn-block">تعديل</button>
                    </div>
                </div>

            </form>


        </div>
    </div>
@endsection
