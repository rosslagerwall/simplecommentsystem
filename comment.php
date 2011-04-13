<?php
	// SimpleCommentSystem 1.0
	// Copyright 2009. shiz
	// This program is distributed under terms of the Lesser GPL.
	function comment($pageName) {
		echo '<div id="comment"><p><span style="font-size: 18px;">Comments:</span></p>';
		if (file_exists($pageName."c.txt")) {
			$fileC = file($pageName."c.txt");
			foreach ($fileC as $line) {
				$arr = explode("~", $line);
				echo "<b>".$arr[0]."</b> at ".$arr[1].":";
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
