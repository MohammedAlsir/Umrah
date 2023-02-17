<div>
     @foreach ($daily_restrictions->where('debtor',$item_id_send)->get() as $one)
        <tr>
            {{-- <th scope="row">{{$id_check++}}</th> --}}
            <td>{{$one->registration_number}}</td>
            <td>{{$one->debtors->tree4_name}}</td>
            <td>{{$one->Creditors->tree4_name}}</td>
            <td>{{ number_format($one->price  , 2)}}</td>
            <td>{{$one->date}}</td>
            <td>{{$one->Statement}}</td>
        </tr>
    @endforeach
        {{-- @foreach ($daily_restrictions->where('Creditor',$item_id_send->Creditor)->get() as $one)
        <tr>
            <th scope="row">{{$id_check++}}</th>
            <td>{{$one->registration_number}}</td>
            <td>{{$one->debtors->tree4_name}}</td>
            <td>{{$one->Creditors->tree4_name}}</td>
            <td>{{ number_format($one->price  , 2)}}</td>
            <td>{{$one->date}}</td>
            <td>{{$one->Statement}}</td>
        </tr>
    @endforeach --}}
</div>
