<div>
    <div class="form-group col-md-6">
        <label class="control-label col-md-2 col-sm-2 col-xs-3">من حساب </label>
        <div class="col-md-10 col-sm-10 col-xs-9">
            <select   wire:model="selectedState" required name="Creditor" class="form-control">
                <option value="">اختر حساب </option>
                @foreach ($tree4 as $tree)
                    <option value="{{$tree->tree4_code}}">{{$tree->tree4_name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group col-md-6">
        <label class="control-label col-md-2 col-sm-2 col-xs-3">الى حساب</label>
        <div class="col-md-10 col-sm-10 col-xs-9">
            <select  required  name="debtor" class="form-control">
                <option value="" selected>اختر حساب </option>
                @foreach ($tree4_2 as $tree)
                        <option value="{{$tree->tree4_code}}">{{$tree->tree4_name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="container" style="padding: 4px;">

        <div class="form-group col-md-4">
            <label class="control-label col-md-3 col-sm-2 col-xs-3">الاجمالي</label>
            <div class="col-md-9 col-sm-10 col-xs-9">
                <input wire:model="Total" disabled  class="form-control">
            </div>
        </div>


        <div class="form-group col-md-4">
            <label class="control-label col-md-3 col-sm-2 col-xs-3"> المدفوع </label>
            <div class="col-md-9 col-sm-10 col-xs-9">
                <input wire:model="paid_up" disabled  class="form-control">
            </div>
        </div>

        <div class="form-group col-md-4">
            <label class="control-label col-md-3 col-sm-2 col-xs-3"> المتبقي </label>
            <div class="col-md-9 col-sm-10 col-xs-9">
                <input wire:model="residual" value="{{$residual}}" name="residual" readonly  class="form-control">
                <input wire:model="residual_2" type="hidden" value="{{$residual_2}}" name="residual_2" readonly  class="form-control">
            </div>
        </div>
    </div>

    <div class="container">

        <div class="form-group col-md-6">
            <label class="control-label col-md-2 col-sm-2 col-xs-3">المبلغ </label>
            <div class="col-md-5 col-sm-5 col-xs-9">
                <input wire:model="price" required type="number" min="1"  name="price" class="form-control">
            </div>
           {{-- @error('price') <span class="error">{{ $message }}</span> @enderror --}}
            <div class="col-md-5 col-sm-5 col-xs-9">
                <input value="{{number_format((float)$price)}}"  readonly class="form-control">
            </div>
        </div>

        <div class="form-group col-md-6">
            <label class="control-label col-md-2 col-sm-2 col-xs-3">التاريخ</label>
            <div class="col-md-10 col-sm-10 col-xs-9">
                <input required type="date" name="date" class="form-control">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="form-group col-md-12">
            <label class="control-label col-md-1 col-sm-2 col-xs-3">البيان</label>
            <div class="col-md-11 col-sm-10 col-xs-9">
                <textarea  rows="5" name="Statement" class="form-control"></textarea>
            </div>
        </div>
    </div>


    <div class="ln_solid"></div>

    <div class="form-group">
        <div class="col-md-12">
            <button type="submit" class="btn btn-success btn-block">إضافة</button>
        </div>
    </div>
</div>




