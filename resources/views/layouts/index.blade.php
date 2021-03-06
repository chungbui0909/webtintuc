<!DOCTYPE html>
<html lang="vi">
<head>
  <title>NewsFeed | @yield('title')</title>
  <base href="{{asset('')}}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
  <link rel="stylesheet" type="text/css" href="assets/css/font.css">
  <link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
  <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
  <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
  <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  
  @yield('css')
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
  <div class="container">

    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')
  </div>
  <script src="assets/js/jquery.min.js"></script> 
  <script src="assets/js/wow.min.js"></script> 
  <script src="assets/js/bootstrap.min.js"></script> 
  <script src="assets/js/slick.min.js"></script> 
  <script src="assets/js/jquery.li-scroller.1.0.js"></script> 
  <script src="assets/js/jquery.newsTicker.min.js"></script> 
  <script src="assets/js/jquery.fancybox.pack.js"></script> 
  <script src="assets/js/custom.js"></script>
  @yield('script')
</body>
</html>