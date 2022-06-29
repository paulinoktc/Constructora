<!DOCTYPE html>
<html>
<head>
	<title>Curriculum</title>

	<style type="text/css">
	body{
		background: url(../img/bg.jpg);
	}
	.container{
		text-align: center;
	}
	.container img{
		border: 2px solid white;
	}
	</style>

</head>
<body>
<div class="container">
	<img src =
	<?php 
		$url = "../../photo/curriculum/".$_GET['file'];
		echo '"'.$url.'"';
	 ?>
	>
</div>
</body>
</html>