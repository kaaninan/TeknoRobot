<?php 

	header("Content-type: text/html; charset=utf-8");

	$url = "http://www.robotistan.com";
	$page = file_get_contents($url);

	$link = explode("</ul><ul><li id=\"", $page);
	$link = explode("=\"", $link[1]); // Artacak
	$link = explode("\">", $link[1]);
// Key -> 0

	$isim = explode("</a>", $link[1]);
// Key -> 0

	$link = $url."/".$link[0];
	$isim = $isim[0];

	echo $link;

	echo $isim;


	echo "<br><br><br><br>";

	$son = false;

	$b = 2;

	while ($son == false) {

		$link = @explode("</ul><ul><li id=\"", $page);
		$link = @explode("=\"", $link[$b]); // Artacak
		$link = @explode("\">", $link[1]);
	// Key -> 0

		$isim = @explode("</a>", $link[1]);
	// Key -> 0


		if ($isim[0]== "") {
			$son = true;
			echo "bitti";
		}else {

			$link = $url."/".$link[0];
			$isim = $isim[0];

			echo $link;
			echo "<br>";
			echo $isim;
			echo "<br><br>";
				
			

			$b++;

		}

	}

?>