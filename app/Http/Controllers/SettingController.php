<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            'notify_every' => 'required|numeric',
            'notify_when' => 'required|numeric',
        ]);
        setting([
            'notify_every' => $request['notify_every'],
            'notify_when' => $request['notify_when'],
        ])->save();
        toast('تم الحفظ بنجاح', 'success')->autoClose(1000);
        return back();
    }
}
