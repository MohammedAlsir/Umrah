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
                                        <th>عدد الايام</th>
                                        <th>عدد الافراد </th>
                                        <th>تكلفة الفندق </th>
                                        <th>تكلفة الترحيل </th>
                                        <th>شركة الطيران</th>
                                        <th>تكلفة الطيران </th>
                                        <th> الاجمالي </th>
                                        <th>تاريخ الاضافة</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($collection as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->num_day }}</td>
                                            <td>{{ $item->beneficiary->count() }}</td>
                                            <td>{{ $item->hotel_cost }}</td>
                                            <td>{{ $item->relay_cost }}</td>
                                            <td>
                                                @isset($item->company)
                                                    {{ $item->company->name }}
                                                @endisset
                                            </td>
                                            <td>{{ $item->airline_cost }}</td>
                                            <td>{{ number_format($item->hotel_cost + $item->relay_cost + $item->airline_cost) }}
                                            </td>
                                            <td>{{ $item->created_at }}</td>
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
