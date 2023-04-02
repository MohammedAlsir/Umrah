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
                                <h2> تقرير التذاكر

                                </h2>
                                <button onClick="window.print()" style="padding-left: 20px; padding-right: 20px"
                                    class="btn btn-sm btn-default" type="button" data-placement="top"
                                    data-toggle="tooltip" data-original-title="طباعة">
                                    <i class="fa fa-print" style="margin-left:5px; margin-right:5px"></i>طباعة</button>

                                <a href="{{ route('reports.ticket') }}" style="padding-left: 20px; padding-right: 20px"
                                    class="btn btn-sm btn-default" type="button" data-placement="top"
                                    data-toggle="tooltip" data-original-title="رجوع">
                                    <i class="fa fa-arrow-left " style="margin-left:5px; margin-right:5px"></i>رجوع</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>شركة الطيران</th>
                                                <th>عدد التذاكر </th>
                                                <th>المستفيدين</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tikets as $tiket)
                                                @foreach ($tiket as $item)
                                                    @if ($loop->first)
                                                        <tr>
                                                            <td>{{ $id++ }}</td>
                                                            <td>{{ $item->company->name }}</td>
                                                            <td>{{ $tiket->count() }}</td>
                                                            <td><a
                                                                    href="{{ route('reports.ticket.beneficiary', [$item->company->id, $user_id]) }}">المستفيدين</a>
                                                            </td>

                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach

                                        </tbody>
                                    </table>


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
