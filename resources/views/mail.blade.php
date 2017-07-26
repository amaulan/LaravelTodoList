<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<div style="padding-top:50px;padding-bottom:50px;width:auto;background-color: #1297E0;overflow: scroll;" align="center">
		<div style="background-color: #fff;
		border-radius: 5px;
		padding: 20px;
		text-align: center;
		color: #000;
		font-size: 30px;
		font-weight: bolder;
		margin-bottom: 10px;
		width:40%;
		text-align:center;
		word-wrap:break-word;
		text-deciration:none;">Hallo {{$msg}}</div>
		<div style="border-radius: 5px;
		padding: 20px;
		text-align: center;
		color: #fff;
		font-size: 25px;
		font-weight: bolder;
		margin-bottom: 10px;
		width: 70%;">Please Verification You'r Email</div>
		<a href="{{url('/update_status')}}?verification_code={{$vcode}}" style="background-color: #1EBC61;padding:10px;border-radius:5px;color:#fff;text-decoration:none;">
		Verfied</a>
	</div>

</body>
</html>