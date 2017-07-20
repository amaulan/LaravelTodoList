<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bst/css/bootstrap.css">
	<link rel="stylesheet" href="bst/css/animated.css">
	<link rel="stylesheet" href="bst/css/acc.css">
	<script src="bst/js/jquery.min.js" language="javascript"></script>
	<script src="bst/js/bootstrap.js" language="javascript"></script>
</head>
<body style="background-color: #141422;">
<div class="container">
		<div align="center">
	      <form action="inlogin" method="POST">
	      {{ csrf_field() }} <!-- //->Membuat Method POST bisa melalui router -->
			<h2 align="center" style="margin-top: 150px; font-size: 50px; font-weight: bolder; color:#d8c13a; ">LOG IN</h2>		
			<div class="col-md-4 col-md-offset-4 ">
			@if (session()->has('notlogin'))<!-- Percabangan menampilkan notifikasi jika gagal login -->
			    <div class="alert alert-danger">
			        {{ Session::get('notlogin') }}<!-- Mengambil nilai Session dengan variable 'notlogin' -->
			    </div>
			@endif<!-- Menutup percabangan -->
			@if ($errors->any())<!-- Percabngan jika ada inputan yang salah -->
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)<!-- Menampilkan eror dengan perulangan -->
			                <li>{{ $error }}</li><!-- Menampilkan bagian eror -->
			            @endforeach
			        </ul>
			    </div>
			@endif<!-- Menutup percabangan -->
			<label style="color: #d0d0d2">Username :</label>
			<input id="username" name="username" placeholder="username" type="text" class="form-control">
			
			<label style="color: #d0d0d2;">Password :</label>
			<input id="password" name="password" placeholder="password" type="password" class="form-control">
			
			<input class="btn btn-danger" type="submit" name="submit" id="submit" value="Login" style="width:30%;">
			<a href="registes" class="btn btn-danger" style="width:30%;">REGISTER</a>
			</div>
		  </form>
		</div>
   </div>

</body>
</html>