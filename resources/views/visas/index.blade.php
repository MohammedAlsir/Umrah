@extends('layouts.main')

@section('after_js')
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>التأشيرات
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
                                <tr style="text-align: center">
                                    <th>الرقم</th>
                                    <th>الرقم التسلسلي</th>
                                    <th>الوكيل </th>
                                    <th>رقم هاتف الوكيل </th>
                                    <th>رقم التأشيرة </th>
                                    <th> اسم الكفيل </th>

                                    {{-- <th> رقم هاتف الكفيل </th> --}}
                                    {{-- <th> رقم السجل </th> --}}
                                    {{-- <th> عنوان الكفيل </th> --}}
                                    {{-- <th> المهنة </th> --}}
                                    {{-- <th>التاريخ</th> --}}
                                    {{-- <th> صاحب الجواز </th> --}}
                                    <th>الحالة</th>
                                    {{-- <th>ملاحظات</th> --}}

                                    <th>المزيد</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($visas as $item)
                                <tr>
                                    <td>{{$id++}}</td>
                                    <td>{{$item->code}}</td>
                                    @if ($item->agent_id !='')
                                    <td>{{$item->agent->name}}</td>
                                    <td>{{$item->agent->phone}}</>
                                        @else
                                    <td>{{$item->agent_second_name}}</td>
                                    <td>{{$item->agent_second_phone}}</>
                                        @endif

                                    <td>{{$item->visa_number}}</td>
                                    <td>{{$item->guarantor_name}}</td>
                                    {{-- <td>{{$item->guarantor_number}}</td> --}}
                                    {{-- <td>{{$item->record_number}}</td> --}}
                                    {{-- <td>{{$item->guarantor_address}}</td> --}}
                                    {{-- <td>{{$item->work}}</td> --}}
                                    {{-- <td>{{$item->passport_name}}</td> --}}
                                    {{-- <td>{{$item->created_at}}</td> --}}
                                    @livewire('status-visa', ['item' => $item],key($item->id))

                                    {{-- <td>{{$item->notes}}</td> --}}

                                    {{-- --}}
                                    <td>

                                        <button type="button" style="width: 100%; margin: 5px;"
                                            class="btn btn-primary  edit_data" data-toggle="modal"
                                            data-target=".bs-example-modal-lg_{{$item->id}}">المزيد
                                            <i class="fa fa-eye"></i>
                                        </button>


                                        <div class="modal fade bs-example-modal-lg_{{$item->id}}" tabindex="-1"
                                            role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
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

                                                        <div class="form-group container" style="margin-top:5px;">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                for="first-name"> الرقم التسلسلي
                                                            </label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input style="width: 100%" disabled type="text"
                                                                    value="{{$item->code}}"
                                                                    class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group container"  style=" margin-top:5px; ">
                                                                    <label class=" control-label col-md-3 col-sm-3
                                                            col-xs-12" for="first-name"> الوكيل
                                                            </label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <select style="width: 100%" disabled
                                                                    class="form-control">
                                                                    {{-- @foreach ($agents as $item) --}}
                                                                    @if ($item->agent_id != '')
                                                                        <option>{{$item->agent->name}}</option>
                                                                    @else
                                                                        <option>{{$item->agent_second_name}}</option>
                                                                    @endif
                                                                    {{-- @endforeach --}}
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group container" style="margin-top:5px;">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                for="last-name"> رقم هاتف الوكيل
                                                            </label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <select style="width: 100%" disabled
                                                                    class="form-control">
                                                                    {{-- @foreach ($agents as $item) --}}
                                                                    @if ($item->agent_id != '')
                                                                        <option>{{$item->agent->phone}}</option>
                                                                    @else
                                                                        <option>{{$item->agent_second_phone}}</option>
                                                                    @endif
                                                                    {{-- @endforeach --}}
                                                                </select>
                                                            </div>
                                                        </div>



                                                        <div class="form-group container" style="margin-top:5px;">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                for="first-name"> رقم التأشيرة
                                                            </label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input style="width: 100%" disabled type="text"
                                                                    value="{{$item->visa_number}}"
                                                                    class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group container" style="margin-top:5px;">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                for="first-name"> حالة التأشيرة
                                                            </label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input style="width: 100%" disabled type="text"
                                                                    value="{{$item->status}}"
                                                                    class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group container" style="margin-top:5px;">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                for="last-name"> اسم الكفيل
                                                            </label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input style="width: 100%" disabled type="text"
                                                                    value="{{$item->guarantor_name}}"
                                                                    class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>


                                                        <div class="form-group container" style="margin-top:5px;">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                for="first-name">  رقم هاتف الكفيل
                                                            </label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                               <input style="width: 100%" disabled type="text"
                                                                    value="{{$item->guarantor_number}}"
                                                                    class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        {{-- @livewire('chose-requirement',['item'=>$item]) --}}

                                                        <div class="form-group container" style="margin-top:5px;">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                for="first-name"> رقم السجل
                                                            </label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input style="width: 100%" disabled
                                                                    value="{{$item->record_number}} "
                                                                    class="form-control">

                                                            </div>
                                                        </div>

                                                        <div class="form-group container" style="margin-top:5px;">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                for="last-name"> عنوان الكفيل
                                                            </label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input style="width: 100%" disabled
                                                                    value="{{$item->guarantor_address}}  "
                                                                    class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>


                                                        <div class="form-group container" style="margin-top:5px;">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                for="last-name"> المهنة
                                                            </label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input style="width: 100%" disabled
                                                                    value="{{$item->work}} "
                                                                    class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>

                                                        <div class="form-group container" style="margin-top:5px;">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                for="last-name">رقم الجواز
                                                            </label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input style="width: 100%" disabled
                                                                    value="{{$item->passport_name}}"
                                                                    class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>





                                                        <div class="form-group container"
                                                            style="margin-top:5px; margin-bottom: 10px">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                for="last-name"> ملاحظات
                                                            </label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <textarea style="width: 100%" disabled
                                                                    class="form-control" rows="3"
                                                                    placeholder=' '>{{$item->notes}}</textarea>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    {{-- End --}}
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">إغلاق</button>
                                                        {{-- <button type="submit" class="btn btn-primary">حفط
                                                            التعديلات</button> --}}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /modals -->
                                    </td>
                                    {{-- --}}
                                    <td>
                                        <form action="{{route('visas.destroy',$item->id)}}" method="POST">
                                            {{ csrf_field()}}
                                            {{ method_field('delete') }}

                                            <a href="{{route('visas.edit',$item->id)}}"
                                                style="width: 100%;margin: 0px 0 5px 0px;" class="btn btn-success"><i
                                                    class="fa fa-edit m-right-xs"></i> </a>
                                            <button type="button" style="width: 100%;margin: 0px 0 5px 0px;"
                                                class="show_confirm btn btn-danger"><i
                                                    class="fa fa-remove m-right-xs"></i> </button>
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

@section('after_js')

@endsection
