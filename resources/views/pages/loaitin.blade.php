@extends('layouts.index')
@section('title')
Loại Tin
@endsection
@section('css')
 <link rel="stylesheet" type="text/css" href="assets/css/loaitin.css">
@endsection
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
              <li class="facebook"><a href="#"></a></li>
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
<section id="contentSection">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8">
      <div class="left_content">
        <div class="single_page">
          <ol class="breadcrumb">
            <li><a href="trangchu">Home</a></li>
            <li><a href="trangchu">{{$find_loaiTin->theloai->Ten}}</a></li>
            <li class="active">{{$find_loaiTin->Ten}}</li>
          </ol>
          <button class="btn btn-theme" style="font-size: 30px;"> {{$find_loaiTin->Ten}} </button>
            <div class="social_link">
              <ul class="spost_nav wow fadeInDown animated">
                
                  @foreach($tintuc as $tt)

                  <div class="media cmt"> 
                    <table>
                      <tr>
                        <th class="hinh">
                          <a class="media-left" href="chitiet/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                            <img src="upload/tintuc/{{$tt->Hinh}}" alt="">
                          </a>
                        </th>
                        <th class="tom-tat" >
                          <p class="ten-tin-tuc">{{$tt->TieuDe}}</p>
                          <p class="nd-tom-tat">{!!$tt->TomTat!!}</p>
                          <div>
                            <a href="chitiet/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"><button class="btn btn-theme">Xem chi tiết </button></a>
                          </div>
                        </th>
                      </tr>
                    </table>
                  </div>
                  @endforeach
                
              </ul>
            </div>
              <div style="text-align: center;">
                {!!$tintuc->links()!!}     
              </div>  
            <div class="social_link">
              <ul class="sociallink_nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
            <div class="related_post">
              <h2>TIN LIÊN QUAN <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">
                @foreach($loaitin->sortByDesc('created_at')->take(4) as $tin_lien_quan)
                <li>
                  <div class="media wow fadeInDown"> <a href="chitiet/{{$tin_lien_quan->id}}/{{$tin_lien_quan->TieuDeKhongDau}}.html" class="media-left"> <img alt="" src="upload/tintuc/{{$tin_lien_quan->Hinh}}"> </a>
                    <div class="media-body"> <a href="chitiet/{{$tin_lien_quan->id}}/{{$tin_lien_quan->TieuDeKhongDau}}.html" class="catg_title">{{$tin_lien_quan->TieuDe}}</a> </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
      <nav class="nav-slit"> <a class="prev" href="#"> <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
        <div>
          <h3>City Lights</h3>
          <img src="images/post_img1.jpg" alt=""/> </div>
        </a> <a class="next" href="#"> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
          <div>
            <h3>Street Hills</h3>
            <img src="images/post_img1.jpg" alt=""/> </div>
          </a> </nav>
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
              <div class="single_sidebar">
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