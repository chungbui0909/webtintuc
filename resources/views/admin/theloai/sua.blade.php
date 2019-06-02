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
		
		<h1>Sửa Thể Loại</h1>
		
		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i><a href="admin/theloai/danhsach">Dashboard / </a>
			</li>	
			<li>
				<i class="fa fa-dashboard"></i><a href="admin/theloai/danhsach">Danh Sách Thể Loại </a>
			</li>
			<li class="active">
				<i class="fa fa-dashboard"></i>{{$theloai->Ten}}
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
					
					<form method="post" action="admin/theloai/sua/{{$theloai->id}}">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<table>
							<!-- Tên danh mục -->
							<tr>
								<td class="title">Tên thể loại:</td>
								<td>
									<input type="text" class="form-control" placeholder="Nhập tên thể loại" name="name_theloai" value="{{$theloai->Ten}}">
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
	<!-- Kết thúc nội dung -->
@endsection