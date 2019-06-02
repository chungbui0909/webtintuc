@extends('admin.layout.index')
@section('content')
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Sửa User</h1>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">
				<ol class="breadcrumb">
					<li>
						<i class="breadcrumb-item"></i><a href="admin/user/danhsach">Dashboard / </a>
					</li>	
					<li>
						<i class="breadcrumb-item"></i><a href="admin/user/danhsach">Danh sách users/ </a>
					</li>
					<li class="breadcrumb-item active"> {{$user->name}} </li>			
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
						<form method="POST" action="admin/user/sua/{{$user->id}}">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<table>
								
								<tr>
									<td style="color: green;"> Tên: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<input type="text" class="form-control" placeholder="Nhập tên" name="name" size="80px" value="{{$user->name}}">
									</td>
								</tr>
								
								<tr>
									<td style="color: green;"> Email: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<input type="text" class="form-control" placeholder="Nhập email" name="email" size="80px" value="{{$user->email}}" readonly="">
									</td>
								</tr>
								<tr>
									<th colspan="2"><input type="checkbox" id="changePassword" name="changePassword"><span style="color: black; font-weight: bold;text-align: center;">&nbsp;&nbsp;&nbsp;&nbspĐổi Mật Khẩu</span></th>
								</tr>
			
								<tr>
									<td style="color: green;">Nhập mật khẩu mới: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<input type="password" class="form-control password" placeholder="Nhập password" name="password" size="80px" disabled="">
									</td>
								</tr>
								<tr>
									<td style="color: green;"> Nhập lại mật khẩu mới: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<input type="password" class="form-control password" placeholder="Nhập lại password" name="passwordAgain" size="80px" disabled="">
									</td>
								</tr>
								<tr>
									<td style="color: green;"> Level: &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>
										<select name="level" class="form-control">
											@if($user->level==1)
												<option value="1" selected="">Admin</option>
												<option value="0">User</option>
											@else
												<option value="1">Admin</option>
												<option value="0" selected="">User</option>
											@endif
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
{{-- scrip ẩn hiện box đổi mk --}}
@section('script')
	<script >
		$(document).ready(function(){
			$('#changePassword').change(function(){
				if($(this).is(":checked")){
					$(".password").removeAttr('disabled');
				}
				else{
					$(".password").attr('disabled',"");
				}
			});
		});
	</script>
@endsection