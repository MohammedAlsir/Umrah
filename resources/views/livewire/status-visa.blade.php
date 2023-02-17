
<td  style="width: 190px !important; margin: 60px" >
    <select   wire:model="selectedStatus"  name="" style="width: 100%" class="form-control">
        <option value="">اختر الحالة</option>
        @foreach ($status as $one)
            <option value="{{$one->name}}">{{$one->name}}</option>
        @endforeach

    </select>
</td>
