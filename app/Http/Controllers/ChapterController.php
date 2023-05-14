<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Truyen;
use Illuminate\Support\Facades\Redirect;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapter = Chapter::with('Truyen')->get();
        return view('admincp.chapter.index')->with(compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $truyen = Truyen::all();
        return view('admincp.chapter.create')->with(compact('truyen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request ->validate(
            [
                'tenchapter'=>'required',
                'tomtatchapter'=>'required',
                'noidungchapter'=>'required',
            ],
            [
                'tenchapter.required'=>'Tên truyện không được bỏ trống !',
                'tomtatchapter.required'=>'Tóm tắt truyện không được bỏ trống !',
                'noidungchapter.required'=>'Nội dung truyện không được bỏ trống !',
            ]
            );

            $data = $request->all();
            $chapter = new Chapter();
            $chapter->chapter_truyen_id = $data['chapter_truyen_id'];
            $chapter->ten_chapter = $data['tenchapter'];
            $chapter->tomtat_chapter = $data['tomtatchapter'];
            $chapter->noidung_chapter = $data['noidungchapter'];
            $chapter->kichhoat_chapter = $data['hienthichapter'];
            $chapter->save();
            return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($chapter)
    {
        $chapter = Chapter::find($chapter);
        $truyen = Truyen::all();
        return view('admincp.chapter.edit')->with(compact('truyen','chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $chapter)
    {
        $data = $request ->validate(
            [
                'tenchapter'=>'required',
                'tomtatchapter'=>'required',
                'noidungchapter'=>'required',
            ],
            [
                'tenchapter.required'=>'Tên truyện không được bỏ trống !',
                'tomtatchapter.required'=>'Tóm tắt truyện không được bỏ trống !',
                'noidungchapter.required'=>'Nội dung truyện không được bỏ trống !',
            ]
            );

            $data = $request->all();
            $editchapter = Chapter::find($chapter);
            $editchapter->chapter_truyen_id = $data['chapter_truyen_id'];
            $editchapter->ten_chapter = $data['tenchapter'];
            $editchapter->tomtat_chapter = $data['tomtatchapter'];
            $editchapter->noidung_chapter = $data['noidungchapter'];
            $editchapter->kichhoat_chapter = $data['hienthichapter'];
            $editchapter->save();
            return Redirect('chapter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($chapter)
    {
        $deleted = Chapter::where('chapter_id',$chapter)->delete();
        return Redirect()->back();
    }
}
