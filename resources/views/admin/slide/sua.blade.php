@extends('admin.layout.index')
@section('content')
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Thêm Slide</h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">
				<ol class="breadcrumb">
					<li>
						<i class="breadcrumb-item"></i><a href="admin/slide/danhsach">Dashboard / </a>
					</li>	
					<li>
						<i class="breadcrumb-item"></i><a href="admin/slide/danhsach">Danh Sách Slide / </a>
					</li>
					<li class="breadcrumb-item active"> {{$slide->Ten}} </li>			
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
						<form method="POST" action="admin/slide/sua/{{$slide->id}}" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<table>
								<!-- Tên danh mục -->
								<tr>
									<td style="color: green;"> Tên slide: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<input type="text" class="form-control" placeholder="Nhập tên danh mục" name="TenSlide" size="80px" value="{{$slide->Ten}}">
									</td>
								</tr>
								{{-- Hình --}}
								<tr>
									<td style="color: green;"> Hình: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<input type="file"  name="Hinh" size="80px">
										<img src="upload/slide/{{$slide->Hinh}}" width="500px" height="150px">
									</td>
								</tr>
								{{-- Nội Dung --}}
								<tr>
									<td style="color: green;"> Nội Dung: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<textarea cols="95" rows="4" class="form-control" name="NoiDung">{{$slide->NoiDung}}</textarea>
									</td>
								</tr>
								{{-- Link --}}
								<tr>
									<td style="color: green;"> Link: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<input type="text" class="form-control" placeholder="Nhập tên danh mục" name="Link" size="80px" value="{{$slide->link}}">
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