<!DOCTYPE html>
<html lang="fa" dir="rtl">
@include('layouts.head')
<style>
    @media print{
         .x_title{
            display: none;

        }
        .hidde_print{
            display: none;
        }

        body ,h4{
            font-size: 18px
        }
    }

</style>
<!-- /header content -->
<body class="nav-md">
<div class="container body">
    <div class="main_container">

        <div class="right_col" role="main" style="padding-top: 20px; margin-right: 0">

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">

                            <div class="x_title">
                                <h2 style="display: contents">
                                    طلب عمرة
                                </h2>

                                <button onClick="window.print()" style="padding-left: 20px; padding-right: 20px" class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="طباعة">
                                    <i class="fa fa-print" style="margin-left:5px; margin-right:5px"></i>طباعة</button>



                                        <a href="{{route('process.index')}}" style="padding-left: 20px; padding-right: 20px" class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="رجوع">
                                                                        <i class="fa fa-arrow-left " style="margin-left:5px; margin-right:5px"></i>رجوع</a>

                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">

                                <div class="bs-example" data-example-id="simple-jumbotron">
                                    <div class="jumbotron">
                                        <div>
                                            <div>
                                                <p style="float: right">{{Helper::GeneralSiteSettings('office_name')}}</p>
                                                <p style="float: left">التاريخ : {{Carbon\Carbon::now()->format('Y/m/d')}}</p>
                                            </div>
                                            <div style="clear:both">
                                                <p style="float: right">{{Helper::GeneralSiteSettings('address')}}</p>
                                            </div>

                                            <div class="text-center" style="clear:both">
                                                <img style="width: 200px; object-fit: cover" src="{{ asset('uploads/setting/'.Helper::GeneralSiteSettings('logo')) }}" alt="">
                                            </div>
                                        </div>
                                    <h2 class="text-center" style="clear:both; margin-top:30px">  طلب عمرة</h2>
                                        <table class="table table-bordered text-center" style="width: 100% " >
                                            <tr class="">
                                                <td>1</td>
                                                <td>اسم صاحب طلب العمرة</td>
                                                <td>{{$process->beneficiary}}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>رقم الهاتف</td>
                                                <td>{{$process->beneficiary_phone}}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>تاريخ استلام الطلب</td>
                                                <td>{{$process->created_at}}</td>
                                            </tr>

                                            <tr class="hidde_print">
                                                <td>4</td>
                                                <td>نوع الطلب</td>
                                                <td>{{$process->type->name}}</td>
                                            </tr>

                                            <tr class="hidde_print">
                                                <td>5</td>
                                                <td>رقم التأشيرة </td>
                                                <td>{{$process->visa_number}}</td>
                                            </tr>

                                            <tr class="hidde_print">
                                                <td>6</td>
                                                <td>ملاحظات</td>
                                                <td>{{$process->notes}}</td>
                                            </tr>

                                        </table>

                                    <div style="margin:40px; padding-bottom: 70px">
                                        <div>
                                            <div class="" style="float: right;">
                                                <p>صاحب المعاملة </p>
                                                <h4>الاسم /</h4>
                                                <h4>التوقيع  /</h4>
                                                <h4>التاريخ /</h4>
                                            </div>

                                                <div style="float: left">
                                                <p>مدير مكتب الاستخدام </p>
                                                <h4>الاسم /</h4>
                                                <h4>التوقيع  /</h4>
                                                <h4>التاريخ /</h4>
                                            </div>
                                        </div>
                                    </div>

                                    </div>
                                </div>

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









