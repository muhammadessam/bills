@extends('layouts.master')
@section('title', 'المدير / المدفوعات')
@section('content')
    <div class="col-lg-12 col-md-12 layout-spacing">
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
        let payment = $('#payments-table').DataTable({
            processing: true,
            serverSide: true,
            search: true,
            ajax: "{{route('admin.payment.index')}}",
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
                    "sPrevious": '<i data-feather="arrow-right"></i>',
                    "sNext": '<i data-feather="arrow-left"></i>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<i data-feather="search"></i>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
        payment.on('draw.dt', function () {
            feather.replace();
        })
    </script>
@endpush
