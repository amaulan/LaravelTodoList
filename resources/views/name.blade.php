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
			{{ csrf_field() }}
				To Do<input type="text" name="todo" class="form-control">
				<input type="submit" name="save" value="SAVE" class="form-control btn btn-danger">
				<input type="reset" name="reset" value="RESET" class="form-control btn btn-info">
			</form>
			@if (session()->has('add'))
			    <div class="alert alert-success">
			        {{ Session::get('add') }}
			    </div>
			@elseif (session()->has('notadd'))
			    <div class="alert alert-danger">
			        {{ Session::get('notadd') }}
			    </div>
			@elseif (session()->has('update'))
			    <div class="alert alert-success">
			        {{ Session::get('update') }}
			    </div>
			@elseif (session()->has('notupdate'))
			    <div class="alert alert-danger">
			        {{ Session::get('notupdate') }}
			    </div>
			@elseif (session()->has('destroy'))
			    <div class="alert alert-danger">
			        {{ Session::get('destroy') }}
			    </div>
			@endif

			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
		</div>
		<div class="col-md-12" align="center">
		@if($row == 0)
		<div align="center" style="font-size:25px;">
			There Is No Data
		</div>
		@else
			<table class="table table-hover">
				<tr class="tebel">
					<td>ID</td>
					<td>To Do</td>
					<td>Created</td>
					<td>Updated</td>
					<td>Action</td>
				</tr>
				@foreach($todo as $todo)
				<tr>
					<td>{{$todo->id}}</td>
					<td>{{$todo->todo}}</td>
					<td>{{$todo->created_at}}</td>
					<td>{{$todo->updated_at}}</td>
					<td>
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