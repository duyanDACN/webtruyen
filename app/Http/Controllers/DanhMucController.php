<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmuc = DanhMuc::orderby('danhmuc_id','ASC')->get();
        return view('admincp.danhmuc.index')->with(compact('danhmuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.danhmuc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'tendanhmuc'=>'required|max:50',
                'motadanhmuc'=>'required|max:500',
                'hienthi'=>'required'
            ],
            [
                'tendanhmuc.required' => 'Tên danh mục không được bỏ trống !',
                'motadanhmuc.required' => 'Mô tả danh mục không được bỏ trống !',
                'motadanhmuc.max' => 'Mô tả danh mục không được vượt quá 500 từ !',
                'hienthi.required' => 'Chọn hiển thị',
            ]
            );

            $data = $request->all();
            $danhmuc = new DanhMuc();
            $danhmuc->tendanhmuc = $data['tendanhmuc'];
            $danhmuc->motadanhmuc = $data['motadanhmuc'];
            $danhmuc->hienthi = $data['hienthi'];
            $danhmuc->save();
            return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($danhmuc)
    {
        $danhmuc = DanhMuc::find($danhmuc);
        return view('admincp.danhmuc.edit')->with(compact('danhmuc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $danhmuc)
    {
        $data = $request->validate(
            [
                'tendanhmuc'=>'required|max:50',
                'motadanhmuc'=>'required|max:500',
                'hienthi'=>'required'
            ],
            [
                'tendanhmuc.required' => 'Tên danh mục không được bỏ trống !',
                'motadanhmuc.required' => 'Mô tả danh mục không được bỏ trống !',
                'motadanhmuc.max' => 'Mô tả danh mục không được vượt quá 500 từ !',
                'hienthi.required' => 'Chọn hiển thị',
            ]
            );

            $data = $request->all();
            $editdanhmuc = DanhMuc::find($danhmuc);
            $editdanhmuc->tendanhmuc = $data['tendanhmuc'];
            $editdanhmuc->motadanhmuc = $data['motadanhmuc'];
            $editdanhmuc->hienthi = $data['hienthi'];
            $editdanhmuc->save();
            return Redirect('danhmuc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($danhmuc)
    {
        $deleted = DanhMuc::where('danhmuc_id',$danhmuc)->delete();
        return Redirect()->back();
    }
}
