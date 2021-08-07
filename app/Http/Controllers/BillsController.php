<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class BillsController extends Controller
{

    public function index()
    {
        if (\request()->ajax()) {
            return DataTables::of(Bill::with(['user'])->orderBy('created_at', 'desc'))
                ->editColumn('user_id', function (Bill $bill) {
                    return $bill->user->name;
                })->editColumn('status', function (Bill $bill) {
                    return $bill->status === "open" ? '<span class="badge badge-info">' . $bill->status . '</span>' : '<span class="badge badge-success">' . $bill->status . '</span>';
                })->addColumn('photo', function (Bill $bill) {
                    return $bill->hasMedia('bill') ? '<img width="175" height="115" class="rounded" src="' . $bill->getFirstMediaUrl('bill') . '"/>' : '<img width="175" height="115" class="rounded" src="' . asset('adminassets/assets/img/175x115.jpg') . '">';
                })->addColumn('actions', function (Bill $bill) {
                    return '';
                })->rawColumns(['actions', 'status', 'photo'])->make(true);
        }
        return view('admin.bills.index');
    }


    public function create()
    {
        return \view('admin.bills.create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Bill $bill)
    {
        //
    }

    public function edit(Bill $bill)
    {
        //
    }

    public function update(Request $request, Bill $bill)
    {
        //
    }


    public function destroy(Bill $bill)
    {
        //
    }
}
