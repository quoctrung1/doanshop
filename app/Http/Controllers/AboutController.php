<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\About;
use Session;
use DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $abouts= DB::table('abouts')->paginate(4);
        $abouts = About::all();
        if ($request->name) {
            $brands = About::where('title','like','%'.$request->name.'%')->get(); 
        }
        return view('admin.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $about = new About;
        $about->title = $request->title;
        $about->phone = $request->phone;
        $about->content = $request->content;
        $about->email = $request->email;
        $about->logo = $request->logo;
        $about->save();
        if ($about){
            return redirect('/admin/about')->with('message','Create successfully!');
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
        $about = About::findOrFail($id);
        return view('admin.about.show',compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.edit',compact('about'));
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
        
        $about = About::findOrFail($id);
        if (isset($about))
        {
            $about->title = $request->title;
            $about->phone = $request->phone;
            $about->content = $request->content;
            $about->email = $request->email;
            $about->logo = $request->logo;
            $about->update();
        }else{
            return back()->with('err','Save error!');
        }
        return redirect('admin/about
            ')->with('message','Edit successfully!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::findOrFail($id);
        if ($about){
            $about->delete();
        }else{
            return redirect("admin/about")->with('message','Dữ liệu đang được sử dụng bên sản phẩm!');
        }
        return redirect("admin/about")->with('message','Xóa thành công');
    }
}
