@extends('../layout')
@section('slider')
  @include('pages.slider')
@endsection
@section('content')
<h3>Sách mới cập nhật</h3>
        <div class="row">
          <div class="row row-cols-3 row-cols-sm-4 row-cols-md-5 g-2">
            @foreach($truyen as $key => $truyen)
            <div class="col">
              <div class="card shadow-sm">
                <a href="{{url('doc-truyen/'.$truyen->truyen_id)}}">
                <img width="100%" height="250px" src="{{asset('storage/app/public/uploads/'.$truyen->hinhanh_truyen.'')}}" alt="">
              </a>
                <div  class="card-body">
                  <h3>{!!substr($truyen->ten_truyen,0,20)!!}..</h3>
                  <p  class="card-text">{!!substr($truyen->mota_truyen,0,150)!!}...</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="{{url('xem-truyen/'.$truyen->truyen_id)}}" type="button" class="btn btn-sm btn-outline-secondary">Xem ngay</a>
                      <a type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"> {{$truyen->truyen_view}}</i></a>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              
              </div>
            </div>

            @endforeach
           
      

         
    
          </div>
          <a style="width: 100px" href="" class="btn btn-success">Xem tất cả</a>
      </div><br>
      <h3>Sách được xem nhiều</h3>
      <div class="row">
        <div class="row row-cols-3 row-cols-sm-4 row-cols-md-5 g-2">
          @foreach($view as $key => $view)
          <div class="col">
            <div class="card shadow-sm">
              <img width="100%" height="250px" src="{{asset('storage/app/public/uploads/'.$view->hinhanh_truyen.'')}}" alt="">
              <div class="card-body">
                <h3>{!!substr($view->ten_truyen,0,15)!!}...</h3>
                <p  class="card-text">{!!substr($view->mota_truyen,0,150)!!}...</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                      <a href="{{url('xem-truyen/'.$view->truyen_id)}}" type="button" class="btn btn-sm btn-outline-secondary">Xem ngay</a>
                      <a type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"> {{$view->truyen_view}}</i></a>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        
         

     
  
        </div>
        <a style="width: 100px " href="" class="btn btn-success">Xem tất cả</a>
    </div>
    @endsection