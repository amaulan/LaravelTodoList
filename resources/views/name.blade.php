<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>To Do</title>
	<link rel="stylesheet" href="bst/css/bootstrap.css">
	<link rel="stylesheet" href="bst/css/animated.css">
	<link rel="stylesheet" href="bst/css/acc.css">
	<link rel="stylesheet" href="bst/css/css.css">
	<script src="bst/js/jquery.min.js" language="javascript"></script>
	<script src="bst/js/bootstrap.js" language="javascript"></script>
</head>
<body>
	<div class="col-md-12">
		<div class="col-md-6 col-md-offset-3">
			<form action="store" method="POST" style="text-align:center;margin-top:50px;margin-bottom:50px;">
			{{ csrf_field() }}<!-- //->Membuat Method POST bisa melalui router -->
			<div class="col-md-12" align="center" style="font-size:20px;">
				Welcome <span style="font-weight:bolder;">{{Auth::user()->email}}<!-- Menampilkan Username dengan class Auth --></span>
			</div>
				To Do<input type="text" name="todo" class="form-control">
				<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
				<input type="submit" name="save" value="SAVE" class="form-control btn btn-danger">
				<input type="reset" name="reset" value="RESET" class="form-control btn btn-custom " style="color:red; background-color: #ececec">
			</form>
			<form action="logout" method="GET" class="col-md-12">
				<input type="submit" name="logout" class="btn btn-info form-control" value="LOG-OUT">
			</form>
		</div>
		<div class="col-md-4 col-md-offset-4">
				
			@if (session()->has('add'))<!-- Percabangan menampilkan notifikasi jika berhasil tambah data -->
			    <div class="alert alert-success col-md-12">
			        {{ Session::get('add') }}<!-- Mengambil nilai Session dengan variable 'add' -->
			    </div>
			@elseif (session()->has('notadd'))<!-- Percabangan menampilkan notifikasi jika gagal tambah data -->
			    <div class="alert alert-danger col-md-12">
			        {{ Session::get('notadd') }}<!-- Mengambil nilai Session dengan variable 'notadd' -->
			    </div>
			@elseif (session()->has('update'))<!-- Percabangan menampilkan notifikasi jika berhasil update data -->
			    <div class="alert alert-success col-md-12">
			        {{ Session::get('update') }}<!-- Mengambil nilai Session dengan variable 'update' -->
			    </div>
			@elseif (session()->has('notupdate'))<!-- Percabangan menampilkan notifikasi jika gagal update data -->
			    <div class="alert alert-danger col-md-12">
			        {{ Session::get('notupdate') }}<!-- Mengambil nilai Session dengan variable 'notupdate' -->
			    </div>
			@elseif (session()->has('destroy'))<!-- Percabangan menampilkan notifikasi jika berhasil hapus data -->
			    <div class="alert alert-danger col-md-12">
			        {{ Session::get('destroy') }}<!-- Mengambil nilai Session dengan variable 'destroyS' -->
			    </div>
			@elseif (session()->has('login'))<!-- Percabangan menampilkan notifikasi jika berhasil login -->
			    <div class="alert alert-success col-md-12">
			        {{ Session::get('login') }}<!-- Mengambil nilai Session dengan variable 'login' -->
			    </div>
			@endif
		</div>
			@if ($errors->any())<!-- Percabngan jika ada inputan yang salah -->
			    <div class="alert alert-danger col-md-4 col-md-offset-4">
			        <ul>
			            @foreach ($errors->all() as $error)<!-- Menampilkan eror dengan perulangan -->
			                <li>{{ $error }}</li><!-- Menampilkan bagian eror -->
			            @endforeach
			        </ul>
			    </div>
			@endif
		<div class="col-md-12" align="center">
		@if($row == 0)<!-- Percabangan jika tidak ada baris -->
		<div align="center" style="font-size:25px;">
			There Is No Data
		</div>
		@else
			<table class="table table-hover">
				<tr class="tebel">
					<td align="center">ID</td>
					<td align="center">To Do</td>
					<td align="center">Created</td>
					<td align="center">Updated</td>
					<td align="center">Action</td>
				</tr>
				@foreach($todo as $todo)<!-- Menampilkan data dengan perulangan -->
				<tr>
					<td align="center">{{$todo->id}}</td>
					<td align="center">{{$todo->todo}}</td>
					<td align="center">{{$todo->created_at}}</td>
					<td align="center">{{$todo->updated_at}}</td>
					<td align="center">
						<form action="destroy" method="GET">

							<input type="submit" name="delete" value="DELETE" class="btn btn-danger" onclick="return confirm('Are You Sure ? ')">
							<input type="hidden" name="id" value="{{$todo->id}}">
							<input type="hidden" name="created" value="{{$todo->crrated_at}}">

						</form>

						<button data-toggle="modal" data-target="#update-{{$todo->id}}" class="btn btn-info">UPDATE</button>
							<div class="modal fade" id="update-{{$todo->id}}" role="dialog" style="margin-top:150px;">
							    <div class="modal-dialog">
							    
							      <!-- Modal content-->
							      <div class="modal-content">
							        <div class="modal-header" style="background-color:#106B60;">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							          <h4 class="modal-title modal-login-font">LOG - IN</h4>
							        </div>
							        <div class="modal-body" style="background-color:#fff;text-align:center;">
							          <form action="update/{{$todo->id}}" method="POST">
							          {{ csrf_field() }}
							          	TO DO : <input type="text" name="todo" class="form-control" value="{{$todo->todo}}">
							          	<input type="hidden" name="created_at" value="{{$todo->created_at}}">
							        </div>
							        <div class="modal-footer" style="background-color:#106B60;text-align:center;">
							          <input type="submit" name="update" class="btn btn-success" value="OK">
							          <input type="reset" class="btn btn-success" value="BATAL">
							          <button type="button" class="btn btn-success" data-dismiss="modal">TUTUP</button>
							          </form>
							        </div>
							      </div>
							      
							    </div>
						  	</div>
					</td>
				</tr>
				@endforeach
			</table>
			@endif
		</div>
	</div>
</body>
</html>