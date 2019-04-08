<!DOCTYPE html>
<html>
<head>
	<title>animation</title>
</head>
<style type="text/css">
@keyframes example{
	0% {background-color: red;}
	25% {background-color: yellow;}
	50% {background-color: blue;}
	100% {background-color: green;}
}
	div{
		animation: example 5s linear 2s infinite alternate;
	}
</style>
<body>
<div>
	<p>
		hi
	</p>
</div>

</body>
</html>