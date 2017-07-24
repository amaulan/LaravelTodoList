<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>W 3 B</title>
</head>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="bst/css/ojan.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="bst/css/font-awesome.min.css">
  <link rel="stylesheet" href="bst/css/bootstrap.css">
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
            <h4 class="icon"><b>Log-in</b> your Account</h4>
            @if (session()->has('notlogin'))<!-- Percabangan menampilkan notifikasi jika gagal login -->
                <div class="alert alert-danger">
                    {{ Session::get('notlogin') }}<!-- Mengambil nilai Session dengan variable 'notlogin' -->
                </div>
            @elseif (session()->has('verified'))<!-- Percabangan menampilkan notifikasi jika gagal login -->
                <div class="alert alert-success">
                    {{ Session::get('verified') }}<!-- Mengambil nilai Session dengan variable 'verified' -->
                </div>
            @elseif (session()->has('notverified'))<!-- Percabangan menampilkan notifikasi jika gagal login -->
                <div class="alert alert-danger">
                    {{ Session::get('notverified') }}<!-- Mengambil nilai Session dengan variable 'notverified' -->
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
            @endif
            <form action="inlogin" method="POST">
            {{ csrf_field() }} 
                <div class="form-group">
                    <label for="">Username</label>
                    <input id="username" name="username" placeholder="username" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input id="password" name="password" placeholder="password" type="password" class="form-control"/>
                </div>
              <div class="text-right">
              <input class="btn btn-custom" type="submit" name="submit" id="submit" value="Login" style="width:30%;">
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