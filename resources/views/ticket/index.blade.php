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
                <h2> كل الحجوزات
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
                                        <th> شركة الطيران</th>
                                        <th> رقم التأشيرة</th>
                                        <th> الحالة</th>
                                        <th>السعر</th>
                                        <th>التكلفة</th>
                                        <th>الصافى</th>
                                        <th>الربح</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($tickets as $item)
                                        <tr>
                                            <td>{{ $id++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->company->name }}</td>
                                            <td>{{ $item->visa_number }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ number_format($item->price) }}</td>

                                            <td>{{ number_format($item->cost) }}</td>
                                            <td>{{ number_format($item->net) }}</td>
                                            <td>{{ number_format($item->profit) }}</td>




                                            <td>
                                                <form action="{{ route('ticket.destroy', $item->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}

                                                    <button type="button" style="width: 100%;margin: 5px 0 0 0px;"
                                                        class="show_confirm3 btn btn-danger"><i
                                                            class="fa fa-times  m-right-xs"></i>&nbsp; إلغاء الحجز</button>



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
