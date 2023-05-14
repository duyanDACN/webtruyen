
@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt kê danh mục</div>

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
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Mô tả danh mục</th>
                            <th scope="col">Hiện thị</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($danhmuc as $key => $danhmuc)
                                    <tr>
                                        <th scope="row">{{$danhmuc->danhmuc_id}}</th>
                                        <td>{{$danhmuc->tendanhmuc}}</td>
                                        <td>{{$danhmuc->motadanhmuc}}</td>
                                        <td>
                                            @if($danhmuc->hienthi == 1)
                                                 <span class="text text-success">Hiển thị</span>
                                            @elseif($danhmuc->hienthi == 2)
                                            <span class="text text-danger">Không hiển thị</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{route('danhmuc.destroy',['danhmuc'=>$danhmuc->danhmuc_id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button name="deletedanhmuc" class="btn btn-danger">Delete</button>
                                            </form>
                                            <form action="{{route('danhmuc.show',['danhmuc'=>$danhmuc->danhmuc_id])}}" method="POST">
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
