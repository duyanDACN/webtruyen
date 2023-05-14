
@extends('../layout')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{url('doc-truyen/'.$truyen->truyen_id)}}">{{$truyen->ten_truyen}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Mục lục</li>
  </ol>
</nav>
        <h4>Mục lục truyện</h4>
        <ul class="mucluctruyen">
           @foreach($mucluc as $ey => $mucluc)
            <li><a href="{{url('noi-dung/'.$mucluc->chapter_id)}}">{{$mucluc->ten_chapter}}</a></li>
           @endforeach
            
        </ul>
       

    @endsection