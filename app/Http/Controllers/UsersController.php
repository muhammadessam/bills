<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->ajax()) {
            return DataTables::of(User::with(['bills'])->orderBy('id', 'desc'))
                ->addColumn('openedCount', function (User $user) {
                    return '<span class="badge badge-success">' . $user->bills->where('status', 'open')->count() . '</span>';
                })->addColumn('closedCount', function (User $user) {
                    return '<span class="badge badge-danger">' . $user->bills->where('status', 'closed')->count() . '</span>';
                })
                ->addColumn('actions', function (User $user) {
                    return '<div class="d-flex">' .
                        '<a href="' . route('admin.user.edit', $user->id) . '" class="btn btn-info mr-1">تحرير</a>' .
                        '<form method="POST" action="' . route('admin.user.destroy', $user->id) . '">' .
                        csrf_field() . method_field('DELETE') .
                        '<button type="submit" class="btn btn-danger">حذف</button>'
                        . '</form>' . '</div>';
                })->rawColumns(['actions', 'openedCount', 'closedCount'])->make(true);
        }
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'whatsapp' => 'required',
            'email' => 'required',
        ]);
        User::create($request->all());
        toast('تم الانشاء بنجاح', 'success')->autoClose(1000);
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'whatsapp' => 'required',
            'email' => 'required',
        ]);
        $user->update($request->all());
        toast('تم الحفظ بنجاح', 'success')->autoClose(1000);
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        toast('تم الحذف بنجاح', 'success')->autoClose(1000);
        return back();
    }
}
