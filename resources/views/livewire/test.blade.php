<div>
    <div class="container">

    <div class="form-group col-md-6">
        <label class="control-label col-md-2 col-sm-2 col-xs-3">المبلغ المطلوب </label>
        <div class="col-md-10 col-sm-10 col-xs-9">

            <input  class="form-control">

        </div>
    </div>


    <div class="form-group col-md-6">
        <label class="control-label col-md-2 col-sm-2 col-xs-3">المبلغ المتبقي</label>
        <div class="col-md-10 col-sm-10 col-xs-9">
            <input  required type="text" value="{{$count}}" name="date" class="form-control">{{$count}}
        </div>
    </div>

    <div style="text-align: center">
        <button onclick="event.preventDefault()"  wire:click="increment">+</button>
        <h1>{{ $count }}</h1>
    </div>
</div>
