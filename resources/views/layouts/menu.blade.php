<section id="navArea">
  <nav class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    </div>

    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav main_nav">
        <li class="active"><a href="trangchu"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
        
        @foreach($theloai as $tl)
          @if(count($tl->loaitin)>0)
            <li class="dropdown"> 
              <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{$tl->Ten}}</a>
              <ul class="dropdown-menu" role="menu">
                @foreach($tl->loaitin as $lt)
                  <li><a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html">{{$lt->Ten}}</a></li>
                @endforeach
              </ul>
            </li>
          @endif
        @endforeach
       
        <li><a href="lienhe">Liên Hệ</a></li>
        
      </ul>
    </div>
  </nav>
  {{-- Tìm kiếm --}}
  <section>
   <div class="navbar-collapse  text-center" style=" margin-bottom: 30px;">
     <form method="post" action="timkiem">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input class="form-control form-control" name="tukhoa" type="text" placeholder="Nhập từ khóa tìm kiếm" aria-label="Search">
    </form>
  </div>
</section>
</section>
