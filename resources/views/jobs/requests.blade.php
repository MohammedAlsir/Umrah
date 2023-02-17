@extends('layouts.main')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>كل الطلبات
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
                                    <th>الاسم </th>
                                    <th> الوظيفة</th>
                                    <th> البلد</th>
                                    <th> رقم التواصل </th>
                                    <th> ملاحظات  </th>
                                    <th>تاريخ الطلب </th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach ($requests as $item)
                                    <tr>
                                        <td>{{$id++}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->job->name}}</td>
                                        <td>{{$item->countery}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->note}}</td>
                                        <td>{{$item->created_at}}</td>
                                        {{-- <td>
                                            <form action="{{route('jobs.destroy',$item->id)}}" method="POST">
                                                {{ csrf_field()}}
                                                {{ method_field('delete') }}
                                                <a href="{{route('jobs.edit',$item->id)}}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>&nbsp; تعديل</a>
                                                <button type="button" class="show_confirm btn btn-danger"><i class="fa fa-remove m-right-xs"></i>&nbsp; حذف</button>
                                            </form>

                                        </td> --}}
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
