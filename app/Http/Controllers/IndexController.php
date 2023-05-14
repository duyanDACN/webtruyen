<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truyen;
use App\Models\Chapter;
use App\Models\DanhMuc;
use Illuminate\Support\Facades\Date;

class IndexController extends Controller
{
    public function index(){
        $danhmuc = DanhMuc::all();
        $view = Truyen::orderby('truyen_view','DESC')->limit(5)->get();
        $sachhay = Truyen::all()->random(5);
        $truyen = Truyen::where('hienthi_truyen',1)->orderby('truyen_id','DESC')->get();
        return view('pages.home')->with(compact('truyen','danhmuc','view','sachhay'));
    }

    public function doctruyen($id){
        $danhmuc = DanhMuc::all();
        $truyen = Truyen::find($id);
        $truyen_id = Truyen::where('truyen_id',$id)->first();
        $truyen_danhmuc_id = $truyen_id->truyen_danhmuc_id;
        $truyenlienquan = Truyen::where('truyen_danhmuc_id',$truyen_danhmuc_id)->get();
        $chapter = Chapter::all();
        $view = Truyen::orderby('truyen_view','DESC')->limit(5)->get();
        $new_chapter = Chapter::orderby('chapter_id','DESC')->where('chapter_truyen_id',$id)->limit(3)->get();
        $new_chapter_id = Chapter::where('chapter_truyen_id',$id)->limit(3)->max('chapter_id');
       
        return view('pages.truyen')->with(compact('truyen','danhmuc','chapter','view','truyenlienquan','new_chapter','new_chapter_id'));
    }

    public function xemtruyen($id){
        $truyen = Truyen::find($id);
        $mucluc = Chapter::where('chapter_truyen_id',$id)->get();
        $danhmuc = DanhMuc::all();
        return view('pages.mucluc')->with(compact('danhmuc','mucluc','truyen'));
    }

    public function noidung($id){
        $chapter = Chapter::find($id);
      
        $mucluc = Chapter::where('chapter_truyen_id',$id)->get();
        $danhmuc = DanhMuc::all();

        $chapter_truyen_id = Chapter::select('chapter_truyen_id')->where('chapter_id',$id)->first();

        $all_chapter = Chapter::where('chapter_truyen_id',$chapter_truyen_id->chapter_truyen_id)->get();

        $truyen = Truyen::select('*')->where('truyen_id',$chapter_truyen_id->chapter_truyen_id)->first();
        
        $next_chapter = Chapter::where('chapter_truyen_id',$chapter_truyen_id->chapter_truyen_id)->where('chapter_id','>',$id)->min('chapter_id');
       
        $previous_chapter = Chapter::where('chapter_truyen_id',$chapter_truyen_id->chapter_truyen_id)->where('chapter_id','<',$id)->max('chapter_id');

       
        return view('pages.noidung')->with(compact('danhmuc','mucluc','chapter','next_chapter','previous_chapter','truyen','all_chapter'));
    }

    public function searchdanhmuc($id){
        $chapter = Chapter::find($id);
        $mucluc = Chapter::where('chapter_truyen_id',$id)->get();
        $danhmuc = DanhMuc::all();
        $tendanhmuc = DanhMuc::find($id);
        $truyen = Truyen::where('truyen_danhmuc_id',$id)->get();
        return view('pages.searchdanhmuc')->with(compact('danhmuc','mucluc','chapter','truyen','tendanhmuc'));
    }

    
    public function search(Request $request){
        $danhmuc = DanhMuc::all();
        $view = Truyen::orderby('truyen_view','DESC')->limit(5)->get();
        $sachhay = Truyen::all()->random(5);
        $data = $request->all();
        $keyword = $data['search'];
        
        $truyen = Truyen::where('ten_truyen','LIKE','%'.$keyword.'%')->orderBy('truyen_id', 'desc')->get();
       
        return view('pages.home')->with(compact('truyen','danhmuc','view','sachhay'));
    }

 
}
