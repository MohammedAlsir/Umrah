@extends('layouts.main')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>الافواج
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
                                        <th>رقم الفوج</th>
                                        {{-- <th>عدد الايام</th> --}}
                                        <th>عدد الافراد </th>

                                        <th> تكاليف اضافية </th>
                                        <th> الاجمالي </th>
                                        <th> الربح / الخسارة </th>

                                        <th> الحالة </th>
                                        <th> المزيد </th>
                                        {{-- <th>تاريخ الاضافة</th> --}}
                                        <th>العمليات</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($collection as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            {{-- <td>{{ $item->num_day }}</td> --}}
                                            <td>{{ $item->beneficiary->count() }}</td>

                                            <td>{{ number_format((int) $item->expenses->sum('cost')) }}</td>

                                            <td>
                                                {{ number_format($item->hotel_cost + $item->relay_cost + $item->airline_cost + (int) $item->expenses->sum('cost')) }}
                                            </td>

                                            <td>
                                                {{ number_format($item->revenues - ($item->hotel_cost + $item->relay_cost + $item->airline_cost + (int) $item->expenses->sum('cost'))) }}
                                            </td>

                                            @livewire('status-regiment', ['item' => $item], key($item->id))
                                            <td>
                                                {{-- start --}}

                                                <button type="button" style="width: 100%; margin: 5px;"
                                                    class="btn btn-primary  edit_data" data-toggle="modal"
                                                    data-target=".bs-example-modal-lg_{{ $item->id }}">المزيد
                                                    <i class="fa fa-eye"></i>
                                                </button>

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

                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> رقم الفوج
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type="text"
                                                                            value="{{ $item->id }}"
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> عدد الايام
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type="text"
                                                                            value="{{ $item->num_day }}"
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> عدد الافراد
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type="text"
                                                                            value="{{ $item->beneficiary->count() }}"
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> تكلفة الفندق
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type="text"
                                                                            value="{{ number_format($item->hotel_cost) }}"
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> تكلفة الترحيل
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type="text"
                                                                            value="{{ number_format($item->relay_cost) }}"
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> شركة الطيران
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type="text"
                                                                            value="{{ $item->company ? $item->company->name : '' }}"
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> تكلفة الطيران
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type="text"
                                                                            value="{{ number_format($item->airline_cost) }}"
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> تكاليف اضافية
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type="text"
                                                                            value="{{ number_format((int) $item->expenses->sum('cost')) }}"
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label
                                                                        class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> الاجمالي
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type="text"
                                                                            value="{{ number_format($item->hotel_cost + $item->relay_cost + $item->airline_cost + (int) $item->expenses->sum('cost')) }}"
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label
                                                                        class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> الربح / الخسارة
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type="text"
                                                                            value="{{ number_format($item->revenues - ($item->hotel_cost + $item->relay_cost + $item->airline_cost + (int) $item->expenses->sum('cost'))) }}"
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-top:5px;">
                                                                    <label
                                                                        class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> تاريخ الاضافة
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type="text"
                                                                            value="{{ $item->created_at }}"
                                                                            class="form-control col-md-7 col-xs-12">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container"
                                                                    style="margin-top:5px; margin-bottom:5px;">
                                                                    <label
                                                                        class="control-label col-md-3 col-sm-3 col-xs-12"
                                                                        for="last-name"> الحالة
                                                                        {{-- <span class="required">*</span> --}}
                                                                    </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input style="width: 100%" disabled type="text"
                                                                            value="{{ $item->status == 0 ? 'لم يتم السفر' : 'تم السفر' }}"
                                                                            class="form-control col-md-7 col-xs-12">
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
                                                {{-- end --}}
                                            </td>
                                            {{-- <td>{{ $item->created_at }}</td> --}}
                                            <td>
                                                <form action="{{ route('regiment.destroy', $item->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                    <a href="{{ route('regiment.edit', $item->id) }}"
                                                        class="btn btn-sm btn-success"><i
                                                            class="fa fa-edit m-right-xs"></i>&nbsp;
                                                    </a>
                                                    <button type="button" class="show_confirm btn btn-sm btn-danger"><i
                                                            class="fa fa-remove m-right-xs"></i>&nbsp;</button>
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
