<?php
/*
    Copyright (C) 2011 Ross Lagerwall <rosslagerwall@gmail.com>

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Lesser General Public License for more details.

    You should have received a copy of the GNU Lesser General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
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
