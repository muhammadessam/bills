@extends('layouts.master')
@section('title', 'المدير / الاعدادات')
@section('content')

    <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12" style="margin:0 auto 24px auto">
        <div class="statbox widget box box-shadow">

            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h2> الاعدادات</h2>
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area">
                <form action="{{route('admin.settings.store')}}" method="post">
                    @csrf
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">يتم التذكير كل </span>
                        </div>
                        <input type="text" value="{{old('notify_every', setting('notify_every'))}}" name="notify_every" class="form-control" aria-label="يتم ارسال الرسائل كل كام يوم">
                        <div class="input-group-append">
                            <span class="input-group-text">من الايام</span>
                        </div>
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">يجب ان يمر علي الفاتورة :</span>
                        </div>
                        <input type="text" value="{{old('notify_when', setting('notify_when'))}}" name="notify_when" class="form-control" aria-label="يتم ارسال الرسائل بعد تاريخ الرسالة بكم يوم">
                        <div class="input-group-append">
                            <span class="input-group-text">من الايام</span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary float-right"><i data-feather="save"></i> حفظ</button>

                </form>
            </div>
        </div>
    </div>


@endsection
