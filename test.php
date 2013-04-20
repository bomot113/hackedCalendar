<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Facebook Event Planner</title>
</head>

<body>
	<h1>Facebook Event Planner</h1>
	<form action="" method="post">
	<p> Date Limit: <input type="text" name="date" value="<?= $date ?>" /> <input type="submit" /></p>
	</form>
	<ul>
	<?php
		$date = $_GET["date"];
		$currentDate = date("m/d/Y");
		$eventarray = $_GET["me/events"];
		for ($eventarray as $event.name) {
	?>
		<li><a href="calendar.html"><?php if ($event.start_date < $date) print $event.name;?></a></li>
		<?php } ?> 
	</ul>
</body>
</html>
