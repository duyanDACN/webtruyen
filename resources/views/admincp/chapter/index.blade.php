
@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt kê chapter</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên chapter</th>
                            <th scope="col">Tóm tắt chapter</th>
                            <th scope="col">Nội dung chapter</th>
                            <th scope="col">Thuộc truyện</th>
                            <th scope="col">Hiện thị</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($chapter as $key => $chap)
                                    <tr>
                                        <th scope="row">{{$chap->chapter_id}}</th>
                                        <td>{{$chap->ten_chapter}}</td>
                                        <td>{!!substr($chap->tomtat_chapter,0,100)!!}</td>
                                        <td>{!!substr($chap->noidung_chapter,0,100)!!}</td>
                                        <td>{{$chap->Truyen->ten_truyen}}</td>
                                        <td>
                                            @if($chap->kichhoat_chapter == 1)
                                                 <span class="text text-success">Hiển thị</span>
                                            @elseif($chap->kichhoat_chapter == 2)
                                            <span class="text text-danger">Không hiển thị</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{route('chapter.destroy',['chapter'=>$chap->chapter_id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button name="deletechapter" class="btn btn-danger">Delete</button>
                                            </form>
                                            <form action="{{route('chapter.show',['chapter'=>$chap->chapter_id])}}" method="POST">
                                                @method('get')
                                                @csrf
                                                <button name="editchapter" class="btn btn-success">Edit</button>
                                            </form>
                                        </td>
                                    </tr>
                            @endforeach
                         
                        </tbody>
                      </table>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
