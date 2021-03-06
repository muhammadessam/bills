<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response|DataTables
     */
    public function index()
    {
        if (\request()->ajax()) {
            return DataTables::of(User::with(['bills'])->orderBy('id', 'desc'))
                ->addColumn('via_whatsapp', function (User $user) {
                    return $user->is_whatsapp ? '<span class="badge badge-success">YES</span>' : '<span class="badge badge-danger">NO</span>';
                })->addColumn('via_sms', function (User $user) {
                    return $user->is_sms ? '<span class="badge badge-success">YES</span>' : '<span class="badge badge-danger">NO</span>';
                })->addColumn('via_email', function (User $user) {
                    return $user->is_email ? '<span class="badge badge-success">YES</span>' : '<span class="badge badge-danger">NO</span>';
                })
                ->addColumn('openedCount', function (User $user) {
                    return '<span class="badge badge-success">' . $user->bills()->where('status', 'open')->count() . '</span>';
                })->addColumn('closedCount', function (User $user) {
                    return '<span class="badge badge-danger">' . $user->bills()->where('status', 'closed')->count() . '</span>';
                })->addColumn('actions', function (User $user) {
                    return
                        '<div class="d-flex">' .
                        '<a href="' . route('admin.user.show', $user->id) . '"  title="مشاهدة" class="btn btn-success mr-1"><i data-feather="eye"></i></a>' .
                        '<a href="' . route('admin.user.edit', $user->id) . '"  title="تعديل" class="btn btn-info mr-1"><i data-feather="edit"></i></a>' .
                        '<form method="POST" action="' . route('admin.user.destroy', $user->id) . '">' .
                        csrf_field() . method_field('DELETE') .
                        '<button type="submit" class="btn btn-danger" title="حذف"><i data-feather="trash"></i></button>'
                        . '</form>' . '</div>';
                })->rawColumns(['actions', 'openedCount', 'closedCount', 'via_whatsapp', 'via_sms', 'via_email'])->make(true);
        }
        return view('admin.user.index');
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'whatsapp' => 'required',
            'email' => 'required',
        ]);
        $request['is_sms'] ?? 0;
        $request['is_whatsapp'] ?? 0;
        $request['is_email'] ?? 0;

        User::create($request->all());
        toast('تم الانشاء بنجاح', 'success')->autoClose(1000);
        return redirect()->route('admin.user.index');
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'whatsapp' => 'required',
            'email' => 'required',
        ]);
        $request['is_sms'] ?? 0;
        $request['is_whatsapp'] ?? 0;
        $request['is_email'] ?? 0;
        $user->update($request->all());
        toast('تم الحفظ بنجاح', 'success')->autoClose(1000);
        return redirect()->route('admin.user.index');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        toast('تم الحذف بنجاح', 'success')->autoClose(1000);
        return back();
    }

    public function getUserBills(Request $request, User $user)
    {
        return DataTables::of($user->bills()->orderBy('id', 'desc'))
            ->editColumn('status', function (Bill $bill) {
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
}
