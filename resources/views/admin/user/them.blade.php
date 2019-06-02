@extends('admin.layout.index')
@section('content')
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Thêm User</h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">
				<ol class="breadcrumb">
					<li>
						<i class="breadcrumb-item"></i><a href="admin/user/danhsach">Dashboard / </a>
					</li>	
					<li>
						<i class="breadcrumb-item"></i><a href="admin/user/danhsach">Danh sách user / </a>
					</li>
					<li class="breadcrumb-item active"> User </li>			
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
						<form method="POST" action="{{route('themUser')}}">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<table>
								
								<tr>
									<td style="color: green;"> Tên: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<input type="text" class="form-control" placeholder="Nhập tên" name="name" size="80px">
									</td>
								</tr>
								
								<tr>
									<td style="color: green;"> Email: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<input type="email" class="form-control" placeholder="Nhập email" name="email" size="80px">
									</td>
								</tr>
								<tr>
									<td style="color: green;"> Password: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<input type="password" class="form-control" placeholder="Nhập password" name="password" size="80px">
									</td>
								</tr>
								<tr>
									<td style="color: green;"> PasswordAgain: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<input type="password" class="form-control" placeholder="Nhập lại password" name="passwordAgain" size="80px">
									</td>
								</tr>
								<tr>
									<td style="color: green;"> Quyền: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<select name="level" class="form-control">
											<option value="1">Admin</option>
											<option value="0">User</option>
										</select>
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