
@extends('../layout')
{{--  @section('slider')
  @include('pages.slider')
@endsection  --}}
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      {{--  <li class="breadcrumb-item"><a href="{{url('doc-truyen/'.$truyen)}}">{{$truyen->ten_truyen}}</a></li>  --}}
      <li class="breadcrumb-item active" aria-current="page">{{$truyen->ten_truyen}}</li>
    </ol>
  </nav>

  <div class="row">
    <div class="col-md-9">
        <div class="row">
        <div class="col-md-3">
            <img width="100%" height="250px" src="{{asset('storage/app/public/uploads/'.$truyen->hinhanh_truyen.'')}}" alt="">
        </div>
            <div class="col-md-3">
                <style type="text/css">
                    .infotruyen{
                        list-style: none;
                    }
                </style>
                <ul class="infotruyen">
                    <li>Tác giả : Yokoshima</li>
                    <li>Số chapter : 200</li>
                    <li>Số lượt xem : {{$truyen->truyen_view}}</li>
                    <li><a href="{{url('xem-truyen/'.$truyen->truyen_id)}}">Xem mục lục</a></li>
                    <li ><a class="btn btn-primary" href="{{url('xem-truyen/'.$truyen->truyen_id)}}">Đọc online</a></li>
                    <li style="margin-top:5px"><a class="btn btn-primary new" href="{{url('noi-dung/'.$new_chapter_id)}}">Đọc chương mới nhất</a></li>
                </ul>

              
            </div>

            <div class="col-md-6">
              <style type="text/css">
                  .infotruyen{
                      list-style: none;
                  }
              </style>
              <ul class="infotruyen">
                 <h3>Các chương mới nhất</h3>
                 <ul>
                      @foreach($new_chapter as $key => $new)
                          <li><a href="{{url('noi-dung/'.$new->chapter_id)}}">{{$new->ten_chapter}}</a></li>
                      @endforeach
                   
                 </ul>
              </ul>

            
          </div>
            
        </div>
        <br>
        <div class="col-md-12">
            <p>{{$truyen->mota_truyen}}</p>
        </div>
        <hr>

        <div class="fb-comments" data-href="http://localhost/sachtruyen/doc-truyen/7" data-width="10" data-numposts="10"></div>
    
        <h3>Sách cùng danh mục</h3>
      
        <div class="row">
          <div class="row row-cols-3 row-cols-sm-3 row-cols-md-7 g-2">
  
           @foreach($truyenlienquan as $key => $lienquan)
            
           
            <div class="col">
              <div class="card shadow-sm">
                <img width="100%" height="250px" src="{{asset('storage/app/public/uploads/'.$lienquan->hinhanh_truyen.'')}}" alt="">
                <div class="card-body">
                  <h3>{!!substr($lienquan->ten_truyen,0,15)!!}...</h3>
                  <p  class="card-text">{!!substr($lienquan->mota_truyen,0,150)!!}...</p>
                  <div class="d-flex justify-content-between align-items-center">
                    
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            
            @endforeach

            
  
      
  
           
  
       
    
          </div>
       
      </div>

      
      
        
    </div>  
    <div class="col-md-3">
        <h3>Sách có lượt xem nhiều nhất</h3>
        <ul>
                @foreach($view as $key => $view)
                <li><a href="{{url('/doc-truyen/'.$view->truyen_id.'')}}">{{$view->ten_truyen}}</a></li>
                @endforeach
                  
          
          
      </ul>	
    </div>  
  </div>

    @endsection