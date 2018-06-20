<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use DB;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cat = category::all();
        $json = $this->tableJson();
        return view('admin.page.sub_category', ['cat' => $cat, 'subcat' => $json]);
    }


    private function tableJson()
    {
        $json = DB::table('sub_categories')
                ->join('categories', 'sub_categories.cid', '=', 'categories.id')
                ->select('sub_categories.*', 'categories.name as cname')
                ->get();

        return $json;
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'cid' => 'required',
        ]);
//        echo $request->name;
//        exit();
        $subcategory = new Subcategory;
        $subcategory->name = $request->name;
        $subcategory->cid = $request->cid;
        $subcategory->save();

        return redirect('admin-subcategory')->with('status', 'Sub Page Name Added Successfully!');
    }

    public function show($id) {
        $cat = category::all();
        $jsonData = SubCategory::find($id);
        $json = $this->tableJson();
        return view('admin.page.sub_category', ['subcat' => $json, 'cat' => $cat,'edit'=>$jsonData]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'cid' => 'required',
        ]);
//        echo $request->name;
//        exit();
        $subcategory = SubCategory::find($id);
        $subcategory->name = $request->name;
        $subcategory->cid = $request->cid;
        $subcategory->save();

        return redirect('admin-subcategory')->with('status', 'Updated Successfully !');
    }

    public function destroy($id) {
        // echo "string"; die();
        $json = Subcategory::find($id);
        $json->delete();
        return redirect('admin-subcategory')->with('status', 'Sub Page Name Deleted Successfully!');
    }
}
