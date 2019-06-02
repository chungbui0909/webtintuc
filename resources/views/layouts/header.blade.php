<header id="header">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm">
      @if(Auth::user()!= "")
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="trangchu">Trang Chủ</a></li>
              <li><a href="trangchu">Giới Thiệu</a></li>
              <li><a href="lienhe">Liên Hệ</a></li>
            </ul>
          </div>
          <div style="float: right;">
            <ul class="top_nav">
              <li><a href="" style="width: auto;">{{Auth::user()->name}}</a></li>
              <li><a href="dangxuat">Đăng Xuất</a></li>
            </ul>
          </div>
        </div>
        
      @else
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="trangchu">Trang Chủ</a></li>
              <li><a href="#">Giới Thiệu</a></li>
              <li><a href="lienhe">Liên Hệ</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <ul class="top_nav" style="margin-left: 350px;">
              <ion-icon name="search"></ion-icon>
              <li><a href="dangky">Đăng Ký</a></li>
              <li><a href="dangnhap">Đăng Nhập</a></li>
            </ul>
          </div>
        </div>
      @endif
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="header_bottom">
        <div class="logo_area"><a href="trangchu" class="logo"><img src="images/logo.jpg" alt=""></a></div>
        {{-- <div class="add_banner"><a href="#"><img src="images/addbanner_728x90_V1.jpg" alt=""></a></div> --}}
      </div>
    </div>
  </div>
</header>