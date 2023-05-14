<?php

namespace App\Http\Controllers;
use File;
use Storage;
use Illuminate\Http\Request;
use App\Models\Truyen;
use App\Models\DanhMuc;
use Illuminate\Support\Facades\Redirect;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tendanhmuc = Truyen::join('DanhMuc', 'Truyen.danhmuc_id_truyen', '=', 'DanhMuc.danhmuc_id')
        // ->select('DanhMuc.tendanhmuc')
        // ->get();
        $truyen = Truyen::with('Danhmuc')->get();
      
        return view('admincp.truyen.index')->with(compact('truyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmuc = DanhMuc::all();
        return view('admincp.truyen.create')->with(compact('danhmuc'));
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
                'tentruyen'=>'required',
                'motatruyen'=>'required',
                'hinhanhtruyen'=>'required',
            ],
            [
                'tentruyen.required'=>'Tên truyện không được bỏ trống !',
                'motatruyen.required'=>'Mô tả truyện không được bỏ trống !',
                'hinhanhtruyen.required'=>'Chọn hình ảnh cho truyện !',
            ]
            );

            $data = $request->all();
            $truyen = new Truyen();
            $truyen->ten_truyen = $data['tentruyen'];
            $truyen->truyen_view = $data['truyen_view'];
            $truyen->mota_truyen = $data['motatruyen'];
            $truyen->hienthi_truyen = $data['hienthitruyen'];
            $truyen->truyen_danhmuc_id = $data['danhmuctruyen'];
            if($data['hinhanhtruyen']){
                $image = $data['hinhanhtruyen'];
                $ext = $image->getClientOriginalExtension();
                $name = time().'_'.$image->getClientOriginalName();
                Storage::disk('public')->put($name,File::get($image));
                $truyen->hinhanh_truyen = $name;
            }else{
                 $truyen->hinhanh_truyen = 'default.jpg';
           }
           $truyen->save();
           return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($truyen)
    {
        $danhmuc = DanhMuc::all();
        $truyen = Truyen::find($truyen);
        return view('admincp.truyen.edit')->with(compact('truyen','danhmuc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admincp.truyen.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $truyen)
    {
        $data = $request->validate(
            [
                'tentruyen'=>'required',
                'motatruyen'=>'required',
                'hinhanhtruyen'=>'required',
            ],
            [
                'tentruyen.required'=>'Tên truyện không được bỏ trống !',
                'motatruyen.required'=>'Mô tả truyện không được bỏ trống !',
                'hinhanhtruyen.required'=>'Chọn hình ảnh cho truyện !',
            ]
            );

            $data = $request->all();
            $truyen =  Truyen::find($truyen);
            $truyen->ten_truyen = $data['tentruyen'];
            $truyen->truyen_view = $data['truyen_view'];
            $truyen->mota_truyen = $data['motatruyen'];
            $truyen->hienthi_truyen = $data['hienthitruyen'];
            $truyen->truyen_danhmuc_id = $data['danhmuctruyen'];
            if($data['hinhanhtruyen']){
                $image = $data['hinhanhtruyen'];
                $ext = $image->getClientOriginalExtension();
                $name = time().'_'.$image->getClientOriginalName();
                Storage::disk('public')->put($name,File::get($image));
                $truyen->hinhanh_truyen = $name;
            }else{
                 $truyen->hinhanh_truyen = 'default.jpg';
           }
           $truyen->save();
           return Redirect('truyen');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($truyen)
    {
        $deleted = Truyen::where('truyen_id',$truyen)->delete();
        return Redirect()->back();
    }
}
