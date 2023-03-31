<!DOCTYPE html>
<html lang="fa" dir="rtl">
@include('layouts.head')
<style>
    .visable_print {
        display: none;
    }

    @media print {

        .x_title,
        .hide_print {
            display: none;
        }

        .visable_print {
            display: contents;
        }
    }

    td,
    th {
        text-align: center;
    }
</style>
<!-- /header content -->

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <div class="right_col " role="main" style="padding-top: 20px; margin-right: 0">

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2> تقرير الافواج

                                </h2>
                                <button onClick="window.print()" style="padding-left: 20px; padding-right: 20px"
                                    class="btn btn-sm btn-default" type="button" data-placement="top"
                                    data-toggle="tooltip" data-original-title="طباعة">
                                    <i class="fa fa-print" style="margin-left:5px; margin-right:5px"></i>طباعة</button>

                                <a href="{{ route('reports.regiment') }}"
                                    style="padding-left: 20px; padding-right: 20px" class="btn btn-sm btn-default"
                                    type="button" data-placement="top" data-toggle="tooltip"
                                    data-original-title="رجوع">
                                    <i class="fa fa-arrow-left " style="margin-left:5px; margin-right:5px"></i>رجوع</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>رقم الفوج</th>
                                                <th>عدد الايام</th>
                                                <th>عدد الافراد </th>
                                                <th>تكلفة الفندق </th>
                                                <th>تكلفة الترحيل </th>
                                                <th>شركة الطيران</th>
                                                <th>تكلفة الطيران </th>
                                                <th> تكاليف اضافية </th>
                                                <th> اجمالي التكاليف </th>
                                                <th> الايرادات </th>
                                                <th> الربح / الخسارة </th>
                                                <th> الحالة </th>
                                                <th>تاريخ الاضافة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $beneficiaryCount = 0;
                                                $expensesCount = 0;

                                            @endphp
                                            @foreach ($regiments as $item)
                                                @php
                                                    $beneficiaryCount += $item->beneficiary->count();
                                                    $expensesCount += (int) $item->expenses->sum('cost');
                                                @endphp
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->num_day }}</td>
                                                    <td>{{ $item->beneficiary->count() }}</td>
                                                    <td>{{ number_format($item->hotel_cost) }}</td>
                                                    <td>{{ number_format($item->relay_cost) }}</td>
                                                    <td>
                                                        @isset($item->company)
                                                            {{ $item->company->name }}
                                                        @endisset
                                                    </td>
                                                    <td>{{ number_format($item->airline_cost) }}</td>
                                                    <td>{{ number_format((int) $item->expenses->sum('cost')) }}</td>

                                                    <td>
                                                        {{ number_format($item->hotel_cost + $item->relay_cost + $item->airline_cost + (int) $item->expenses->sum('cost')) }}
                                                    </td>

                                                    <td>
                                                        {{ number_format($item->revenues) }}
                                                    </td>

                                                    <td>
                                                        {{ number_format($item->revenues - ($item->hotel_cost + $item->relay_cost + $item->airline_cost + (int) $item->expenses->sum('cost'))) }}
                                                    </td>
                                                    <td>{{ $item->status == 0 ? 'لم يتم السفر' : 'تم السفر' }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                    @if ($regiments->count() > 1)
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th> اجمالي الافواج</th>
                                                        <th> اجمالي الايام</th>
                                                        <th> اجمالي الافراد </th>
                                                        <th>تكلفة الفنادق </th>
                                                        <th>تكلفة الترحيل </th>
                                                        <th>تكلفة الطيران </th>
                                                        <th> التكاليف الاضافية </th>
                                                        <th> الاجمالي الكلي للتكاليف </th>
                                                        <th> اجمالي الايرادات </th>
                                                        <th> اجمالي الربح / الخسارة </th>
                                                        <th> حالة تم السفر </th>
                                                        <th> حالة لم يتم السفر </th>
                                                    </tr>
                                                </thead>
                                                </tbody>
                                                <tr>
                                                    <td>{{ number_format($regiments->count()) }}</td>
                                                    <td>{{ number_format($regiments->sum('num_day')) }}</td>
                                                    <td>{{ number_format($beneficiaryCount) }}</td>
                                                    <td>{{ number_format($regiments->sum('hotel_cost')) }}</td>
                                                    <td>{{ number_format($regiments->sum('relay_cost')) }}</td>
                                                    <td>{{ number_format($regiments->sum('airline_cost')) }}</td>
                                                    <td>{{ number_format($expensesCount) }}</td>
                                                    <td>
                                                        {{ number_format(
                                                            $regiments->sum('hotel_cost') +
                                                                $regiments->sum('relay_cost') +
                                                                $regiments->sum('airline_cost') +
                                                                (int) $expensesCount,
                                                        ) }}
                                                    </td>
                                                    <td>{{ number_format($regiments->sum('revenues')) }}</td>
                                                    <td>{{ number_format(
                                                        $regiments->sum('revenues') -
                                                            ($regiments->sum('hotel_cost') +
                                                                $regiments->sum('relay_cost') +
                                                                $regiments->sum('airline_cost') +
                                                                (int) $expensesCount),
                                                    ) }}
                                                    </td>
                                                    <td>{{ number_format($count_1) }}</td>
                                                    <td>{{ number_format($count_0) }}</td>
                                                </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /page content -->

                    <!-- footer content -->
                    <footer class="hidden-print" style="margin-right: 0">
                        <div class="pull-left">
                            كل الحقوق محفوظة
                            <a href="#">شركة سوداكود</a>
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <!-- /footer content -->
                </div>
            </div>

            @include('layouts.js')
            @yield('after_js')

</body>

</html>
