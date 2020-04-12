<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Image;
use Session;
use App\Http\Requests\ImageRequest;
use DB;


class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images= DB::table('images')->paginate(4);
        return view('admin.image.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)
    {
        $request->validated();
        $image = new Image;
        $image->url = $request->url;
        $image->created_by = $request->created_by;
        $image->updated_by = $request->updated_by;
        $image->save();
        Session::flash('message','Save successfully!');
        Session::flash('err','Save err!');
        if ($image){
            return redirect('/admin/image')->with('message','Create successfully!');
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
        $image = Image::findOrFail($id);
        return view('admin.image.edit',compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::findOrFail($id);
        return view('admin.image.edit',compact('image'));
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
        $image= Image::findOrfail($id);
        if (isset($image))
        {
            $image->url = $request->url;
            $image->created_by = $request->created_by;
            $image->updated_by = $request->updated_by;
            $image->save();
        }else{
            return back()->with('err','Save error!');
        }
        return redirect('admin/image')->with('message','Edit successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        if ($image){
            $image->delete();
        }else{
            return redirect("admin/image")->with('message','Dữ liệu đang được sử dụng bên sản phẩm!');
        }
        return redirect("admin/image")->with('message','Xóa thành công');
    }
}
