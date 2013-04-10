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
	function comment($pageName) {
		echo '<div id="comment"><p><span style="font-size: 18px;">Comments:</span></p>';
		if (file_exists($pageName."c.txt")) {
			$fileC = file($pageName."c.txt");
			foreach ($fileC as $line) {
				$arr = explode("~", $line);
				echo "<b>".$arr[0]."</b> at ".date("D M j Y", $arr[1]).":";
				echo "<blockquote style='margin-top: 0px;'>".$arr[2];
				echo "</blockquote>";
			}
		}
		else {
			echo "No comments!";
		}
		echo '
			<hr width="100%" />
			<div id="write">
				<p><span style="font-size: 18px;">Write a comment:</span></p>
				<form method="post" action="postcomment.php">
					<table>
						<tr><td width="100">Name</td><td><input type="text" name="name" style="width: 400px;" /></td></tr>
						<tr><td>Comment</td><td><textarea name="comment" rows="10" cols="40" style="width: 400px; height: 100px;"></textarea></td></tr>
						<tr><td></td><td align="right"><input type="submit" name="submit" value="Submit" /></td></tr>
					</table>
					<input type="hidden" name="page" value="'.$pageName.'" />
				</form>
			</div>
		</div>';
	}
?>
