@extends('layouts.main')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>أنواع الطلبات
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
                                    <th>اسم المعاملة</th>
                                    <th> تكلفة المعاملة بالدولار</th>
                                    <th> تكلفة المعاملة بالريال</th>
                                    {{-- <th>حالة التأمين</th> --}}
                                    <th>المتطلبات</th>

                                    <th>تاريخ الاضافة</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach ($types as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>

                                        <td>{{$item->price}}</td>
                                        <td>{{$item->price_sr}}</td>
                                        {{-- <td>
                                            @if ($item->status_insurance == 'on')
                                                يوجد تأمين
                                            @else
                                                لا يوجد تأمين
                                            @endif
                                        </td> --}}
                                        <td >
                                            @foreach ($item->requirements as $one)
                                               <span style="background-color: #34495e; padding: 7px 15px; margin-bottom: 5px" class="badge badge-secondary">{{$one->name}}</span>

                                            @endforeach
                                        </td>

                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            <form  action="{{route('type_process.destroy',$item->id)}}" method="POST">
                                                {{ csrf_field()}}
                                                {{ method_field('delete') }}
                                                <a href="{{route('type_process.edit',$item->id)}}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>&nbsp; تعديل</a>
                                                <button type="button" class="show_confirm  btn btn-danger"><i class="fa fa-remove m-right-xs"></i>&nbsp; حذف</button>

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
