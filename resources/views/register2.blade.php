<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>W 3 B</title>
</head>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="bst/css/ojann.css">
  <link rel="stylesheet" href="bst/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="bst/css/animated.css">
  <link rel="stylesheet" href="bst/css/acc.css">
  <script src="bst/js/jquery.min.js" language="javascript"></script>
  <script src="bst/js/bootstrap.js" language="javascript"></script>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li class="active"><a href="#"><i class="fa fa-play-circle" aria-hidden="true"></i><b>Indo</b>system</a></li>
        <li class="active"><a href="http://localhost/LaravelTodoList/public/">Login <span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="registes">Register <span class="sr-only">(current)</span></a></li>
        
      </ul> 
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4 login-from">
            <h4 class="icon"><b>Register</b> your Account!</h4>
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
            <form action="inregister" method="POST">
                {{ csrf_field() }}<!-- //->Membuat Method POST bisa melalui router -->
                <div class="form-group">
                    <label for="">Email</label>
                    <input id="email" name="email" placeholder="email" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input id="password" name="password" placeholder="password" type="password" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" class="form-control"></textarea>  
                </div>
              <div class="text-right">
              <input class="btn btn-custom" type="submit" name="submit" id="submit" value="Register" style="width:30%;">
              </div>
                    
                </div>
            </form>     
        </div>
    </div>
</div> <!-- End container -->
 
    <!-- Script js -->
		
	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/bootstrap.min.js"></script>

    <!-- End Script -->
</body>
</html>