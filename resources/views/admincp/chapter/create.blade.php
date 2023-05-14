
@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm chapter</div>
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

                    <form method="post" action="{{route('chapter.store')}}">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên chapter</label>
                          <input type="text" name="tenchapter" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Tóm tắt chapter</label>
                          <textarea name="tomtatchapter" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nội dung chapter</label>
                            <textarea name="noidungchapter" class="form-control" id="" cols="30" rows="10"></textarea>
                          </div>

                          <div class="mb-3">
                            <select name="chapter_truyen_id" class="form-control" aria-label="Default select example">
                                <option selected >--Thuộc truyện--</option>
                                @foreach($truyen as $key => $truyen)
                                        <option value="{{$truyen->truyen_id}}">{{$truyen->ten_truyen}}</option>
                                @endforeach
                            
                               
                            </select>
                        </div>

                        <div class="mb-3">
                            <select name="hienthichapter" class="form-control" aria-label="Default select example">
                                <option selected >--Chọn hiển thị--</option>
                                <option value="1">Hiển thị</option>
                                <option value="2">Không hiển thị</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                      </form>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
