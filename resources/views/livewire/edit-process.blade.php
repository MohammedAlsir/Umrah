<div>
    <style>
        .boxes {
            margin: auto;
            padding: 15px 70px 15px 70px;
            background: #3e5266;
        }

        /*Checkboxes styles*/
        input[type="checkbox"] {
            display: none;
        }

        input[type="checkbox"]+label {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 20px;
            /* font: 14px/20px 'Open Sans', Arial, sans-serif; */
            color: #fff;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }

        input[type="checkbox"]+label:last-child {
            margin-bottom: 0;
        }

        input[type="checkbox"]+label:before {
            content: '';
            display: block;
            width: 20px;
            height: 20px;
            border: 1px solid #fff;
            position: absolute;
            left: 0;
            top: 0;
            opacity: .6;
            -webkit-transition: all .12s, border-color .08s;
            transition: all .12s, border-color .08s;
        }

        input[type="checkbox"]:checked+label:before {
            width: 10px;
            top: -5px;
            left: 5px;
            border-radius: 0;
            opacity: 1;
            border-top-color: transparent;
            border-left-color: transparent;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    </style>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> نوع المعاملة
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select wire:click="change" required wire:model="selectedState" name="type_processe_id" style="width: 100%" class=" form-control">
                <option value="">اختر نوع المعاملة</option>

                @foreach ($type as $item)
                <option {{$process->type_processe_id == $item->id ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12"> المتطلبات
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">

            @if($requirements)

            @foreach ($requirements as $item)
            <div class="boxes">
                <input type="checkbox" @foreach ($chose_requirements as $one_chosen) {{$one_chosen->requirement_processes_id == $item->id ? 'checked':'' }} @endforeach value="{{$item->id}}" name="requirements[]" id="box-{{$item->id}}">
                <label for="box-{{$item->id}}">{{$item->requirements->name}}</label>

            </div>

            @endforeach

            @endif
        </div>

    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12"> سعر الدولار
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input readonly name="" value="{{ number_format($process->dollar_price,2)}}" class="form-control col-md-7 col-xs-12">
            <input type="hidden" name="dollar_price" value="{{ $process->dollar_price}}">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12"> سعر الريال
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input readonly name="" value="{{ number_format($process->sr_price,2)}}" class="form-control col-md-7 col-xs-12">
            <input type="hidden" name="sr_price" value="{{ $process->sr_price}}">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12"> التكلفة  بالدولار
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input readonly type="text" name="price_type" class="form-control col-md-7 col-xs-12" value="{{$process->price_type}}">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12"> التكلفة  بالريال
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12" style="display: none">
            <input readonly type="text" name="price_type_sr" class="form-control col-md-7 col-xs-12" value="{{$process->price_type_sr}}">
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <input readonly type="text" name="" class="form-control col-md-7 col-xs-12" value="{{number_format($process->price_type_sr)}}">
        </div>
    </div>



    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12"> إجمالي التكلفة بالجنيه
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{-- <input   name="total_boundsd" class="form-control col-md-7 col-xs-12" value="{{$process->total_boundsd}}"> --}}
            <input type="text" readonly name="" class="form-control col-md-7 col-xs-12" value="{{number_format($process->total_boundsd)}}">
            <input type="hidden"  name="total_boundsd_type" class="form-control col-md-7 col-xs-12" value="{{$process->total_boundsd}}">
        </div>
    </div>


</div>
