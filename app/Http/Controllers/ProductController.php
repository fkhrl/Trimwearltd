<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro = $this->tableJson();
        $cat = Category::all();
        return view('admin.page.product', ['cat' => $cat, 'pro'=>$pro]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function tableJson() {
        $json = DB::table('products')
                ->leftjoin('categories', 'products.cid', '=', 'categories.id')
                ->leftjoin('sub_categories', 'products.scid', '=', 'sub_categories.id')
                ->select('products.*', 'categories.name as cname', 'sub_categories.name as sname')
                ->orderBy('products.id', 'DESC')
                ->get();

        return $json;
    }
    public function ajaxSubcat(Request $request) {
        $query = DB::table('sub_categories')->where('cid', $request->cid)->get();
        return response()->json($query);
    }

    public function create(request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cid' => 'required',
            'scid' => 'required',
            'photo' => 'required',
        ]);
        //dd($request);



        $filename = "";
        if (!empty($request->file('photo'))) {
            $img = $request->file('photo');
            $upload = 'upload/product';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        //dd($filename);
        $pro = new Product();
        $pro->cid = $request->cid;
        $pro->scid = $request->scid;
        $pro->name = $request->name;
        $pro->photo = $filename;
        $pro->Details = $request->Details ? $request->Details:0;
        $pro->save();
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $cat = Category::all();
        $pro = $this->tableJson();
        $data = Product::find($id);
        $scat = SubCategory::find($data->scid);
        return view('admin.page.product',[
            'cat'=>$cat,
            'scat'=>$scat,
            'edit' => $data,
            'pro' => $pro
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(request $request ,$id)
    {
        $filename = $request->eximage;
        // echo $filename; print_r($request->eximage); die();
        if (!empty($request->file('photo'))) {
            $img = $request->file('photo');
            $upload = 'upload/product';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
            @unlink(public_path($upload . '/' . $request->eximage));
        }
        $pro = Product::find($id);
        $pro->cid = $request->cid;
        $pro->scid = $request->scid;
        $pro->name = $request->name;
        $pro->photo = $filename;
        $pro->Details = $request->Details ? $request->Details:0;
        $pro->save();
        return redirect('admin-product')->with('status', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = Product::find($id);
        $json->delete();
        return back()->with('status', 'Deleted Successfully!');
    }
}
