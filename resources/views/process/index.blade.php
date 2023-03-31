@extends('layouts.main')

@section('content')
    <style>
        .boxes {
            margin: auto;
            padding: 15px 70px 15px 70px;
            background: #3e5266;
        }

        /*Checkboxes styles*/
        input[type="checkbox"] {
            display: none;
        }

        input[type="checkbox"]+label {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 20px;
            /* font: 14px/20px 'Open Sans', Arial, sans-serif; */
            color: #fff;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }

        input[type="checkbox"]+label:last-child {
            margin-bottom: 0;
        }

        input[type="checkbox"]+label:before {
            content: '';
            display: block;
            width: 20px;
            height: 20px;
            border: 1px solid #fff;
            position: absolute;
            left: 0;
            top: 0;
            opacity: .6;
            -webkit-transition: all .12s, border-color .08s;
            transition: all .12s, border-color .08s;
        }

        input[type="checkbox"]:checked+label:before {
            width: 10px;
            top: -5px;
            left: 5px;
            border-radius: 0;
            opacity: 1;
            border-top-color: transparent;
            border-left-color: transparent;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    </style>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>طلبات العمرة
                    {{-- <small>کاربران</small> --}}
                </h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">


                            <table id="datatable-keytable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>الرقم</th>
                                        {{-- <th>الرقم التسلسلي</th> --}}
                                        <th>الوكيل </th>
                                        <th> المستفيد</th>
                                        <th>المعاملة</th>
                                        <th>رقم التأشيرة</th>
                                        {{-- <th>تكلفة نوع المعاملة بالدولار</th> --}}
                                        {{-- <th>التأمين</th> --}}
                                        {{-- <th>تكاليف اخري</th> --}}
                                        <th>الاجمالي بالجنيه</th>
                                        {{-- <th>مبلغ الاتفاق </th> --}}
                                        {{-- <th> في المكتب</th> --}}
                                        <td style="width: 190px !important">الحالة</td>
                                        <th>المزيد</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($process as $item)
                                        <tr>
                                            <td>{{ $id++ }}</td>
                                            {{-- <td>{{$item->code}}</td> --}}
                                            <td>{{ $item->agent->name }}</td>
                                            <td>{{ $item->beneficiary }}</td>
                                            <td>{{ $item->type->name }}</td>
                                            <td>{{ $item->visa_number }}</td>
                                            {{-- <td><span style="color: red">$</span> {{number_format($item->price_type)}}  </td> --}}
                                            {{-- <td><span style="color: red">$</span> {{number_format($item->insurance_amount)}}</td> --}}
                                            {{-- <td> {{number_format($item->other_costs)}}</td> --}}

                                            <td> {{ number_format($item->total_boundsd) }}</td>


                                            {{-- <td>{{number_format($item->agreement_amount)}}</td> --}}

                                            {{-- <td>{{number_format($item->agreement_amount - $item->total_boundsd) }}</td> --}}
                                            {{-- <td>{{ number_format(($item->agreement_amount+ $item->insurance_amount+$item->other_costs)*$item->dollar_price)}} جنيه</td> --}}
                                            {{-- <td>

                                            <select name="" id="">
                                                @foreach ($status_process as $status)
                                                    <option value="">{{$status->name}}</option>
                                                @endforeach
                                            </select>

                                        </td> --}}
                                            @livewire('status-process', ['item' => $item], key($item->id))

                                            <td>

                                                <button type="button" style="width: 100%; margin: 5px;"
                                                    class="btn btn-primary  edit_data" data-toggle="modal"
                                                    data-target=".bs-example-modal-lg_{{ $item->id }}">المزيد
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                <a href="{{ route('process.show', $item->id) }}"
                                                    style="width: 100%; margin: 5px;" class="btn btn-default">عرض
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <div class="modal fade bs-example-modal-lg_{{ $item->id }}"
                                                    tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span aria-hidden="true">×</span>
                                                                </button>
                                                                <h4 class="modal-title" id="myModalLabel2">مزيد من التفاصيل
                                                                </h4>
                                                            </div>
                                                            {{-- Begin --}}
                                                            <div style="padding: 15px 30px 0px 30px">

                                                                {{-- <div class="form-group container" style="margin-top:5px;">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> الرقم التسلسلي
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type="text"  value="{{$item->code}}"
                                                                                class="form-control col-md-7 col-xs-12" >
                                                                    </div>
                                                                </div> --}}

                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> حالة المعاملة
                                                                        {{-- <span class="required">*</span> --}}
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type="text"
                                                                            value="{{ $item->status_2 }}"
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-top:5px; ">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="first-name"> الوكيل
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <select style="width: 100%" disabled
                                                                            class="form-control">
                                                                            {{-- @foreach ($agents as $item) --}}
                                                                            <option>{{ $item->agent->name }}</option>
                                                                            {{-- @endforeach --}}
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> رقم هاتف الوكيل
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type="text"
                                                                            value="{{ $item->agent->phone }}"
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>



                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="first-name"> اسم المستفيد
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type="text"
                                                                            value="{{ $item->beneficiary }}"
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> رقم هاتف المستفيد
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type="text"
                                                                            value="{{ $item->beneficiary_phone }}"
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> رقم التأشيرة
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type="text"
                                                                            value="{{ $item->visa_number }}"
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>




                                                                @livewire('chose-requirement', ['item' => $item])

                                                                {{-- <div class="form-group container" style="margin-top:5px;">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> تكلفة نوع المعاملة
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled value="{{$item->price_type}} دولار" class="form-control">

                                                                    </div>
                                                                </div> --}}

                                                                {{-- <div class="form-group container" style="margin-top:5px;">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">   التأمين
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled   value="{{$item->insurance_amount}} دولار "
                                                                                class="form-control col-md-7 col-xs-12" >
                                                                    </div>
                                                                </div> --}}


                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> سعر الدولار
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled
                                                                            value="{{ number_format($item->dollar_price, 2) }}"
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label
                                                                        class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> سعر الريال
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled
                                                                            value="{{ number_format($item->sr_price, 2) }}"
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label
                                                                        class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> التكلفة بالدولار
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled
                                                                            value="{{ number_format($item->price_type) }} دولار "
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label
                                                                        class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> التكلفة بالريال
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled
                                                                            value="{{ number_format($item->price_type_sr) }} ريال "
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>



                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label
                                                                        class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> إجمالي التكلفة بالجنيه
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type=""
                                                                            value="{{ number_format($item->total_boundsd) }}"
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label
                                                                        class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                        الربح

                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type=""
                                                                            name="profit"
                                                                            value="{{ number_format($item->profit) }}"
                                                                            class="form-control col-md-7 col-xs-12"
                                                                            value="">
                                                                    </div>
                                                                </div>


                                                                <div class="form-group container"
                                                                    style="margin-top:5px; margin-bottom: 10px">
                                                                    <label
                                                                        class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> ملاحظات
                                                                        <span class="required"></span>
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <textarea style="width: 100%" disabled class="form-control" rows="3" placeholder=' '>{{ $item->notes }}</textarea>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            {{-- End --}}
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">إغلاق</button>
                                                                {{-- <button type="submit" class="btn btn-primary">حفط التعديلات</button> --}}
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /modals -->
                                            </td>
                                            <td>
                                                <form action="{{ route('process.destroy', $item->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                    <a style="width: 100%;margin: 5px 0 0 0px;"
                                                        href="{{ route('process.edit', $item->id) }}"
                                                        class="btn btn-success"><i
                                                            class="fa fa-edit m-right-xs"></i>&nbsp; تعديل</a>
                                                    <button style="width: 100%;margin: 5px 0 0 0px;" type="button"
                                                        class="show_confirm btn btn-danger"><i
                                                            class="fa fa-remove m-right-xs"></i>&nbsp; حذف</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
