@extends('layouts.index')
@section('title')
Chi tiết
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="assets/css/chitiet.css">
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
            <li><a href="#">{{$find_tintuc->loaitin->theloai->Ten}}</a></li>
            <li class="active">{{$find_tintuc->loaitin->Ten}}</li>
          </ol>
          <h1>{{$find_tintuc->TieuDe}}</h1>
          <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Chung Bùi</a> <span><i class="fa fa-calendar"></i>{{$find_tintuc->created_at}}</span> <a href="#"><i class="fa fa-tags"></i>{{$find_tintuc->loaitin->theloai->Ten}}</a> </div>
          <div class="single_page_content"> <img class="img-center" src="upload/tintuc/{{$find_tintuc->Hinh}}" alt="" >
            <p>{!!$find_tintuc->TomTat!!}</p>
            <blockquote>{!!$find_tintuc->NoiDung!!}</blockquote>
            <ul>
              @foreach($tintuc->sortByDesc('created_at')->take(6) as $tt)
              <li><a href="chitiet/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">{{$tt->TieuDe}}</a></li>
              @endforeach

            </ul>
            @if(session('thongbao'))
            <div class="alert alert-success">
              {{session('thongbao')}}
            </div>
            @endif
            @if(Auth::user()!= "")
            <form action="binhluan/{{$find_tintuc->id}}" class="contact_form" method="POST">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <textarea class="form-control" cols="30" rows="5" placeholder="Viết Bình Luận ..." name="NoiDung"></textarea>
              <input type="submit" value="Bình Luận">
            </form>

            @else
            <form class="contact_form">

              <textarea class="form-control" cols="30" rows="5" placeholder="Viết Bình Luận ..." disabled=""></textarea>
              <a href="dangnhap" style="color: red;">Đăng Nhập Tài Khoản Để Bình Luận</a>
            </form>
            @endif
            {{-- đếm số lượt xem --}}
            <i class="fa fa-eye" aria-hidden="true"></i> {{$post->SoLuotXem}}<br> 
            {{-- Đếm số bình luận --}}
            <i class="fa fa-comments" aria-hidden="true"></i> {{$find_tintuc->comment->where('idTinTuc',$find_tintuc->id)->count()}}
            <div class="social_link">
              <ul class="spost_nav wow fadeInDown animated">
                {{-- @foreach($find_tintuc as $tt) --}}

                @foreach($comment as $cmt)  
                <div class="media cmt"> 
                  <table>
                    <tr>
                      <td class="avt">
                        <a class="media-left">
                          <img src="images/post_img1.jpg" alt="">
                        </a>
                      </td>
                      <td class="noi-dung-cmt" >
                        <div class="user-nd">
                          <span class="user-binhluan" >{{$cmt->user->name}}</span>
                          <span class="nd-binhluan" >{{$cmt->NoiDung}}</span>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>    
                @endforeach
              </ul>
            </div>
            {{-- Phân trang bình luận  --}}
            <div style="text-align: center;">
              {!!$comment->links()!!}     
            </div>  
            <!-- end người dùng cmt -->
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
            <h2>Tin Liên Quan <i class="fa fa-thumbs-o-up"></i></h2>
            <ul class="spost_nav wow fadeInDown animated">    
              @foreach ($theloai->where('id',$find_tintuc->loaitin->theloai->id) as $tl )
                @foreach($tl->loaitin->sortByDesc('created_at')->random(3) as $lt)
                  @foreach($tl->tintuc->sortByDesc('created_at')->random(1) as $tt)
                  <li>
                    <div class="media"> <a class="media-left" href="chitiet/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"> <img src="upload/tintuc/{{$tt->Hinh}}" alt=""> </a>
                      <div class="media-body"> <a class="catg_title" href="chitiet/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"> {{$tt->TieuDe}}</a> </div>
                    </div>
                  </li>
                  @endforeach
                @endforeach
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
              <h2><span>Bài Viết Phổ Biến</span></h2>
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



