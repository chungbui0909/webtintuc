@extends('admin.layout.index')
@section('content')
<!--  nội dung -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Danh Mục User <a href="admin/user/them" class="btn btn-success">Thêm Mới </a></h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">
				<ul class="breadcrumb">
					<li>
						<i class="breadcrumb-item"></i><a href="admin/user/danhsach">Dashboard / </a>
					</li>	
					<li class="breadcrumb-item active"> Danh Mục Users </li>	
				</ul>		
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
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên</th>
							<th>Email</th>
							<th>Mật Khẩu</th>
							<th>Level</th>
							<th colspan="2">Action</th>
						</tr>
					</thead> 
					<tbody>
						<?php $stt = 1 ?>
						@foreach($user as $us)
						<tr>
							<th scope="row">{{$stt++}}</th>
							<td>{{$us->name}}</td>
							<td>{{$us->email}}</td>
							<<td>{{$us->password}}</td>
							<td>
								@if($us->level == 1)
									{{"Admin"}}
								@elseif($us->level == 0)
									{{"user"}}
								@endif
							</td>
							<td>
								<a href="admin/user/sua/{{$us->id}}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i>Sửa
								</a>
							</td>
							<td>
								<a href="admin/user/xoa/{{$us->id}}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i>Xóa
								</a>
							</td>								
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div style="height: 100px;">
				<div style=" margin: 0 auto; width: 500px;">
					{!!$user->links()!!}			
				</div>	
			</div>
		</div>
	</div>
</div>
<!-- Kết thúc nội dung -->
@endsection