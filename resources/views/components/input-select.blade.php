@props(['collection', 'label', 'name', 'value'=>null])
<div class="input-group mb-4">
    <div class="input-group-prepend">
        <span class="input-group-text" id="pw-span">{{$label}}</span>
    </div>
    <select name="{{$name}}" class="selectpicker form-control">
        @foreach($collection as $key => $item)
            <option value="{{$key}}" {{$value  === $key ? 'selected' : ''}}>{{$item}}</option>
        @endforeach
    </select>
</div>

@push('javascript')
    <script src="{{asset('assets/plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
@endpush
@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/bootstrap-select/bootstrap-select.min.css')}}">
    <style>
        .bootstrap-select.btn-group > .dropdown-toggle {
            margin-bottom: 0px !important;
        }

        .bootstrap-select {
            width: 80% !important;
        }
    </style>
@endpush
