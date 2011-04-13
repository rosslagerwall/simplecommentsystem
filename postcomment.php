<?php
	// SimpleCommentSystem 1.0
	// Copyright 2009. shiz
	// This program is distributed under terms of the Lesser GPL.
	if ($_POST['page'] != '' && $_POST['name'] != '' && $_POST['comment'] != '' && file_exists($_POST['page'].".php")) {
		$name = str_replace("~", "", $_POST['name']);
		$comment = str_replace("~", "", $_POST['comment']);
		
		$name = strip_tags($name);
		$comment = strip_tags($comment);

		$comment = str_replace("\r\n", "<br />", $comment);
		$comment = str_replace("\n", "<br />", $comment);
		$comment = str_replace("\r", "<br />", $comment);
		$name = substr($name, 0, 100);
		$comment = substr($comment, 0, 5000);
		
		$tfile = $_POST['page']."c.txt";
		if (file_exists($tfile)) {
			$str = file_get_contents($tfile)."\n";
		}
		$str .= $name."~".date("D M j Y")."~".$comment;
		file_put_contents($tfile, $str);
	}
	header("Location: ". $_POST['page'].".php");
?>
