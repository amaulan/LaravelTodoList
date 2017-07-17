<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>To Do</title>
	<link rel="stylesheet" href="bst/css/bootstrap.css">
	<link rel="stylesheet" href="bst/css/animated.css">
	<link rel="stylesheet" href="bst/css/acc.css">
	<script src="bst/js/jquery.min.js" language="javascript"></script>
	<script src="bst/js/bootstrap.js" language="javascript"></script>
</head>
<body>
	<div class="col-md-12">
		<div class="col-md-6 col-md-offset-3">
			<form action="" method="POST" style="text-align:center;margin-top:50px;margin-bottom:50px;">
				To Do<input type="text" name="todo" class="form-control">
				<input type="submit" name="save" value="SAVE" class="form-control">
			</form>
		</div>
		<div class="col-md-12" align="center">
			<table class="table table-striped">
				<tr>
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
						<div class="btn btn-danger">DELETE</div>
						<div class="btn btn-success">UPDATE</div>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</body>
</html>