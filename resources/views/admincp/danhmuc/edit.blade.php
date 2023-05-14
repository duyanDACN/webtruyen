@extends('layouts.app')
@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit danh mục</div>
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
                        <form method="post" action="{{route('danhmuc.update',['danhmuc'=>$danhmuc->danhmuc_id])}}">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                            <input type="text" name="tendanhmuc" value="{{$danhmuc->tendanhmuc}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mô tả danh mục</label>
                            <textarea name="motadanhmuc"  class="form-control" id="" cols="30" rows="10">{{$danhmuc->motadanhmuc}}</textarea>
                            </div>
                            <div class="mb-3">
                                <select name="hienthi" class="form-control" aria-label="Default select example">
                                    <option selected >--Chọn hiển thị--</option>
                                    <option value="1">Hiển thị</option>
                                    <option value="2">Không hiển thị</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Edit danh mục</button>
                        </form>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
