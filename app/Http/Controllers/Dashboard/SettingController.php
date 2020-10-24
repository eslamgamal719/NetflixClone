<?php

namespace App\Http\Controllers\Dashboard;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SettingController extends Controller
{

    public function social_login()
    {
        return view('dashboard.settings.social_login');
    }


    public function social_links()
    {
        return view('dashboard.settings.social_links');
    }


    public function store(Request $request)
    {

        setting($request->all())->save();

        session()->flash('success', 'Added Successfully');
        return redirect()->back();
    }
}
