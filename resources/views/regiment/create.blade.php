@extends('layouts.main')

@push('scripts')
    <script src="{{ asset('build/js/jquery.repeater.js') }}"></script>
@endpush

@section('content')
    {{-- @include('sweetalert::alert') --}}
    <div class="x_panel">
        <div class="x_title">
            <h2>إضافة فوج جديد
                {{-- <small> </small> --}}
            </h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />

            <form class="form " method="POST" action="{{ route('regiment.store') }}">
                @csrf
                <div class="form-group row" style="margin-bottom: 10px">
                    <div class="col-md-10">
                        <label class="control-label " for="name"> رقم الفوج
                        </label>
                        <input type="text" disabled class="form-control col-md-7 col-xs-12" value="{{ $last_regiment }}">
                    </div>
                </div>
                <div class="repeater-default">
                    <div data-repeater-list="list_bennficiary">
                        <div data-repeater-item>
                            <div class="row justify-content-between">

                                <div class="form-group">


                                    <div class="col-md-5" style="margin-bottom:10px">
                                        <label class="control-label " for="airline_name"> المستفيد
                                        </label>
                                        <select name="bennficiary" required class="  form-control col-md-7 col-xs-12">
                                            <option value="">اختر المستفيد</option>
                                            @foreach ($process as $proces)
                                                <option value="{{ $proces->id }}">{{ $proces->beneficiary }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div>
                                <div class="col-md-1 form-group" style="margin-top:13px">
                                    <button class="btn btn-danger" data-repeater-delete type="button"> <i
                                            class="bx bx-x"></i>
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <hr>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col p-0">
                            <button class="btn btn-secondary" data-repeater-create-2 type="button"><i
                                    class="bx bx-plus"></i>
                                اضافة مستفيد جديد
                            </button>
                        </div>
                    </div>
                </div>



                <div class="row justify-content-between">

                    <div class="form-group">

                        <div class="col-md-5" style="margin-bottom:10px">
                            <label class="control-label " for="num_day"> عدد الايام
                                <span class="required">*</span>
                            </label>
                            <input type="text" name="num_day" id="num_day" required="required"
                                class="form-control col-md-7 col-xs-12" value="">
                        </div>

                        <div class="col-md-5" style="margin-bottom:10px">
                            <label class="control-label " for="hotel_cost"> تكلفة الفندق
                                <span class="required">*</span>
                            </label>
                            <input type="text" name="hotel_cost" id="hotel_cost" required="required"
                                class="form-control col-md-7 col-xs-12" value="">
                        </div>

                        <div class="col-md-5" style="margin-bottom:10px">
                            <label class="control-label " for="relay_cost"> تكلفة الترحيل
                                <span class="required">*</span>
                            </label>
                            <input type="text" name="relay_cost" id="relay_cost" required="required"
                                class="form-control col-md-7 col-xs-12" value="">
                        </div>

                        <div class="col-md-5" style="margin-bottom:10px">
                            <label class="control-label " for="airline_name"> شركة الطيران
                            </label>
                            <select name="airline_name" r class="form-control col-md-7 col-xs-12">
                                <option value="">اختر شركة الطيران</option>
                                @foreach ($companies as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-5" style="margin-bottom:10px">
                            <label class="control-label " for="airline_cost"> تكلفة الطيران
                            </label>
                            <input type="text" name="airline_cost" id="airline_cost"
                                class="form-control col-md-7 col-xs-12" value="">
                        </div>

                        <div class="col-md-5" style="margin-bottom:10px">
                            <label class="control-label " for="airline_name"> خصم من
                            </label>
                            <select name="tree4_code" required class="form-control col-md-7 col-xs-12">
                                <option value="">اختر الحساب</option>
                                @foreach ($trees as $tree)
                                    <option value="{{ $tree->tree4_code }}">{{ $tree->tree4_name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="col-md-10" style="margin-bottom:10px">
                        <label class="control-label " for="revenues"> اجمالي ايرادات الفوج
                            <span class="required">*</span>
                        </label>
                        <input type="number" name="revenues" id="revenues" required="required"
                            class="form-control col-md-12 col-xs-12" value="">
                    </div>

                    <div class="col-md-10" style="margin-bottom:10px">
                        <label class="control-label " for="Statement"> البيان
                        </label>
                        <textarea type="text" name="Statement" rows="5" id="Statement" class="form-control col-md-7 col-xs-12"></textarea>
                    </div>





                </div>

                <div class="repeater-expenses">
                    <div data-repeater-list="list_expenses">
                        <div data-repeater-item>
                            <div class="row justify-content-between">

                                <div class="form-group">


                                    <div class="col-md-5" style="margin-bottom:10px">
                                        <label class="control-label " for="expenses_name"> الاسم
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" name="expenses_name" id="expenses_name"
                                            required="required" class="form-control col-md-7 col-xs-12" value="">
                                    </div>

                                    <div class="col-md-5" style="margin-bottom:10px">
                                        <label class="control-label " for="expenses_cost"> المبلغ
                                            <span class="required">*</span>
                                        </label>
                                        <input type="number" name="expenses_cost" id="expenses_cost"
                                            required="required" class="form-control col-md-7 col-xs-12" value="">
                                    </div>


                                </div>
                                <div class="col-md-1 form-group" style="margin-top:13px">
                                    <button class="btn btn-danger" data-repeater-delete type="button"> <i
                                            class="bx bx-x"></i>
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <hr>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col p-0">
                            <button class="btn btn-secondary" data-repeater-create-2 type="button"><i
                                    class="bx bx-plus"></i>
                                اضافة تكاليف اضافية
                            </button>
                        </div>
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        {{-- <button type="submit" class="btn btn-primary">انصراف</button> --}}
                        <button type="submit" id="Swal" class="btn btn-success btn-block">إضافة</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
