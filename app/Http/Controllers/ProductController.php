<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Session;
use Validator;
use DB;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function getCategory()
    {
        return Category::all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        $categories = $this->getCategory();
        if ($request->name) {
            $products = Product::where('name','like','%'.$request->name.'%')->get(); 
        }
        if($request->cate)
        {
            $products->where('category_id',$request->cate);
        }
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::pluck('name','id')->toArray();
        $category = Category::pluck('name','id')->toArray();
        return view('admin.product.create',compact('brand','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
       // dd($request);
      if($request->hasFile('image'))
       {
           $name=$request->image->getClientOriginalName();
           $request->image->move('image/Product', $name); 
       }
       $product = new  Product();
       $product->product_code = $request->product_code;
       $product->name = $request->name;
       $product->description = $request->description;
       $product->price = $request->price;
       $product->slug = $request->slug;
       $product->image = $request->image;
       $product->promotion = $request->promotion;
       $product->quantity = $request->quantity;
       $product->brand_id = $request->brand_id;
       $product->category_id = $request->category_id;
       $product->created_by = $request->created_by;
       $product->updated_by = $request->updated_by;
       $product->save();
       if ($product){
            return redirect('/admin/product')->with('message','Create successfully!');
        }else{
            return back()->with('err','Save error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrfail($id);
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrfail($id);
        $brand = Brand::pluck('name','id')->toArray();
        $category = Category::pluck('name','id')->toArray();
        return view('admin.product.edit',compact('brand','category','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::findOrFail($id);
        if($product)
        {
            if ($request->hasFile('images') )
            {
                $name=$request->image->getClientOriginalName();
                $request->image->move('image/Product', $name); 

                $product->product_code = $request->product_code;
                $product->name = $request->name;
                $product->description = $request->description;
                $product->price = $request->price;
                $product->slug = $request->slug;
                $product->image = $request->image;
                $product->promotion = $request->promotion;
                $product->quantity = $request->quantity;
                $product->brand_id = $request->brand_id;
                $product->category_id = $request->category_id;
                $product->created_by = $request->created_by;
                $product->updated_by = $request->updated_by;
                $product->update();
            }else{
                $product->product_code = $request->product_code;
                $product->name = $request->name;
                $product->description = $request->description;
                $product->price = $request->price;
                $product->slug = $request->slug;
                $product->promotion = $request->promotion;
                $product->quantity = $request->quantity;
                $product->brand_id = $request->brand_id;
                $product->category_id = $request->category_id;
                $product->updated_at = Carbon::now()->toDateTimeString();
                $product->created_by = $request->created_by;
                $product->updated_by = $request->updated_by;
                $product->update();
                
            }
            return redirect('/admin/product')->with('message','Update successfully!');
        }
        return back()->with('err','Update err!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product) {
            $product->delete();
            return back()->with('message','Delete success!');
        } else {
            return back()->with('err','Delete failse!');
        }  
    }
}
