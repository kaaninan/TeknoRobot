<?php 

	header("Content-type: text/html; charset=utf-8");

	$url = "http://www.roboweb.net/kitap.html";

	$page = file_get_contents($url);

	// Kaç tane ürün varsa
	for ($i=2; $i < 3; $i++) {
		
		// Birer birer artıyor
		$isim = explode("<h5>", $page);
		$isim = explode("</h5>", $isim[$i]);

		$fiyat = explode("<span class=\"price\"", $isim[1]);
		$fiyat = explode(">", $fiyat[2]);
		$fiyat = explode("<", $fiyat[1]);

		echo $fiyat[0];

		echo "<br>";
		
		echo $isim[0];

		echo "<br><br>";

	}




	list(list($b, $c, $d, $e)) = array(array("isim", "arduino", "is2im", "ardui2no"));

	print_r($b);

	echo "<br>";

	print_r($c);

	echo "<br>";

	print_r($d);

	echo "<br>";

	print_r($e);

?>