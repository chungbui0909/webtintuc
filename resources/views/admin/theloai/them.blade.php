@extends('admin.layout.index')
@section('content')
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Danh Mục Thể Loại</h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">
				<ol class="breadcrumb">
					<li>
						<i class="breadcrumb-item"></i><a href="admin/theloai/danhsach">Dashboard / </a>
					</li>	
					<li>
						<i class="breadcrumb-item"></i><a href="admin/theloai/danhsach">Danh mục thể loại / </a>
					</li>
					<li class="breadcrumb-item active"> Thêm thể loại </li>			
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
						<form method="post" action="{{route('themTheLoai')}}">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<table>
								<!-- Tên danh mục -->
								<tr>
									<td style="color: green;"> Tên thể loại: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<input type="text" class="form-control" placeholder="Nhập tên thể loại" name="name_theloai" size="80px">
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