@extends('admin.layout.index')
@section('content')
<!--  nội dung -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Danh Mục Thể Loại <a href="admin/theloai/them" class="btn btn-success">Thêm Mới </a></h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">
				<ul class="breadcrumb">
					<li>
						<i class="breadcrumb-item"></i><a href="admin/theloai/danhsach">Dashboard / </a>
					</li>	
					<li class="breadcrumb-item active"> Danh Mục Thể Loại</li>	
				</ul>		
			</h6>
			
		</div>
		<div class="card-header py-3">
			
			@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}
			</div>
			@endif
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên Thể Loại</th>
							<th>Tên Không Dấu</th>
							<th colspan="2">Action</th>
						</tr>
					</thead> 
					<tbody>
						<?php $stt =1; ?>
						@foreach($theloai as $tl)
						
						<tr>
							<th scope="row">{{$stt++}}</th>
							<td>{{$tl->Ten}}</td>
							<td>{{$tl->TenKhongDau}}</td>
							<td>
								<a href="admin/theloai/sua/{{$tl->id}}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i>Sửa
								</a>
							</td>
							<td>
								<a href="admin/theloai/xoa/{{$tl->id}}" class="btn btn-xs btn-danger"><i class="fa fa-edit"></i>Xóa
								</a>
							</td>									
						</tr>
						
						@endforeach
					</tbody>
				</table>
			</div>
			<div style="height: 100px;">
				<div style=" margin: 0 auto; width: 500px;">
					{!!$theloai->links()!!}			
				</div>	
			</div>
		</div>
	</div>
</div>
<!-- Kết thúc nội dung -->
@endsection