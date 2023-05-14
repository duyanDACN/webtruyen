
@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm sách truyện</div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post" action="{{route('truyen.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên truyện</label>
                          <input type="text" name="tentruyen" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Thêm lượt xem</label>
                            <input type="text" name="truyen_view" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Tóm tắt truyện</label>
                          <textarea name="motatruyen" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Hình ảnh truyện</label>
                            <input type="file" name="hinhanhtruyen" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                          <div class="mb-3">
                            <select name="danhmuctruyen" class="form-control" aria-label="Default select example">
                                <option selected >--Chọn danh muc--</option>
                                @foreach($danhmuc as $key => $danhmuc)
                                <option value="{{$danhmuc->danhmuc_id}}">{{$danhmuc->tendanhmuc}}</option>
                                @endforeach
                              
                            </select>
                        </div>
                        <div class="mb-3">
                            <select name="hienthitruyen" class="form-control" aria-label="Default select example">
                                <option selected >--Chọn hiển thị--</option>
                                <option value="1">Hiển thị</option>
                                <option value="2">Không hiển thị</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Thêm truyện</button>
                      </form>


                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
