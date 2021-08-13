<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Payment;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class BillsController extends Controller
{

    /**
     * @throws Exception
     */
    public function index()
    {
        if (\request()->ajax()) {
            return DataTables::of(Bill::with(['user'])->orderBy('id', 'desc'))
                ->editColumn('user_id', function (Bill $bill) {
                    return $bill->user->name;
                })->editColumn('status', function (Bill $bill) {
                    return $bill->status === "open" ? '<span class="badge badge-info">' . $bill->status . '</span>' : '<span class="badge badge-success">' . $bill->status . '</span>';
                })->addColumn('photo', function (Bill $bill) {
                    return $bill->hasMedia('bills') ? '<img width="175" height="115" class="rounded" src="' . $bill->getFirstMediaUrl('bills') . '"/>' : '<img width="175" height="115" class="rounded" src="' . asset('adminassets/assets/img/175x115.jpg') . '">';
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


    public function show(Bill $bill)
    {
        return \view('admin.bills.show', compact('bill'));
    }

    public function edit(Bill $bill)
    {
        return \view('admin.bills.edit', compact('bill'));
    }


    public function destroy(Bill $bill): RedirectResponse
    {
        $bill->delete();
        toast('تم الحذف بنجاح', 'success', 'top-start')->autoClose(1000);
        return back();
    }

    public function getBillPayment(Request $request, Bill $bill)
    {
        return DataTables::of($bill->payments()->with('bill.user')->orderBy('id', 'desc'))
            ->editColumn('bill_id', function (Payment $payment) {
                return $payment->bill->number;
            })->addColumn('user', function (Payment $payment) {
                return $payment->bill->user->name;
            })->addColumn('photo', function (Payment $payment) {
                return $payment->hasMedia('payments') ? '<img width="175" height="115" class="rounded" src="' . $payment->getFirstMediaUrl('payments') . '"/>' : '<img width="175" height="115" class="rounded" src="' . asset('adminassets/assets/img/175x115.jpg') . '">';
            })->addColumn('actions', function (Payment $payment) {
                return '<div class="d-flex">' .
                    '<form method="POST" action="' . route('admin.payment.destroy', $payment) . '">' .
                    csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger">حذف</button>'
                    . '</form>' . '</div>';
            })->rawColumns(['actions', 'photo'])->make(true);
    }
}
