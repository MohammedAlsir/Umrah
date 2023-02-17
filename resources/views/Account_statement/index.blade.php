@extends('layouts.main')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>كشف حساب الوكلاء
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
                                    <th>الاسم بالكامل </th>
                                    <th>اسم المستخدم</th>
                                    <th>رقم الهاتف</th>
                                    <th>تاريخ الاضافة</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach ($agents as $item)
                                    <tr>
                                        <td>{{$id++}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->user_name}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>

                                                 <a href="{{route('Account_statement.show',$item->tree4_code)}}" type="button" style="width: 100%;margin: 5px 0 0 0px;" class="btn btn-success"><i
                                                    class="fa fa-user-o m-right-xs"></i>&nbsp; كشف حساب الوكيل</a>

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
