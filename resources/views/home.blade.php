@extends('layouts.main')
@section('content')
    <style>
        .icon_style {
            display: block !important;
            text-align: center;
            font-size: 40px !important;
        }
    </style>

    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count" style="text-align: center; margin-top: 10px">
            <span class="count_top"><i class="fa fa-id-card-o icon_style"></i> الوكلاء</span>
            <div class="count">{{ $agent }}</div>
            {{-- <span class="count_bottom"><i class="green">4% </i> از هفته گذشته</span> --}}
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count" style="text-align: center; margin-top: 10px">
            <span class="count_top"><i class="fa fa-plane icon_style"></i> طلبات العمرة</span>
            <div class="count">{{ $process->count() }}</div>
            {{-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> از هفته گذشته</span> --}}
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count" style="text-align: center; margin-top: 10px">
            <span class="count_top"><i class="fa fa-check-square icon_style"></i> الطلبات المسلمة</span>
            <div class="count green">{{ $ok }}</div>
            {{-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> از هفته گذشته</span> --}}
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count" style="text-align: center; margin-top: 10px">
            <span class="count_top"><i class="fa fa-window-close icon_style"></i>الطلبات غير المسلمة</span>
            <div class="count red">{{ $no }}</div>
            {{-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> از هفته گذشته</span> --}}
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count" style="text-align: center; margin-top: 10px">
            <span class="count_top"><i class="fa fa-university icon_style"></i> رصيد البنك</span>
            <div class="count">{{ number_format($bank) }}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count" style="text-align: center; margin-top: 10px">
            <span class="count_top"><i class="fa fa-money icon_style"></i> رصيد الخزنة</span>
            <div class="count">{{ number_format($cash) }}</div>
        </div>
    </div>

    <div class="row tile_count">
        <div class="col-md-12 col-sm-4 col-xs-6 tile_stats_count" style="text-align: center; margin-top: 10px">
            <span class="count_top"><i class="fa fa-users  icon_style"></i> الافواج </span>
            <div class="count">{{ number_format($count_1 + $count_0) }}</div>
        </div>
    </div>
    <div class="row tile_count">


        <div class="col-md-6 col-sm-4 col-xs-6 tile_stats_count" style="text-align: center; margin-top: 10px">
            <span class="count_top"><i style="color:green" class="fa fa-check  icon_style"></i> تم السفر</span>
            <div class="count">{{ number_format($count_1) }}</div>
        </div>

        <div class="col-md-6 col-sm-4 col-xs-6 tile_stats_count" style="text-align: center; margin-top: 10px">
            <span class="count_top"><i class="fa fa-check icon_style"></i> لم يتم السفر </span>
            <div class="count">{{ number_format($count_0) }}</div>
        </div>
    </div>

    <div class="row tile_count">




        <div style="margin-top: 50px" class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    {{-- @foreach ($types as $type) --}}
                    @php
                        $typejs = ['رضيع', 'طفل', 'بالغ'];
                        // $typejs [] = $type->name;
                        
                        // if($from==1 && $to==1){
                        $processjs = [$types1, $types2, $types3];
                        // $processjs []= $type->process->count();
                        // }else{
                        // $countersjs []= $sector->counters()->whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to)->count();
                        // }
                    @endphp

                    {{-- @endforeach --}}
                    @isset($typejs)
                        <script>
                            var $type_js = {!! json_encode($typejs) !!};
                        </script>
                    @endisset

                    @isset($processjs)
                        <script>
                            var $process_js = {!! json_encode($processjs) !!};
                        </script>
                    @endisset


                    <canvas id="myChart"></canvas>
                    {{-- <div id="echart_pie2" style="height: 350px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative; background: transparent;" _echarts_instance_="ec_1645396716956"><div style="position: relative; overflow: hidden; width: 290px; height: 350px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas width="290" height="350" data-zr-dom-id="zr_0" style="position: absolute; left: 0px; top: 0px; width: 290px; height: 350px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div style="position: absolute; display: none; border-style: solid; white-space: nowrap; z-index: 9999999; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s, top 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgba(0, 0, 0, 0.5); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font: 14px / 21px Arial, Verdana, sans-serif; padding: 5px; left: 21px; top: 200px;">Area Mode <br>rose2 : 5 (4.54%)</div></div> --}}

                </div>
            </div>
        </div>

        <div style="margin-top: 50px" class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">تنظیمات 1</a>
                                </li>
                                <li><a href="#">تنظیمات 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    @php
                        $ok = 0;
                        $no = 0;
                    @endphp
                    @foreach ($process as $proces)
                        @php
                            
                            // $typejs =['ss','ddd','sds','sfsf','dsaf'];
                            if ($proces->status == 1) {
                                $ok = $ok + 1;
                            }
                            
                            if ($proces->status == 0) {
                                $no = $no + 1;
                            }
                            
                        @endphp
                    @endforeach
                    <script>
                        var $ok2 = {!! json_encode($ok) !!};
                        var $no2 = {!! json_encode($no) !!};
                    </script>

                    <canvas id="myChart2"></canvas>
                    {{-- <div id="echart_pie2" style="height: 350px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative; background: transparent;" _echarts_instance_="ec_1645396716956"><div style="position: relative; overflow: hidden; width: 290px; height: 350px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas width="290" height="350" data-zr-dom-id="zr_0" style="position: absolute; left: 0px; top: 0px; width: 290px; height: 350px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div style="position: absolute; display: none; border-style: solid; white-space: nowrap; z-index: 9999999; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s, top 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgba(0, 0, 0, 0.5); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font: 14px / 21px Arial, Verdana, sans-serif; padding: 5px; left: 21px; top: 200px;">Area Mode <br>rose2 : 5 (4.54%)</div></div> --}}

                </div>
            </div>
        </div>
    </div>
@endsection

@section('after_js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
