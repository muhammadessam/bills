@extends('layouts.master')
@section('title', 'المدير / العملاء')
@section('content')
    <div class="col-lg-12 col-md-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row" style="height: 70px;">
                    <div class="col d-flex justify-content-between align-self-center">
                        <h2>العملاء</h2>
                        <a class="btn btn-primary" href="{{route('admin.user.create')}}"><i data-feather="plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-bordered mb-4" id="user-table">
                        <thead>
                        <tr>
                            <th>التسلسل</th>
                            <th>اسم العميل</th>
                            <th>عدد الفواتير المفتوحة</th>
                            <th>عدد الفواتير المغلقة</th>
                            <th>رقم الهاتف</th>
                            <th>الواتس اب</th>
                            <th>البريد</th>
                            <th>عبر الواتس</th>
                            <th>عبر الرسايل</th>
                            <th>عبر الايميل</th>
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
        let users = $('#user-table').DataTable({
            processing: true,
            serverSide: true,
            search: true,
            ajax: "{{route('admin.user.index')}}",
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'openedCount'},
                {data: 'closedCount'},
                {data: 'phone'},
                {data: 'whatsapp'},
                {data: 'email'},
                {data: 'via_whatsapp'},
                {data: 'via_sms'},
                {data: 'via_email'},
                {data: 'actions', orderable: false, searchable: false},
            ],
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<i data-feather="arrow-right"></i>',
                    "sNext": '<i data-feather=arrow-left></i>'
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
        users.on('draw.dt', function () {
            feather.replace();
        })
    </script>
@endpush
