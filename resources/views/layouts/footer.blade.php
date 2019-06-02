<footer id="footer">
  <div class="footer_top">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="footer_widget wow fadeInLeftBig">
          <h2>Flickr Images</h2>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="footer_widget wow fadeInDown">
          <h2>Tag</h2>
          <ul class="tag_nav">
            @foreach($theloai as $tl)
              <li><a href="#">{{$tl->Ten}}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="footer_widget wow fadeInRightBig">
          <h2>Contact</h2>
          <p><a href="https://www.facebook.com/01297316957a"> <span style="color: white;">https://www.facebook.com/01297316957a</span></a></p>
          <address>
            Bùi Gia Company - 0889.542.245
          </address>
        </div>
      </div>
    </div>
  </div>
  <div class="footer_bottom">
    <p class="copyright">Copyright &copy; 2019 <a href="index.html">Bùi Gia Company</a></p>
    
  </div>
</footer>