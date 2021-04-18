<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Setting;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.index')->with('settings', Setting::first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $this->validate(request(), [
            'site_name' => 'required',
            'contact_email' => 'required|email',
            'contact_number' => 'required',
            'address' => 'required'
        ]);

        $settings = Setting::first();

        $settings->site_name = request()->site_name;
        $settings->contact_email = request()->contact_email;
        $settings->contact_number = request()->contact_number;
        $settings->address = request()->address;

        $settings->save();

        Session::flash('success', 'Settings updated.');

        return redirect()->back();
    }
}
