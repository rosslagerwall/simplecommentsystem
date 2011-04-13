SimpleCommentSystem 1.0
Copyright 2009. shiz

This software is released under the LGPL.

SimpleCommentSystem is an easy to use comment system that does not rely on
databases and simply uses text files to store the comments. It is easy to
implement and ensures that the comments are stripped of all html before storing
them. The html appears inside a div tag with the id of comment so any styles
that need to be applied can be applied.

Usage:

This release contains two files:
	comment.php
	postcomment.php

To use, place the following lines of text where you want to use it.

	<?php
		include("comment.php");
		comment("index");
	?>

where index is the name of the page that will contain the comments.
