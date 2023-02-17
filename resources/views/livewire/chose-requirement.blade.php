<div>
    <div class="form-group container" style="margin-top:5px;">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">  المتطلبات
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12">

                @if($requirements)

                @foreach ($requirements as $item_two)
                    <div class="boxes">
                        <input disabled type="checkbox"

                            @foreach ($chose_requirements as $one_chosen)
                                {{$one_chosen->requirement_processes_id == $item_two->id ? 'checked':'' }}
                            @endforeach
                        value="{{$item_two->id}}" name="requirements[]" id="box-{{$item_two->id}}">
                        <label for="box-{{$item_two->id}}">{{$item_two->requirements->name}}</label>

                    </div>

                @endforeach

                @endif
        </div>

    </div>

</div>
