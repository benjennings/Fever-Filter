<?php

	require_once("functions/fun.core.php");
	require_once("functions/fun.filter.php");

	// filter("Feed Title",array("Words in","The Title"));

	filter("*",array(
							"Sponsor:",
							"[Sponsor]"
	));
	
	filter("Penny Arcade",array("News Post:"));

?>