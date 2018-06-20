<?php

namespace App\Http\Controllers;

use App\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $site = siteSetting::All();
        return view('admin.page.siteinfo', ['site' => $site]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'logo' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        //dd($request);

        $filename = "";
        if (!empty($request->file('logo'))) {
            $img = $request->file('logo');
            $upload = 'upload/logo';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        
        $site = new siteSetting();
        $site->name = $request->name;
        $site->logo = $filename;
        $site->phone = $request->phone;
        $site->email = $request->email;
        $site->address = $request->address;
        $site->save();
        return back()->with('status', 'Added Successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $site = siteSetting::All();
        $data = siteSetting::find($id);
        return view('admin.page.siteinfo',['edit' => $data,'site' => $site]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteSetting $siteSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $filename = $request->eximage;
        // echo $filename; print_r($request->eximage); die();
        if (!empty($request->file('logo'))) {
            $img = $request->file('logo');
            $upload = 'upload/logo';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
            unlink($upload . '/' . $request->eximage);
        }
        $site = siteSetting::find($id);
        $site->name = $request->name;
        $site->logo = $filename;
        $site->phone = $request->phone;
        $site->email = $request->email;
        $site->address = $request->address;
        $site->save();
        return redirect('admin-sitesetting')->with('status', 'Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = siteSetting::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
