<!DOCTYPE html>
<html lang="fa" dir="rtl">
@include('layouts.head')
<style>
     .visable_print{
        display: none;
    }
    @media print{
         .x_title,
         .hide_print{
            display: none;
        }
        .visable_print{
            display: contents;
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



                                        <a  href="{{route('reports.process')}}" style="padding-left: 20px; padding-right: 20px" class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="رجوع">
                                                                        <i class="fa fa-arrow-left " style="margin-left:5px; margin-right:5px"></i>رجوع</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="table-responsive" >
                                <table class="table table-bordered" >
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم الوكيل</th>
                                        {{-- <th>رقم هاتف الوكيل</th> --}}
                                        <th> اسم  المستفيد</th>
                                        <th>  رقم هاتف المستفيد</th>
                                        <th>نوع المعاملة</th>
                                        <th> الحالة</th>
                                        <th class="hide_print">تكلفة المعاملة</th>
                                        <th class="hide_print">التأمين</th>
                                        <th class="hide_print">سعر الدولار</th>
                                        <th class="hide_print">تكاليف اخرى</th>
                                        <th class="hide_print"> اجمالى التكلفة  </th>

                                        <th>مبلغ الاتفاق</th>
                                        <th>ملاحظات</th>
                                        <th> التاريخ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $total_sd =0;
                                            ?>
                                    @foreach ($process as $item)
                                        <tr>
                                            <th scope="row">{{$id++}}</th>
                                            <th>{{$item->agent->name}}</th>
                                            {{-- <th>{{$item->agent->phone}}</th> --}}
                                            <th>{{$item->beneficiary}}</th>
                                            <th>{{$item->beneficiary_phone}}</th>
                                            <th>{{$item->type->name}}</th>
                                            <th>{{$item->status}}</th>
                                            <th class="hide_print">{{number_format($item->type->price)}}$</th>
                                            <th class="hide_print">{{number_format($item->insurance_amount)}}$</th>
                                            <th class="hide_print">{{number_format($item->dollar_price,1)}}</th>
                                            <th class="hide_print">{{number_format($item->other_costs)}}</th>
                                            <th class="hide_print">{{number_format($item->total_boundsd)}}</th>
                                            <th>{{number_format($item->agreement_amount)}}</th>
                                            <th>{{$item->notes}}</th>
                                            <th>{{$item->created_at}}</th>
                                        </tr>
                                    @endforeach
                                        {{-- <tr>
                                            <th>#</th>
                                            <th colspan="8">اجمالى التكلفة </th>
                                            <th>{{number_format($process->sum('total_boundsd') )}}</th>
                                            <th></th>
                                            <th></th>

                                        </tr>

                                        <tr>
                                            <th>#</th>
                                            <th colspan="9">اجمالي مبالغ الاتفاق </th>
                                            <th>{{number_format($process->sum('agreement_amount') )}}</th>
                                            <th></th>


                                        </tr> --}}


                                        <tr class="hide_print">
                                            <th>#</th>
                                            <th colspan="8">الاجمالي   </th>
                                            <th class="">{{number_format($process->sum('total_boundsd') )}}</th>

                                            <th>{{number_format($process->sum('agreement_amount') )}}</th>
                                            <th></th>

                                        </tr>

                                        <tr class="visable_print">
                                            <th>#</th>
                                            <th colspan="4">الاجمالي   </th>
                                            {{-- <th class="">{{number_format($process->sum('total_boundsd') )}}</th> --}}

                                            <th>{{number_format($process->sum('agreement_amount') )}}</th>
                                            <th></th>
                                            <th></th>

                                        </tr>

                                        {{-- <tr class="visable_print">
                                            <th>#</th>
                                            <th colspan="7">الاجمالي   </th>

                                            <th>{{number_format($process->sum('agreement_amount') )}}</th>
                                            <th></th>

                                        </tr> --}}


                                    </tbody>
                                </table>

                                <table class="table table-bordered hide_print">
                                     <tr>
                                            <th>#</th>
                                            <th colspan="8">الاجمالي في المكتب   </th>
                                            <th>{{number_format($process->sum('agreement_amount') - $process->sum('total_boundsd') )}}</th>

                                            {{-- <th>{{number_format($process->sum('agreement_amount') )}}</th> --}}
                                            {{-- <th></th> --}}

                                        </tr>

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









