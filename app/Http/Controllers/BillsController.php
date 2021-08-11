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
            return DataTables::of(Bill::with(['user'])->orderBy('id', 'desc'))
                ->editColumn('user_id', function (Bill $bill) {
                    return $bill->user->name;
                })->editColumn('status', function (Bill $bill) {
                    return $bill->status === "open" ? '<span class="badge badge-info">' . $bill->status . '</span>' : '<span class="badge badge-success">' . $bill->status . '</span>';
                })->addColumn('photo', function (Bill $bill) {
                    return $bill->hasMedia('bill') ? '<img width="175" height="115" class="rounded" src="' . $bill->getFirstMediaUrl('bill') . '"/>' : '<img width="175" height="115" class="rounded" src="' . asset('adminassets/assets/img/175x115.jpg') . '">';
                })->addColumn('actions', function (Bill $bill) {
                    return '<div class="d-flex">' .
                        '<a href="' . route('admin.bill.show', $bill->id) . '" class="btn btn-success mr-1">مشاهدة</a>' .
                        '<a href="' . route('admin.bill.edit', $bill->id) . '" class="btn btn-info mr-1">تحرير</a>' .
                        '<form method="POST" action="' . route('admin.bill.destroy', $bill->id) . '">' .
                        csrf_field() . method_field('DELETE') .
                        '<button type="submit" class="btn btn-danger">حذف</button>'
                        . '</form>' . '</div>';
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
        return \view('admin.bills.edit', compact('bill'));
    }

    public function update(Request $request, Bill $bill)
    {
        //
    }


    public function destroy(Bill $bill)
    {
        $bill->delete();
        toast('تم الحذف بنجاح', 'success', 'top-start')->autoClose(1000);
        return back();
    }
}
