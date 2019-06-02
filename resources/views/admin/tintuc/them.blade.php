@extends('admin.layout.index')
@section('content')
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Danh Mục Tin Tức</h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">
				<ol class="breadcrumb">
					<li>
						<i class="breadcrumb-item"></i><a href="admin/tintuc/danhsach">Dashboard / </a>
					</li>	
					<li>
						<i class="breadcrumb-item"></i><a href="admin/tintuc/danhsach">Danh mục tin tức/ </a>
					</li>
					<li class="breadcrumb-item active"> Thêm tin tức </li>			
				</ol>	
			</h6>
		</div>
		<div class="card-header py-3">
			@include('admin.blocks.errors')
			@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}
			</div>
			@endif
		</div>
		<div class="card-body" style="background: grey;">
			<div class="table-responsive" style="background: lightblue;">
				<div class="row">
					<div style="margin: 0 auto; margin-top: 20px">	
						<form method="POST" action="{{route('themTinTuc')}}" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<table>
								<!-- Thể Loại -->
								<tr>
									<td style="color: green;"> Thể Loại: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<select class="form-control" name="TheLoai" id="TheLoai">
											@foreach($theloai as $tl)
											<option value="{{$tl->id}}">{{$tl->Ten}}</option>
											@endforeach
										</select>
									</td>

								</tr>
								<!-- Loại Tin -->
								<tr>
									<td style="color: green;"> Loại Tin: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<select class="form-control" name="LoaiTin" id="LoaiTin">
											@foreach($loaitin as $lt)
											<option value="{{$lt->id}}">{{$lt->Ten}}</option>
											@endforeach
										</select>
									</td>
								</tr>
								<!-- Tiêu Đề -->
								<tr>
									<td style="color: green;"> Tiêu Đề: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<input type="text" name="TieuDe" placeholder="Nhập tiêu đề" class="form-control" size="80px">
									</td>
								</tr>
								<!-- Tóm Tắt -->
								<tr>
									<td style="color: green;"> Tóm Tắt: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										{{-- <input type="text" class="form-control" placeholder="Nhập tóm tắt nội dung" name="TomTat" size="80px"> --}}
										<textarea cols="95" rows="4" class="form-control ckeditor" id="editor1" name="TomTat"></textarea>
										<script> 

											CKEDITOR.replace( 'TomTat', {
												filebrowserBrowseUrl: 'admin_asset/ckfinder/ckfinder.html',
												filebrowserImageBrowseUrl: 'admin_asset/ckfinder/ckfinder.html?type=Images',
												filebrowserFlashBrowseUrl: 'admin_asset/ckfinder/ckfinder.html?type=Flash',
												filebrowserUploadUrl: 'admin_asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
												filebrowserImageUploadUrl: 'admin_asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
												filebrowserFlashUploadUrl:'admin_asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
											} );
										</script>


									</td>

								</tr>
								<!-- Nội Dung -->
								<tr>
									<td style="color: green;"> Nội Dung: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<textarea cols="95" rows="4" class="form-control ckeditor" id="editor2" name="NoiDung"></textarea>
										<script> 

											CKEDITOR.replace( 'NoiDung', {
												filebrowserBrowseUrl: 'admin_asset/ckfinder/ckfinder.html',
												filebrowserImageBrowseUrl: 'admin_asset/ckfinder/ckfinder.html?type=Images',
												filebrowserFlashBrowseUrl: 'admin_asset/ckfinder/ckfinder.html?type=Flash',
												filebrowserUploadUrl: 'admin_asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
												filebrowserImageUploadUrl: 'admin_asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
												filebrowserFlashUploadUrl:'admin_asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
											} );
										</script>
									</td>
								</tr>
								<!-- Hình -->
								<tr>
									<td style="color: green;"> Hình: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<input type="file"  name="Hinh" size="80px">
									</td>
								</tr>
								<!-- Nổi bật -->
								<tr>
									<td style="color: green;"> Nổi Bật: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<input type="radio"  name="NoiBat" value="1">Có
										<input type="radio"  name="NoiBat"  value="0" checked="">Không
									</td>
								</tr>
								
							</table>
							<div style=" margin: 0 auto;margin-top: 20px;">
								<input type="submit" name="submit" value="Lưu" class="btn btn-success">
							</div>		
						</form>
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

{{-- ajax --}}
@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			$("#TheLoai").change(function(){
				var idTheLoai = $(this).val();
				$.get("admin/ajax/loaitin/"+idTheLoai,function(data){
					// tạo route admin/ajax/loaitin/id thì khi gọi route này nó sẽ vào ajaxController để xử lý
					// Kết quả trả về lưu vào data
					// sau đó thay dữ liệu ở id LoaiTin bằng data
					
					$("#LoaiTin").html(data);// thay thế dữ liệu tại id = LoaiTin
				});
			});
		});

	</script>

@endsection
