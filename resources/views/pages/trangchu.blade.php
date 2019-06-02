@extends('layouts.index')
@section('content')
  @include('layouts.menu')
  <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>Tin tức mới nhất</span>
          <ul id="ticker01" class="news_sticker">
            @foreach($tintuc as $tt)
            <li><a href="chitiet/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"><img src="upload/tintuc/{{$tt->Hinh}}" alt="">{{$tt->TieuDe}}</a></li>
            @endforeach
          </ul>
          <div class="social_area">
            <ul class="social_nav">
              <li class="facebook"><a href="https://www.facebook.com/01297316957a"></a></li>
              <li class="twitter"><a href="#"></a></li>
              <li class="flickr"><a href="#"></a></li>
              <li class="pinterest"><a href="#"></a></li>
              <li class="googleplus"><a href="#"></a></li>
              <li class="vimeo"><a href="#"></a></li>
              <li class="youtube"><a href="#"></a></li>
              <li class="mail"><a href="#"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  @include('layouts.slide')
     <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Tin tức mới nhất</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              @foreach($tintuc->sortByDesc('created_at')->take(5) as $tt)
                <li>
                  <div class="media"> <a href="chitiet/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html" class="media-left"> <img alt="" src="upload/tintuc/{{$tt->Hinh}}"> </a>
                    <div class="media-body"> <a href="chitiet/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html" class="catg_title"> {{$tt->TieuDe}}</a> </div>
                  </div>
                </li>
              @endforeach
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contentSection">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8">
      <div class="left_content">
        @foreach($theloai as $tl)
        <div class="single_post_content">
          <h2><span>{{$tl->Ten}}</span></h2>
          <?php
            $data = $tl->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(5);
            $tin1 = $data->shift();
          ?>
          <div class="single_post_content_left">
            <ul class="business_catgnav  wow fadeInDown">
              <li>
                <figure class="bsbig_fig"> <a href="chitiet/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html" class="featured_img"> <img alt="" src="upload/tintuc/{{$tin1['Hinh']}}"> <span class="overlay"></span> </a>
                  <figcaption> <a href="chitiet/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">{{$tin1['TieuDe']}}</a> </figcaption>
                  <p>{!!$tin1['TomTat']!!}</p>
                </figure>
              </li>
            </ul>
          </div>
          <div class="single_post_content_right">
            <ul class="spost_nav">
              @foreach($data->all() as $tt)
              <li>
                <div class="media wow fadeInDown"> <a href="chitiet/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html" class="media-left"> <img alt="" src="upload/tintuc/{{$tt->Hinh}}"> </a>
                  <div class="media-body"> <a href="chitiet/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html" class="catg_title"> {{$tt->TieuDe}}</a> </div>
                </div>
              </li>
              @endforeach

              
            </ul>
          </div>
        </div>
        @endforeach
       
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
        <div class="single_sidebar  wow fadeInDown">
          <h2><span>Thể Loại Tin</span></h2>
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="category">
              <ul>
                @foreach($theloai as $tl)
                  <li class="cat-item"><a href="#">{{$tl->Ten}}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection