<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PaymentsController extends Controller
{

    public function index()
    {
        if (\request()->ajax()) {
            return DataTables::of(Payment::with(['bill.user'])->orderBy('id', 'desc'))
                ->editColumn('bill_id', function (Payment $payment) {
                    return $payment->bill->number;
                })->addColumn('user', function (Payment $payment) {
                    return $payment->bill->user->name;
                })->addColumn('photo', function (Payment $payment) {
                    return $payment->hasMedia('payments') ? '<img width="175" height="115" class="rounded" src="' . $payment->getFirstMediaUrl('payments') . '"/>' : '<img width="175" height="115" class="rounded" src="' . asset('adminassets/assets/img/175x115.jpg') . '">';
                })->addColumn('actions', function (Payment $payment) {
                    return '<div class="d-flex">' .
                        '<a href="' . route('admin.payment.edit', $payment) . '" class="btn btn-info mr-1">تحرير</a>' .
                        '<form method="POST" action="' . route('admin.payment.destroy', $payment) . '">' .
                        csrf_field() . method_field('DELETE') .
                        '<button type="submit" class="btn btn-danger">حذف</button>'
                        . '</form>' . '</div>';
                })->rawColumns(['actions', 'photo'])->make(true);
        }
        return view('admin.payments.index');
    }


    public function create()
    {
        return view('admin.payments.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'amount' => 'required',
            'released_at' => 'required',
            'bill_id' => 'required|exists:bills,id',
        ]);
        $payment = Payment::create($request->all());
        if ($request->hasFile('photo'))
            $payment->addMediaFromRequest('photo')->toMediaCollection('payments');
        toast('تم الحفظ بنجاح', 'success')->autoClose(1000);
        return redirect()->route('admin.payment.index');
    }

    public function show(Payment $payment)
    {

    }

    public function edit(Payment $payment)
    {
        return view('admin.payments.edit', compact('payment'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'amount' => 'required',
            'released_at' => 'required',
            'bill_id' => 'required|exists:bills,id',
        ]);
        $payment->update($request->all());
        if ($request->hasFile('photo'))
            $payment->addMediaFromRequest('photo')->toMediaCollection('payments');
        toast('تم الحفظ بنجاح', 'success')->autoClose(1000);
        return redirect()->route('admin.payment.index');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        toast('تم الحذف بنجاح', 'success')->autoClose(1000);
        return back();
    }
}
