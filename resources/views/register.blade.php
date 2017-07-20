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
	      <form action="inregister" method="POST">
	      {{ csrf_field() }}<!-- //->Membuat Method POST bisa melalui router -->
			<h2 align="center" style="margin-top: 150px; font-size: 50px; font-weight: bolder; color:#2ecc71; ">REGISTER</h2>		
			<div class="col-md-4 col-md-offset-4 ">
			@if (session()->has('addregist'))<!-- Percabangan menampilkan notifikasi jika gagal registrasi -->
			    <div class="alert alert-success">
			        {{ Session::get('addregist') }}<!-- Mengambil nilai Session dengan variable 'addregist' -->
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

			<label style="color: #d0d0d2">Alamat :</label>
			<textarea name="alamat" id="alamat" class="form-control"></textarea>
			
			<input class="btn btn-danger" type="submit" name="submit" id="submit" value="Register" style="width:30%;">
			<a href="setlogin" class="btn btn-danger" style="width:30%;">LOGIN</a>
			</div>
		  </form>
		</div>
   </div>

</body>
</html>