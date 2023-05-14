
@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt kê sách truyện</div>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
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
                            <th scope="col">Tên truyện</th>
                            <th scope="col">View</th>
                            <th scope="col">Hình ảnh truyện</th>
                            <th scope="col">Danh mục truyện</th>
                            <th scope="col">Hiện thị truyện</th>
                            <th scope="col">Tóm tắt nội dung</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($truyen as $key => $truyen)
                                    <tr></tr>
                                        <th scope="row">{{$truyen->truyen_id}}</th>
                                        <td>{{$truyen->ten_truyen}}</td>
                                        <td>{{$truyen->truyen_view}}</td>
                                        <td><img src="{{asset('storage/app/public/uploads/'.$truyen->hinhanh_truyen.'')}}" width="70px" height="70" alt="" /></td>
                                        <td>{{$truyen->danhmuc->tendanhmuc}}</td>
                                        <td>
                                            @if($truyen->hienthi_truyen == 1)
                                                 <span class="text text-success">Hiển thị</span>
                                            @elseif($truyen->hienthitruyen == 2)
                                            <span class="text text-danger">Không hiển thị</span>
                                            @endif
                                        </td>
                                        <td>{!!substr($truyen->mota_truyen,0,100)!!}...</td>
                                        <td>
                                            <form action="{{route('truyen.destroy',['truyen'=>$truyen->truyen_id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button name="deletedanhmuc" class="btn btn-danger">Delete</button>
                                            </form>
                                            <form action="{{route('truyen.show',['truyen'=>$truyen->truyen_id])}}" method="POST">
                                                @method('get')
                                                @csrf
                                                <button name="editdanhmuc" class="btn btn-success">Edit</button>
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
