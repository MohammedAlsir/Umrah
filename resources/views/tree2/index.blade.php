@extends('layouts.main')
@section('content')
<style>
    .dataTables_filter,
    .dataTables_info,
    .dataTables_paginate{
        display: none
    }
</style>
<div class="col-md-5 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>إضافة حساب جديد</h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form action="{{route('tree2.store')}}" method="POST" class="form-horizontal form-label-left">
                @csrf
                {{-- <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">رقم الحساب</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <input disabled class="form-control">
                    </div>
                </div> --}}

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3"> الحساب الرئيسي</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <select required name="tree1_code" style="width: 100%" class="select_2 form-control">
                            @foreach ($tree1s as $tree1)
                                <option value="{{$tree1->tree1_code}}">{{$tree1->tree1_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">اسم الحساب</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <input required type="text" name="tree2_name" class="form-control">
                    </div>
                </div>

                <div class="ln_solid"></div>

                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success btn-block">إضافة</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="col-md-7 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>
                المستوي الثاني لشجرة الحسابات
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            @if ($tree2s->count() > 0)
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>متسلسل</th>
                        <th>كود الحساب </th>
                        <th>الحساب</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($tree2s as $tree)
                            <tr>
                                <th scope="row">{{$id++}}</th>
                                <td>{{$tree->tree2_code}}</td>
                                <td>{{$tree->tree2_name}}</td>
                                <td>
                                   <!-- Small modal -->
                                    <button type="button" style="width: 100%; margin: 0;" class="btn btn-success  edit_data" data-toggle="modal"
                                            data-target=".bs-example-modal-lg_{{$tree->id}}">
                                            <i class="fa fa-edit"></i>
                                    </button>

                                    <div class="modal fade bs-example-modal-lg_{{$tree->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                            aria-hidden="true">×</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel2">تعديل الحساب</h4>
                                                </div>
                                                <form action="{{route('tree2.update',$tree->id)}}" method="POST" class="form-horizontal form-label-left">
                                                    <div class="modal-body">

                                                           @csrf
                                                            @method('put')

                                                            <div class="form-group container">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-3"> الحساب الرئيسي</label>
                                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                                    <input style="width: 100%; margin-bottom: 10px" value="{{$tree->tree1->tree1_name}}" disabled class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="form-group container">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-3">رقم الحساب</label>
                                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                                    <input style="width: 100%; margin-bottom: 10px" value="{{$tree->tree2_code}}" disabled class="form-control">
                                                                </div>
                                                            </div>




                                                            <div class="form-group container">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-3">اسم الحساب</label>
                                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                                    <input style="width: 100%; margin-bottom: 10px" value="{{$tree->tree2_name}}" required type="text" name="tree2_name" class="form-control">
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>لا يوجد حسابات حاليا</p>
            @endif
        </div>
    </div>
</div>



@endsection


