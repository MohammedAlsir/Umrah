@extends('layouts.main')
@section('content')
<style>

</style>


<div class="container">


    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>اضافة جديدة لدفعيات الوكلاء</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>

                <form action="{{route('agent_payment.store')}}" method="POST" class="form-horizontal form-label-left">
                    @csrf

                    <div class="container">

                        @livewire('agent-payment')


                    </div>


                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    دفعيات الوكلاء
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                @if ($daily->count() > 0)
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>متسلسل</th>
                            <th>رقم القيد</th>
                            <th>من حساب </th>
                            <th>الى حساب</th>
                            <th>المبلغ</th>
                            <th>البيان</th>
                            <th>تاريخ العملية</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($daily as $item)
                                <tr>
                                    <th scope="row">{{$id++}}</th>
                                    <td>{{$item->registration_number}}</td>
                                    <td>{{$item->Creditors->tree4_name}}</td>

                                    <td>{{$item->debtors->tree4_name}}</td>
                                    <td>{{number_format($item->price ,1)}}</td>
                                    <td>{{$item->Statement}}</td>
                                    <td>{{$item->date}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{route('agent_payment.show',$item)}}">الاشعار</a>
                                    </td>
                                    {{-- <td>
                                    <!-- Small modal -->
                                        <button type="button" style="width: 100%; margin: 0;" class="btn btn-success  edit_data" data-toggle="modal"
                                                data-target=".bs-example-modal-lg_{{$item->id}}">
                                                <i class="fa fa-edit"></i>
                                        </button>

                                        <div class="modal fade bs-example-modal-lg_{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                                aria-hidden="true">×</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel2">تعديل الحساب</h4>
                                                    </div>
                                                    <form action="{{route('daily_restrictions.update',$item->id)}}" method="POST" class="form-horizontal form-label-left">
                                                        <div class="modal-body">
                                                            @csrf
                                                                @method('put')


                                                                <div class="form-group container" style="margin-bottom: 5px">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">من</label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                                        <select style="width: 100%;"  required name="debtor" class="form-control">
                                                                            <option value="">اختر حساب المدين</option>
                                                                                @foreach ($tree4 as $tree)
                                                                                    <option {{$item->debtor == $tree->tree4_code ?'selected':''}} value="{{$tree->tree4_code}}">{{$tree->tree4_name}}</option>
                                                                                @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group container" style="margin-bottom: 5px">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">الى</label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                                        <select style="width: 100%;"  required name="Creditor" class="form-control">
                                                                            <option value="">اختر حساب الدائن</option>
                                                                                @foreach ($tree4 as $tree)
                                                                                    <option {{$item->Creditor == $tree->tree4_code ?'selected':''}} value="{{$tree->tree4_code}}">{{$tree->tree4_name}}</option>
                                                                                @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>



                                                                <div class="form-group container" style="margin-bottom: 5px">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">المبلغ</label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                                        <input style="width: 100%;" value="{{$item->price}}" required type="number" name="price" class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-bottom: 5px">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">التاريخ</label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                                        <input style="width: 100%;"  required value="{{$item->date}}" type="date" name="date" class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group container" style="margin-bottom: 5px">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">البيان</label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                                        <textarea style="width: 100%;" rows="5" name="Statement" class="form-control">{{$item->Statement}}</textarea>
                                                                    </div>
                                                                </div>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                            <button type="submit" class="btn btn-primary">حفط التعديلات</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /modals -->
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>لا يوجد دفعيات وكلاء  حاليا</p>
                @endif
            </div>
        </div>
    </div>

</div>



@endsection


