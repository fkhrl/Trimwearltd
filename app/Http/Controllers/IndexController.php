<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\About;
use App\Product;
use App\SeoSetting;
use App\SiteSetting;
use App\Slider;
use DB;
use Hash;
use App\User;
use Carbon\Carbon;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $slider = $this->sliderParseData();
        $SiteSetting = SiteSetting::first();
        $SeoSetting = SeoSetting::first();
        $cat = $this->categoryParseData();
        $product = DB::table('products')->take(3)->orderBy('id', 'DESC')->get();
        //dd($SiteSetting);
        return view('frontEnd.page.index' ,
            ['cat' => $cat,
            'slider' => $slider,
            'site'=>$SiteSetting,
            'seo'=>$SeoSetting,
            'pro'=>$product
            ]);
    }
    private function sliderParseData() {
        $json = DB::table('sliders')
                ->leftjoin('products', 'sliders.pid', '=', 'products.id')
                ->select('sliders.*', 'products.name as proname')
                ->take(6)
                ->orderBy('sliders.id', 'DESC')
                ->get();

        return $json;
    }
    private function categoryParseData()
    {
        $data=[];
        $pureCatCheck=Category::count();

        if($pureCatCheck > 0 )
        {
            $pureCat=Category::all();
            foreach($pureCat as $pc){
                $sCatCheck=SubCategory::where('cid',$pc->id)->count();
                $subCatData=[];
                if($sCatCheck > 0)
                {
                    $sCat=SubCategory::where('cid',$pc->id)->get();
                    foreach($sCat as $sc)
                    {
                        $subCatData[]=['id'=>$sc->id,'name'=>$sc->name];
                    }
                }
                $data[]=['id'=>$pc->id,'name'=>$pc->name,'photo'=>$pc->photo,'scat'=>$subCatData];
            }
        }

        return $data;
    }
   
   public function about(){
        $SiteSetting = SiteSetting::first();
        $SeoSetting = SeoSetting::first();
        $cat = $this->categoryParseData();
        $about = About::first();
        return view('frontEnd.page.aboutUs' ,
            ['cat' => $cat,
            'site'=>$SiteSetting,
            'seo'=>$SeoSetting,
            'about'=>$about
            ]);
   }

   public function product($cid=0,$scid=0,$name=''){
        $SiteSetting = SiteSetting::first();
        $SeoSetting = SeoSetting::first();
        $cat = $this->categoryParseData();
        $subcatName = SubCategory::where('id',$scid)->first();
        $product = DB::table('products')
                    ->leftjoin('categories', 'products.cid', '=', 'categories.id')
                    ->leftjoin('sub_categories', 'products.scid', '=', 'sub_categories.id')
                    ->select('products.*', 'categories.name as cname', 'sub_categories.name as sname')
                    ->where('products.cid',$cid)
                    ->where('products.scid',$scid)
                    ->orderBy('products.id', 'DESC')
                    ->get();

        //dd($subcatName);

        return view('frontEnd.page.product' ,
            ['cat' => $cat,
            'site'=>$SiteSetting,
            'seo'=>$SeoSetting,
            'subcatName'=>$subcatName,
            'pro'=>$product
            ]);
   }
   public function categoryproduct($id=0,$scid=0,$name=''){
        $SiteSetting = SiteSetting::first();
        $SeoSetting = SeoSetting::first();
        $cat = $this->categoryParseData();
        $catName = Category::where('id',$id)->first();
        $product = DB::table('products')
                    ->leftjoin('categories', 'products.cid', '=', 'categories.id')
                    ->leftjoin('sub_categories', 'products.scid', '=', 'sub_categories.id')
                    ->select('products.*', 'categories.name as cname', 'sub_categories.name as sname')
                    ->where('products.cid',$id)
                    ->orderBy('products.id', 'DESC')
                    ->get();

        //dd($product);

        return view('frontEnd.page.category_product' ,
            ['cat' => $cat,
            'site'=>$SiteSetting,
            'seo'=>$SeoSetting,
            'catName'=>$catName,
            'pro'=>$product
            ]);
   }
   public function productlist($id=0,$name=''){
        $SiteSetting = SiteSetting::first();
        $SeoSetting = SeoSetting::first();
        $cat = $this->categoryParseData();
        $product = product::where('id',$id)->first();
        return view('frontEnd.page.product_list' ,
            ['cat' => $cat,
            'site'=>$SiteSetting,
            'seo'=>$SeoSetting,
            'pro'=>$product
            ]);
   }
   public function contact(){
        $SiteSetting = SiteSetting::first();
        $SeoSetting = SeoSetting::first();
        $cat = $this->categoryParseData();
        return view('frontEnd.page.contact' ,
            ['cat' => $cat,
            'site'=>$SiteSetting,
            'seo'=>$SeoSetting
            ]);
   }
   
    public function login(){
        return view('auth.login');
    }

    public function updateUserInfo(request $request){
       //echo $request->name; die(); 
       $this->validate($request, [
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required|min:6|confirmed',
            'password_confirmation' => 'required|same:password'
            
        ]);
        
        $user = User::find(\Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/admin/user')->with('status', 'Updated Successfully !');
    }
    public function user(){
        return view('admin.page.edituser');
    }public function unlock(){
        return view('admin.page.unlock');
    }
    public function dashboard(){
         $users = User::count();
         $todaypro = Product::whereDate('created_at', DB::raw('CURDATE()'))->get();
         $todayproduct = count($todaypro);
         $product = Product::count();
         $contact = DB::table('contacts')
                ->whereDate('contacts.created_at', '=', Carbon::today()->toDateString())
                ->get();
         
         //dd($pro);
        return view('admin.page.dashboard',['countuser'=>$users,'todayproduct'=>$todayproduct,'allpro'=>$product,'contact'=>$contact]);
    }

    // Search Query
    public function searchQuery(request $request){
        $SiteSetting = SiteSetting::first();
        $SeoSetting = SeoSetting::first();
        $cat = $this->categoryParseData();
        // echo 1; die();
        $serachpro = $request->search;
        //dd($serachpro);
        DB::enableQueryLog();

        $query =DB::table('products')
                ->leftjoin('categories', 'products.cid', '=', 'categories.id')
                ->leftjoin('sub_categories', 'products.scid', '=', 'sub_categories.id')
                ->select('products.*', 'categories.name as cname', 'sub_categories.name as sname')

                ->where('products.name', 'LIKE', '%' . $serachpro . '%')
                ->orWhere('categories.name', 'LIKE', '%' . $serachpro . '%')
                ->orWhere('sub_categories.name', 'LIKE', '%' . $serachpro . '%')
                ->get();

                //dd($query);
                 return view('frontEnd.page.category_product' ,
                            ['cat' => $cat,
                            'site'=>$SiteSetting,
                            'seo'=>$SeoSetting,
                            'pro'=>$query
                            ]);
    }
    
}
