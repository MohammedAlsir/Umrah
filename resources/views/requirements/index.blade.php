@extends('layouts.main')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>المتطلبات
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
                                    {{-- <th>ينتمي الى</th> --}}
                                    <th>تاريخ الاضافة</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach ($requirement as $item)
                                    <tr>
                                        <td>{{$id++}}</td>
                                        <td>{{$item->name}}</td>
                                        {{-- <td>
                                            @if ($item->belongs_to == 1)

                                                طلب عمرة
                                            @endif
                                        </td> --}}
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            <form action="{{route('requirement.destroy',$item->id)}}" method="POST">
                                                {{ csrf_field()}}
                                                {{ method_field('delete') }}
                                                <a href="{{route('requirement.edit',$item->id)}}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>&nbsp; تعديل</a>
                                                <button type="button" class="show_confirm btn btn-danger"><i class="fa fa-remove m-right-xs"></i>&nbsp; حذف</button>
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
