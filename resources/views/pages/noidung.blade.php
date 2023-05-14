
@extends('../layout')
{{--  @section('slider')
  @include('pages.slider')
@endsection  --}}
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{url('doc-truyen/'.$truyen->truyen_id)}}">{{$truyen->ten_truyen}}</a></li>
    <li class="breadcrumb-item"><a href="{{url('xem-truyen/'.$truyen->truyen_id)}}">Mục lục</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$chapter->ten_chapter}}</li>
    
  </ol>
</nav>
        <h4 style="text-align:center">{{$chapter->ten_chapter}}</h4>
        <a href="{{url('noi-dung/'.$next_chapter)}}" style="position: absolute; left: 52.3%;" type="button" class="btn btn-success">Chương sau</a>
        <select class="btn btn-success select-chapter" name="kichhoat" id="select-chapter" style="position: absolute; left: 44.5%;" aria-label="Default select example">
          <option selected>Chọn Chương</option>
          @foreach($all_chapter as $key => $all)
              <option value="{{url('noi-dung/'.$all->chapter_id)}}">{!!substr($all->ten_chapter,0,10)!!}</option>
          @endforeach
         
         
        </select>
        <a href="{{url('noi-dung/'.$previous_chapter)}}" style="position: absolute; right: 56%;" type="button" class="btn btn-success">Chương trước</a>
        
        
              <br/>.<h6>{{$chapter->noidung_chapter}}</h6>
             
        
        
        
    @endsection