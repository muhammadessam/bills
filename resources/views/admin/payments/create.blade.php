@extends('layouts.master')
@section('title', 'المدير / المدفوعات / انشاء')
@section('content')
    <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12" style="margin:0 auto 24px auto">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>انشاء مدفوعة جديدة</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="{{route('admin.payment.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="amount">القمية :</label>
                            <input type="number" class="form-control" id="amount" name="amount" value="{{old('amount', '')}}" placeholder="قيمة المدفوعات ">
                            @error('amount')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="released_at">تاريخ الانشاء : </label>
                            <input type="date" class="form-control" id="released_at" name="released_at" value="{{old('released_at', '')}}" placeholder="تاريخ الانشاء">
                            @error('released_at')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="bill_id">رقم الفاتورة : </label>
                            <select class="form-control selectpicker" data-live-search="true" name="bill_id" id="bill_id">
                                @foreach(\App\Models\Bill::all() as $bill)
                                    <option value="{{$bill['id']}}">{{$bill['number']}}</option>
                                @endforeach
                            </select>
                            @error('bill_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="custom-file-container m-auto" data-upload-id="myFirstImage">
                            <label>صور الايصال <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="photo" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">حفظ</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        var firstUpload = new FileUploadWithPreview('myFirstImage')
    </script>
@endpush
