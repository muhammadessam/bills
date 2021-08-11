@props(['name','id'=>$name,'value','label', 'holder'=>$name.' input'])
<div class="input-group mb-4">
    <div class="input-group-prepend">
        <span class="input-group-text" id="{{$id}}-span">{{$label}}</span>
    </div>
    <input type="text" name="{{$name}}" step="any" class="form-control" placeholder="{{$holder}}" aria-label="{{$holder}}" value="{{$value}}">
</div>
