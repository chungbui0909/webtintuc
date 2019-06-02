<section id="sliderSection">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8">
      <div class="slick_slider">
        @foreach($slide as $sl)
        <div class="single_iteam"> <a href="single_page.html"> <img src="upload/slide/{{$sl->Hinh}}" alt=""></a>
          <div class="slider_article">
            <h2><a class="slider_tittle" href="single_page.html">{{$sl->Ten}}</a></h2>
            <p>{{$sl->NoiDung}}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
   