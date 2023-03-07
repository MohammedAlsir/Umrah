<div class="col-md-3 left_col hidden-print">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('home') }}" class="site_title"><i class="fa fa-paw"></i> <span>سوداكود</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset('uploads/profile/' . auth()->user()->photo) }}"
                    style="width: 56px; height: 56px;object-fit: cover;" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>مرحبا بك</span>
                <h2>{{ Auth()->user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>القائمة الرئيسية</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>الصفحة الرئيسية</a></li>

                    @if (auth()->user()->agent_status == 'on')
                        <li><a><i class="fa fa-id-card-o"></i> إدارة الوكلاء <span
                                    class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('agents.index') }}">كل الوكلاء</a></li>
                                <li><a href="{{ route('agents.create') }}">إضافة وكيل جديد</a></li>
                            </ul>
                        </li>
                    @endif

                    @if (auth()->user()->regiment_status == 'on')
                        <li><a><i class="fa fa-id-card-o"></i> إدارة الافواج <span
                                    class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('regiment.index') }}">كل الافواج</a></li>
                                <li><a href="{{ route('regiment.create') }}">إضافة فوج جديد</a></li>
                            </ul>
                        </li>
                    @endif


                    {{-- <li><a><i class="fa fa-id-card-o"></i> إدارة المستفيدين <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('beneficiary.index') }}">كل المستفيدين</a></li>
                            <li><a href="{{ route('beneficiary.create') }}">إضافة مستفيد جديد</a></li>
                        </ul>
                    </li> --}}

                    @if (auth()->user()->company_status == 'on')
                        <li><a><i class="fa fa-id-card-o"></i> إدارة الشركات <span
                                    class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('company.index') }}">كل الشركات</a></li>
                                <li><a href="{{ route('company.create') }}">إضافة شركة جديدة</a></li>
                            </ul>
                        </li>
                    @endif

                    @if (auth()->user()->requirement_status == 'on')
                        {{--  --}}
                        <li><a><i class="fa fa-id-card-o"></i> إدارة المتطلبات <span
                                    class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('requirement.index') }}">كل المتطلبات</a></li>
                                <li><a href="{{ route('requirement.create') }}">إضافة متطلبات جديدة</a></li>
                            </ul>
                        </li>
                        {{--  --}}
                    @endif

                    @if (auth()->user()->process_status == 'on')
                        <li><a><i class="fa fa-tasks"></i> إدارة أنواع الطلبات <span
                                    class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('type_process.index') }}">كل الأنواع</a></li>
                                <li><a href="{{ route('type_process.create') }}">إضافة نوع عمرة جديد</a></li>
                            </ul>
                        </li>

                        <li><a><i class="fa fa-bookmark"></i>إدارة حالة الطلبات<span
                                    class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('status.index') }}">كل الحالات </a></li>
                                <li><a href="{{ route('status.create') }}">إضافة حالة جديدة</a></li>
                            </ul>
                        </li>

                        <li><a><i class="fa fa-exchange"></i> إدارة طلبات العمرة <span
                                    class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('process.index') }}">كل الطلبات</a></li>
                                <li><a href="{{ route('process.create') }}">إضافة طلب جديد</a></li>
                            </ul>
                        </li>
                    @endif
                    @if (auth()->user()->ticket_status == 'on')
                        <li><a><i class="fa fa-exchange"></i> إدارة التذاكر <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('ticket.index') }}">كل الحجوزات</a></li>
                                <li><a href="{{ route('ticket.create') }}">إضافة حجز جديد</a></li>
                            </ul>
                        </li>
                    @endif

                    {{-- @if (auth()->user()->visa_status == 'on')
                        <li><a><i class="fa fa-plane"></i> إدارة التأشيرات  <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('visas.index')}}">كل التأشيرات</a></li>
                                <li><a href="{{route('visas.create')}}">إضافة تأشيرة جديدة</a></li>
                            </ul>
                        </li>
                    @endif --}}

                    @if (auth()->user()->final_delivery_status == 'on')
                        <li><a><i class="fa fa-handshake-o"></i>التسليم النهائي<span
                                    class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('final_delivery.index') }}"> طلبات العمرة</a></li>
                                {{-- <li><a href="{{route('visas.create')}}">إضافة تأشيرة جديدة</a></li> --}}
                            </ul>
                        </li>
                    @endif


                    @if (auth()->user()->trees_status == 'on')
                        <li><a><i class="fa  fa-sitemap"></i>شجرة الحسابات<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li class="sub_menu"><a href="{{ route('tree1.index') }}">المستوي الاول </a>
                                </li>
                                <li><a href="{{ route('tree2.index') }}">المستوي الثاني</a>
                                </li>
                                <li><a href="{{ route('tree3.index') }}">المستوي الثالث</a>
                                </li>
                                <li><a href="{{ route('tree4.index') }}">المستوي الرابع</a>
                                </li>
                            </ul>
                        </li>
                    @endif


                    @if (auth()->user()->accounts_status == 'on')
                        <li><a><i class="fa fa-usd"></i>الحسابات<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">

                                <li class="sub_menu"><a href="{{ route('daily_restrictions.index') }}">قيود اليومية</a>
                                </li>
                                <li class="sub_menu"><a href="{{ route('agent_payment.index') }}">دفعيات الوكلاء</a>
                                </li>


                                <li><a>السندات<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('receipt') }}">سندات القبض</a></li>
                                        <li><a href="{{ route('exchange') }}">سندات الصرف</a></li>
                                    </ul>
                                </li>
                                <li class="sub_menu"><a href="{{ route('Account_statement.index') }}">كشف حساب
                                        الوكلاء</a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if (auth()->user()->check_account_status == 'on')
                        <li><a><i class="fa fa-money"></i>كشف حساب <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('statement') }}">كشف حساب </a></li>
                                {{-- <li><a href="{{route('users.create')}}">إضافة مستخدم جديد</a></li> --}}
                            </ul>
                        </li>
                    @endif

                    @if (auth()->user()->users_status == 'on')
                        <li><a><i class="fa fa-user-o"></i> إدارة المستخدمين <span
                                    class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('users.index') }}">كل المستخدمين</a></li>
                                <li><a href="{{ route('users.create') }}">إضافة مستخدم جديد</a></li>
                            </ul>
                        </li>
                    @endif

                    @if (auth()->user()->report_status == 'on')
                        <li><a><i class="fa fa-file-text-o"></i>التقارير<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                {{-- <li><a href="{{route('reports.visa')}}">تقرير عن التأشيرات </a></li> --}}
                                <li><a href="{{ route('reports.process') }}">تقرير طلبات العمرة </a></li>
                                <li><a href="{{ route('reports.regiment') }}">تقرير الافواج </a></li>
                                <li><a href="{{ route('reports.ticket') }}">تقرير التذاكر </a></li>
                            </ul>
                        </li>
                    @endif


                </ul>
            </div>
            <div class="menu_section">
                <h3>بيانات الموقع</h3>
                <ul class="nav side-menu">


                    @if (auth()->user()->dollar_price_status == 'on')
                        <li><a href="{{ route('dollar_price') }}"><i class="fa fa-usd"></i> أسعار العملات اليوم </a>
                        </li>
                    @endif

                    @if (auth()->user()->setting_status == 'on')
                        <li><a href="{{ route('settings') }}"><i class="fa fa-cogs "></i>البيانات الاساسية</a></li>
                    @endif
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            {{-- <a data-toggle="tooltip" data-placement="top" >
                <span class="glyphicon" aria-hidden="true"></span>
            </a> --}}
            <a data-toggle="tooltip" data-placement="top" title="شاشة كاملة" onclick="toggleFullScreen();">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="قفل" class="lock_btn">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="تسجيل الخروج" href="{{ route('logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
