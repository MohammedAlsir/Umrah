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
                                <h2> المستفيدين

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
                                    <table id="datatable-keytable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>الرقم</th>
                                                <th>الاسم </th>
                                                <th> شركة الطيران</th>
                                                <th> رقم التأشيرة</th>
                                                <th> الحالة</th>
                                                <th>السعر</th>
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
                                                    <td>{{ $item->price }}</td>

                                                </tr>
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
