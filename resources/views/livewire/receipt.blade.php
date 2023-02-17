<div>
    <div class="form-group col-md-6">
        <label class="control-label col-md-2 col-sm-2 col-xs-3">من حساب </label>
        <div class="col-md-10 col-sm-10 col-xs-9">
            <select wire:model="selectedState" required name="Creditor" style="width: 100%" class=" form-control">
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
            <select required  name="debtor"style="width: 100%" class=" form-control">
                <option value="" selected>اختر حساب </option>
                @foreach ($tree4_2 as $tree)
                    {{-- @if (!is_null($selectedState)) --}}
                        <option value="{{$tree->tree4_code}}">{{$tree->tree4_name}}</option>
                    {{-- @endif --}}
                @endforeach
            </select>
        </div>
    </div>
</div>
