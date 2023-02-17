<!DOCTYPE html>
<html lang="fa" dir="rtl">
@include('layouts.head')
<style>
    @media print{
         .x_title{
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
                                    دفعيات الوكلاء
                                </h2>

                                <button onClick="window.print()" style="padding-left: 20px; padding-right: 20px" class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="طباعة">
                                    <i class="fa fa-print" style="margin-left:5px; margin-right:5px"></i>طباعة</button>



                                        <a  href="{{route('agent_payment.index')}}" style="padding-left: 20px; padding-right: 20px" class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="رجوع">
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
                                                <p style="float: left">رقم الدفعية : {{$daily->registration_number}}</p>
                                            </div>

                                            <div class="text-center" style="clear:both">
                                                <img style="width: 200px; object-fit: cover" src="{{ asset('uploads/setting/'.Helper::GeneralSiteSettings('logo')) }}" alt="">
                                            </div>
                                        </div>
                                    <h2 class="text-center" style="clear:both; margin-top:30px">دفعيات الوكلاء</h2>
                                        <table class="table table-bordered text-center" style="width: 100% " >
                                            <tr>
                                                <td>تاريخ الدفع</td>
                                                <td>رقم الدفعية</td>
                                                <td>المبلغ</td>

                                                <td>من حساب </td>
                                                <td>الى حساب</td>

                                                <td>البيان</td>

                                            </tr>
                                            <tr>
                                                <td>{{ $daily->date}}</td>
                                                <td>{{$daily->registration_number}}</td>
                                                <td>{{number_format($daily->price,2)}}</td>

                                                <td>{{$daily->Creditors->tree4_name}}</td>
                                                <td>{{$daily->debtors->tree4_name}}</td>
                                                <td>{{$daily->Statement}}</td>

                                            </tr>
                                            <tr>
                                                <td colspan="2">الجملة</td>
                                                <td>{{number_format($daily->price,2)}}</td>
                                                <td colspan="3">{{$numberTransformer->toWords($daily->price); }} &nbsp;<span>جنيه سوداني لا غير</span></td>

                                            </tr>
                                        </table>

                                    <div style="margin:40px; padding-bottom: 40px">
                                        <div>
                                            <div class="" style="float: right;">
                                                <p>المستلم .......................................</p>
                                            </div>

                                                <div style="float: left">
                                                <p>التوقيع ............................................</p>
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









