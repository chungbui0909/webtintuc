@extends('layouts.index')
@section('title')
  Liên hệ
@endsection



@section('content')
@include('layouts.menu')
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="contact_area">
            <h2>Liên hệ:</h2>
            <p><a href="https://www.facebook.com/01297316957a"> https://www.facebook.com/01297316957a</a></p>
            <form action="#" class="contact_form">
              <input class="form-control" type="text" placeholder="Name*">
              <input class="form-control" type="email" placeholder="Email*">
              <textarea class="form-control" cols="30" rows="10" placeholder="Message*"></textarea>
              <input type="submit" value="Gửi">
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Tin Phổ Biến</span></h2>
            <ul class="spost_nav">
              @foreach($tintuc->where('SoLuotXem','>=',200)->sortByDesc('SoLuotXem')->take(4) as $tin_pho_bien)
                <li>
                  <div class="media wow fadeInDown"> <a href="chitiet/{{$tin_pho_bien->id}}/{{$tin_pho_bien->TieuDeKhongDau}}.html" class="media-left"> <img alt="" src="upload/tintuc/{{$tin_pho_bien->Hinh}}"> </a>
                    <div class="media-body"> <a href="chitiet/{{$tin_pho_bien->id}}/{{$tin_pho_bien->TieuDeKhongDau}}.html" class="catg_title">{{$tin_pho_bien->TieuDe}}</a> </div>
                  </div>
                </li>
                @endforeach
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </section>
@endsection