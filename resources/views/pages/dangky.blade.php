<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Đăng Ký Tài Khoản</title>
   <base href="{{asset('')}}">
  <!-- Custom fonts for this template-->
  <link href="admin_asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="admin_asset/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5"  style="border-radius: 20px;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div>
              {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
              <div class="col-lg-12  ">
                {{-- p-5 --}}
                <div class="col-lg-6 p-9" style="margin: auto;">
                  <div class="text-center">
                    <h1 style="margin-top: 35px; color: #d23cd0; font-size: 40px; font-weight: bold;">ĐĂNG KÝ TÀI KHOẢN</h1>
                  </div>
                  {{-- In lỗi --}}
                  @include('admin.blocks.errors')
                  @if(session('thongbao'))
                  <div class="alert alert-success text-center">
                    {{session('thongbao')}}
                  </div>
                  @endif
                  <form class="user" action="{{route('xuLyDangKy')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                     <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="name" id="exampleInputPassword" placeholder="Nhập tên user">
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="Nhập địa chỉ email...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Nhập mật khẩu">
                    </div>
                     <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="passwordAgain" id="exampleInputPassword" placeholder="Nhập lại mật khẩu">
                    </div>
                    
                    <input type="submit"class="btn btn-primary btn-user btn-block" value=" Đăng Ký" style="background-color: #d083cf;">
                     
                    
                   <div class="text-center">
                    <a class="small" href="trangchu">Quay Về Trang Chủ.</a>
                  </div>
                  <div class="text-center mb-5">
                    <a class="small" href="dangnhap">Đăng Nhập</a>
                  </div>
                  <br>
                  <br>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>




  <!-- Bootstrap core JavaScript-->
  <script src="admin_asset/vendor/jquery/jquery.min.js"></script>
  <script src="admin_asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="admin_asset/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="admin_asset/js/sb-admin-2.min.js"></script>

</body>

</html>
