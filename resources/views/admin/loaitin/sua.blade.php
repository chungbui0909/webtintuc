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
		<h1>Sửa Loại Tin</h1>
		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i><a href="admin/loaitin/danhsach">Dashboard / </a>
			</li>	
			<li>
				<i class="fa fa-dashboard"></i><a href="admin/loaitin/danhsach">Danh Sách Loại Tin / </a>
			</li>
			<li class="active">
				<i class="fa fa-dashboard"></i>{{$loaitin->Ten}}
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
					<form method="POST" action="admin/loaitin/sua/{{$loaitin->id}}">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<table>
							
							
							
							<tr>
								<td class="title">Tên Thể Loại:</td>
								<td>
									<select class="form-control">
										
										@foreach($theloai as $tl)

										<option 
										@if($loaitin->idTheloai == $tl->id) 
											{{'selected'}}
										@endif
			
										value="{{$tl->id}}">{{$tl->Ten}}</option>
										@endforeach
									</select>
								</td>
							</tr>
							<tr>
								<td class="title">Tên loại tin:</td>
								<td>
									<input type="text" class="form-control" name="tenLoaiTin" value="{{$loaitin->Ten}}">
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