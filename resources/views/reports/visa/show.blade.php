<!DOCTYPE html>
<html lang="fa" dir="rtl">
@include('layouts.head')
<style>
    @media print{
         .x_title{
            display: none;
        }
    }
     td,th {
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
                            <h2> تقرير التأشيرات

                            </h2>
                             <button onClick="window.print()" style="padding-left: 20px; padding-right: 20px" class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="طباعة">
                                    <i class="fa fa-print" style="margin-left:5px; margin-right:5px"></i>طباعة</button>



                                        <a  href="{{route('reports.visa')}}" style="padding-left: 20px; padding-right: 20px" class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="رجوع">
                                                                        <i class="fa fa-arrow-left " style="margin-left:5px; margin-right:5px"></i>رجوع</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="table-responsive">

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم الوكيل</th>
                                        <th>رقم هاتف الوكيل</th>
                                        <th>رقم التأشيرة</th>
                                        <th>حالة التأشيرة</th>
                                        <th> اسم  الكفيل</th>
                                        <th> عنوان الكفيل</th>
                                        <th>رقم هاتف الكفيل</th>
                                        <th>رقم السجل </th>
                                        <th> المهنة</th>
                                        <th> اسم صاحب الجواز</th>
                                        <th> ملاحظات</th>
                                        <th> التاريخ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($visas as $item)
                                        <tr>
                                            <th scope="row">{{$id++}}</th>
                                            @if ($item->agent_id !='')
                                                <td>{{$item->agent->name}}</td>
                                                <td>{{$item->agent->phone}}</>
                                            @else
                                                <td>{{$item->agent_second_name}}</td>
                                                <td>{{$item->agent_second_phone}}</>
                                            @endif
                                            <td>{{$item->visa_number}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>{{$item->guarantor_name}}</td>
                                            <td>{{$item->guarantor_address}}</td>
                                            <td>{{$item->guarantor_number}}</td>
                                            <td>{{$item->record_number}}</td>
                                            <td>{{$item->work}}</td>
                                            <td>{{$item->passport_name}}</td>
                                            <td>{{$item->notes}}</td>
                                            <td>{{$item->created_at}}</td>
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
        <!-- /page content -->

        <!-- footer content -->
        <footer class="hidden-print" style="margin-right: 0">
            <div class="pull-left">
            كل الحقوق محفوظة
                <a
                    href="#">شركة سوداكود</a>
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









