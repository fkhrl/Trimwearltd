<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::all();
        return view('admin.page.aboutus',['about'=>$about]);
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
            'content' => 'required',
        ]);
        $about = new About();
        $about->name = $request->name;
        $about->content = $request->content;
        $about->save();
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
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = About::find($id);
        $about = About::all();
        return view('admin.page.aboutus',['edit' => $data,'about'=>$about]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $about = About::find($id);
        $about->name = $request->name;
        $about->content = $request->content;
        $about->save();
        return redirect('admin-about')->with('status', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = About::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
