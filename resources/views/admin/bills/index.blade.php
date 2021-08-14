@extends('layouts.master')
@section('title', 'المدير / الفواتير')
@section('content')
    <div class="col-lg-12 col-md-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row" style="height: 70px;">
                    <div class="col d-flex justify-content-between align-self-center">
                        <h2>الفواتير</h2>
                        <a class="btn btn-primary" href="{{route('admin.bill.create')}}"><i data-feather="plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-bordered mb-4" id="bills-table">
                        <thead>
                        <tr>
                            <th>التسلسل</th>
                            <th>رقم الفاتورة</th>
                            <th>قيمة الفاتورة</th>
                            <th>حالة الفاتورة</th>
                            <th>تاريخ الاصدار</th>
                            <th>العميل</th>
                            <th>صورة الفاتورةالاصلية</th>
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
        let bills = $('#bills-table').DataTable({
            processing: true,
            serverSide: true,
            search: true,
            ajax: "{{route('admin.bill.index')}}",
            columns: [
                {data: 'id'},
                {data: 'number'},
                {data: 'amount'},
                {data: 'status'},
                {data: 'released_at'},
                {data: 'user_id'},
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
        bills.on('draw.dt', function () {
            feather.replace();
        })
    </script>
@endpush
