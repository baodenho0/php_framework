<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div>index html</div>
	<?php echo "show string: ".$data['str']; ?>
	<?php 
	foreach ($data['arr'] as $key => $value) {
		echo "<p>array[$key] => $value </p>";
	}
	
	 ?>
</body>
</html>