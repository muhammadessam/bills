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
    <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12" style="margin:0 auto 24px auto">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row" style="height: 70px;">
                    <div class="col d-flex justify-content-between align-self-center">
                        <h2>المدفوعات</h2>
                        <a class="btn btn-primary" href="{{route('admin.payment.create')}}"><i data-feather="plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-bordered mb-4" id="payments-table">
                        <thead>
                        <tr>
                            <th>التسلسل</th>
                            <th>القيمة</th>
                            <th>تاريخ الايصال</th>
                            <th>فاتورة رقم</th>
                            <th>اسم العميل</th>
                            <th>صورة الايصال</th>
                            <th>اجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $('#payments-table').DataTable({
            processing: true,
            serverSide: true,
            search: true,
            ajax: "{{route('admin.get.bill.payment',$bill)}}",
            columns: [
                {data: 'id'},
                {data: 'amount'},
                {data: 'released_at'},
                {data: 'bill_id'},
                {data: 'user'},
                {data: 'photo'},
                {data: 'actions', orderable: false, searchable: false},
            ],
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script>
@endpush
