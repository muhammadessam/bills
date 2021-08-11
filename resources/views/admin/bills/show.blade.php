@extends('layouts.master')
@section('title', 'المدير / الفواتير / فاتورة رقم '.$bill->number)
@section('content')
    <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12" style="margin:0 auto 24px auto">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>فاتورة رقم : {{$bill->number}}</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">

                <div class="form-row mb-4">
                    <x-input-show value="{{$bill->number}}" classes="col-md-6" label="رقم الفاتورة: "></x-input-show>
                    <x-input-show value="{{$bill->amount}}" classes="col-md-6" label="قيمة الفاتورة: "></x-input-show>
                </div>

                <div class="form-row mb-4">
                    <x-input-show value="{{$bill->status}}" classes="col-md-6" label="حالة الفاتورة: "></x-input-show>
                    <x-input-show value="{{$bill->released_at}}" classes="col-md-6" label="تاريخ اصدار الفاتورة: "></x-input-show>

                </div>

                <div class="form-row">
                    <x-input-show value="{{$bill->user->name}}" classes="col-md-6" label="اسم العميل: "></x-input-show>
                    <x-input-show value="{{$bill->user->phone}}" classes="col-md-6" label="رقم الهاتف: "></x-input-show>
                </div>
                <div class="form-row">
                    <x-input-show value="{{$bill->user->whatsapp}}" classes="col-md-6" label="رقم الواتس اب: "></x-input-show>
                    <x-input-show value="{{$bill->user->email}}" classes="col-md-6" label="البريد: "></x-input-show>
                </div>
            </div>
        </div>
    </div>
@endsection
