<?php 

	
	$abc = "<a href=\"http://roboweb.net/saddas.php\">Deneme123</a>";

	$link = explode("\"", $abc);
// 1
	$isim = explode("\">", $abc);
	$isim = explode("</a>", $isim[1]);
// 0

	echo $link[1];
	echo "<br><br>";
	echo $isim[0];
 ?>