<?php

namespace App\Http\Controllers;

use App\SeoSetting;
use Illuminate\Http\Request;

class SeoSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seo = SeoSetting::All();
        return view('admin.page.seosetting', ['seo' => $seo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'keywords' => 'required',
            'description' => 'required',
        ]);

        
        $seo = new SeoSetting();
        $seo->keywords = $request->keywords;
        $seo->description = $request->description;
        $seo->save();
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
     * @param  \App\SeoSetting  $seoSetting
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seo = SeoSetting::All();
        $data = SeoSetting::find($id);
        return view('admin.page.seosetting',['edit' => $data,'seo' => $seo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SeoSetting  $seoSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(SeoSetting $seoSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SeoSetting  $seoSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeoSetting $seoSetting)
    {
        $seo = seoSetting::find($id);
        $seo->keywords = $request->keywords;
        $seo->description = $request->description;
        $seo->save();
        return redirect('admin-seosetting')->with('status', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SeoSetting  $seoSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = seoSetting::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
