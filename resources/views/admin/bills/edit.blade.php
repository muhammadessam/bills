@extends('layouts.master')
@section('title', 'المدير / الفواتير / تحرير الفاتورة رقم '.$bill->number)
@section('content')
    <livewire:bill-c-r-u-d :bill="$bill"></livewire:bill-c-r-u-d>
@endsection
