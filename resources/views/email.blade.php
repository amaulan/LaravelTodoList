<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="bst/css/bootstrap.css">
	<link rel="stylesheet" href="bst/css/animated.css">
	<link rel="stylesheet" href="bst/css/acc.css">
	<link rel="stylesheet" href="bst/css/css.css">
	<script src="bst/js/jquery.min.js" language="javascript"></script>
	<script src="bst/js/bootstrap.js" language="javascript"></script>
</head>
<body>
	<br>
	<h1>Send Mail</h1>
	<form action="send" method="post">
		{{csrf_field()}}
		to: <input type="text" name="to">
		message : <textarea name="message" cols="30" rows="10"></textarea>
		<input type="submit" value="send">
	</form>
</body>
</html>