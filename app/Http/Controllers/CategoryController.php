<?php
namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cat = Category::all();
        return view('admin.page.category',['cat' => $cat]);
        
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);
       // echo $request->name;
       // exit();
        $filename = "";
        if (!empty($request->file('photo'))) {
            $img = $request->file('photo');
            $upload = 'upload/category';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        $category = new Category;
        $category->name = $request->name;
        $category->photo = $filename;
        $category->save();

        return redirect('admin-category')->with('status', 'Page Name Added Successfully!');
    }

    public function show($id) {
        //echo "string"; die();
        $cat = Category::all();
        $data = Category::find($id);
        return view('admin.page.category',['cat' => $cat,'data' => $data]);
    }
    
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'photo' => 'required',
        ]);
       // echo $request->name;
       // exit();
        
        $filename = $request->eximage;
        // echo $filename; print_r($request->eximage); die();
        if (!empty($request->file('photo'))) {
            $img = $request->file('photo');
            $upload = 'upload/category';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
            @unlink(public_path($upload . '/' . $request->eximage));
        }
        $category = Category::find($id);
        $category->name = $request->name;
        $category->photo = $filename;
        $category->save();

        return redirect('admin-category')->with('status', 'Updated Successfully !');
    }

    public function destroy($id) {
        $json=Category::find($id);
        $json->delete();
         return redirect('admin-category')->with('status', 'Page Name Deleted Successfully!');
    }
}
