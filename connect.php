<?php

	$cn = mysql_connect("localhost", "root","")or die("Could not connect: " . mysqli_error());
	$db = mysql_select_db("hoitruong",$cn)or die("Could not select database");

	?>