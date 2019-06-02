@extends('admin.layout.index')
@section('content')
<!--  nội dung -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Danh Mục Tin Tức <a href="admin/tintuc/them" class="btn btn-success">Thêm Mới </a></h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">
				<ul class="breadcrumb">
					<li>
						<i class="breadcrumb-item"></i><a href="admin/tintuc/danhsach">Dashboard / </a>
					</li>	
					<li class="breadcrumb-item active"> Danh Mục Tin Tức</li>	
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
							<th>Tiêu Đề</th>	
							<th>Tóm Tắt</th>
							<th>Thể Loại</th>
							<th>Loại Tin</th>
							<th>Hình</th>
							<th>Nội Bật</th>
							<th>Lượt Xem</th>

							<th colspan="2">Action</th>
						</tr>
					</thead> 
					<tbody>
						<?php $stt =1;?>
						@foreach($tintuc as $tt)
						<tr>
							<th scope="row">{{$stt++}}</th>
							<td>{{$tt->TieuDe}}</td>
							<td>{{$tt->TomTat}}</td>

							<td>{{$tt->loaitin->theloai->Ten}}</td>

							<td>{{$tt->loaitin->Ten}}</td>
							<td><img src="upload/tintuc/{{$tt->Hinh}}" width="80px" height="80px"></td>
							<td>
								@if($tt->NoiBat==0)
									{{"Không"}}
								@else
									{{"Có"}}
	
								@endif
	
							</td>
							<td>{{$tt->SoLuotXem}}</td>
							<td>
								<a href="admin/tintuc/sua/{{$tt->id}}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i>Sửa
								</a>
							</td>
							<td>
								<a href="admin/tintuc/xoa/{{$tt->id}}" class="btn btn-xs btn-danger"><i class="fa fa-edit"></i>Xóa
								</a>
							</td>									
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div style="height: 100px;">
				<div style=" margin: 0 auto; width: 500px;">
					{!!$tintuc->links()!!}			
				</div>	
			</div>
			
		</div>
	</div>
</div>
<!-- Kết thúc nội dung -->
@endsection