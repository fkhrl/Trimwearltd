<?php

namespace App\Http\Controllers;

use App\Slider;
use App\Product;
use Illuminate\Http\Request;
use DB;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro = Product::all();
        $slider = $this->tableJson();
        return view('admin.page.slider',['pro'=>$pro,'slider'=>$slider]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function tableJson() {
        $json = DB::table('sliders')
                ->leftjoin('products', 'sliders.pid', '=', 'products.id')
                ->select('sliders.*', 'products.name as proname')
                ->orderBy('sliders.id', 'DESC')
                ->get();

        return $json;
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
        ]);
        //dd($request);

        $filename = "";
        if (!empty($request->file('image'))) {
            $img = $request->file('image');
            $upload = 'upload/slider';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        
        $slider = new Slider();
        $slider->title = $request->title ? $request->title:0;
        $slider->photo = $filename;
        $slider->pid = $request->pid ? $request->pid:0;
        $slider->save();
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
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pro = Product::all();
        $slider = $this->tableJson();
        $data = Slider::find($id);
        return view('admin.page.slider',['pro'=>$pro,'edit' => $data,'slider' => $slider]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {
        $filename = $request->eximage;
        // echo $filename; print_r($request->eximage); die();
        if (!empty($request->file('photo'))) {
            $img = $request->file('photo');
            $upload = 'upload/slider';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
            unlink($upload . '/' . $request->eximage);
        }
        $slider = Slider::find($id);
        $slider->title = $request->title ? $request->title:0;
        $slider->logo = $filename;
        $slider->pid = $request->pid ? $request->pid:0;
        $slider->save();
        return redirect('admin-slider')->with('status', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = Slider::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
