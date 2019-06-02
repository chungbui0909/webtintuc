@extends('admin.layout.index')
@section('content')
<!--  nội dung -->
<style type="text/css">
	table{
		width: 700px;
		color: green;
	}

</style>
<div id="content-wrapper">
	<div class="container-fluid">
		<h1>Sửa Tin Tức</h1>
		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i><a href="admin/tintuc/danhsach">Dashboard / </a>
			</li>	
			<li>
				<i class="fa fa-dashboard"></i><a href="admin/tintuc/danhsach">Danh Sách Tin Tức / </a>
			</li>
			<li class="active">
				<i class="fa fa-dashboard"></i>{{$tintuc->TieuDe}}
			</li>	
		</ol>
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
					<form method="POST" action="admin/tintuc/sua/{{$tintuc->id}}" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<table>
								<!-- Thể Loại -->
								<tr>
									<td style="color: green;"> Thể Loại: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<select class="form-control" name="TheLoai" id="TheLoai">
											@foreach($theloai as $tl)
												<option 
												@if($tintuc->loaitin->theloai->id == $tl->id)
													{{"selected"}}
												@endif
												value="{{$tl->id}}">{{$tl->Ten}}</option>
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
												@if($lt->id == $tintuc->idLoaiTin)
													<option value="{{$lt->id}}" selected="">{{$lt->Ten}}</option>
												@else
													<option value="{{$lt->id}}">{{$lt->Ten}}</option>
												@endif
											@endforeach
											
										</select>
									</td>
								</tr>
								<!-- Tiêu Đề -->
								<tr>
									<td style="color: green;"> Tiêu Đề: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<input type="text" name="TieuDe" placeholder="Nhập tiêu đề" class="form-control" size="80px" value="{{$tintuc->TieuDe}}">
									</td>
								</tr>
								<!-- Tóm Tắt -->
								<tr>
									<td style="color: green;"> Tóm Tắt: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										{{-- <input type="text" class="form-control" placeholder="Nhập tóm tắt nội dung" name="TomTat" size="80px"> --}}
										<textarea cols="95" rows="4" class="form-control ckeditor" id="editor1" name="TomTat">{{$tintuc->TomTat}}</textarea>
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
										<textarea cols="95" rows="4" class="form-control ckeditor" id="editor2" name="NoiDung">{{$tintuc->NoiDung}}</textarea>
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
										<img src="upload/tintuc/{{$tintuc->Hinh}}" width="80px" height="80px">
									</td>
								</tr>
								<!-- Nổi bật -->
								<tr>
									<td style="color: green;"> Nổi Bật: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										
										<input type="radio"  name="NoiBat" value="1" 
										@if($tintuc->NoiBat == 1)
										{{"checked"}}
										@endif
										>Có
										<input type="radio"  name="NoiBat"  value="0" 

										@if($tintuc->NoiBat == 0)
										{{"checked"}}
										@endif
	

										>Không
									</td>
								</tr>
								
							</table>
							<div style=" margin: 0 auto;margin-top: 20px;">
								<input type="submit" name="submit" value="Lưu" class="btn btn-success">
							</div>		
						</form>
				</div>					
			</div>

			{{-- coment --}}
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<th style="color: blue; font-weight: bold;font-size: 40px; text-align: center;">DANH SÁCH BÌNH LUẬN</th>
				</table>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color: black;">
					<thead>
						<tr>
							<th>STT</th>
							
							<th>Người Dùng</th>
							<th>Nội Dung</th>
							<th>Ngày Đăng</th>

							<th>Action</th>
						</tr>
					</thead> 
					<tbody>
						<?php $stt =1;?>
						@foreach($tintuc->comment as $cmt)
						<tr>
							<th scope="row">{{$stt++}}</th>
							<td>{{$cmt->user->name}}</td>
							<td>{{$cmt->NoiDung}}</td>

							

							<td>{{$cmt->created_at}}</td>
							
							
							<td>
								<a href="admin/comment/xoa/{{$cmt->id}}" class="btn btn-xs btn-danger"><i class="fa fa-edit"></i>Xóa
								</a>
							</td>									
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			{{-- end comment --}}
		</div>
	</div>
	<!-- Kết thúc nội dung -->
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