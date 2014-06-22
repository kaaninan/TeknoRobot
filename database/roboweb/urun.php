<?php 

	header("Content-type: text/html; charset=utf-8");

	require "menu.php";

	$menuler = menuler();

	$limit = 10;

	foreach ($menuler as $key => $value) {

		for ($w=0; $w < 10; $w++) { 
			echo "<br>";
		}

		print_r($value);
		echo "<br><br>";

		$url = $value["link"];
		//TEST $url = "http://www.roboweb.net/gps.html";

		$page = file_get_contents($url);



		/* Toplam ürün sayısı bulma
		 * Sayfa sayısı hesaplama */

		$toplam_urun = explode("<p class=\"amount\">", $page);
		$toplam_urun = explode("</p>", $toplam_urun[1]);

		// Tek sayfa ve çok sayfalıları ayırma
		$sayfa = explode(" ", $toplam_urun[0]);


		// Tek Sayfalı
		if ($sayfa[34] == "") {
			
			$urun_sayisi = $sayfa[28];
			$sayfa_sayisi = 1;
			$artan_urun = 0;

		// Çok Sayfalı
		}else {

			$urun_sayisi = $sayfa[34];
			$sayfa_sayisi = intval($urun_sayisi / $limit + 1);

			// Son sayfadaki ürün sayısı
			$artan_urun = $sayfa[34] % $limit;


			/* LOG */
			echo "Ürün Sayısı:  ";
			echo $urun_sayisi;
			echo "<br>";
			echo "Sayfa Sayısı:  ";
			echo $sayfa_sayisi;
			echo "<br>";
			echo "Artan Ürün:  ";
			echo $artan_urun;
			//

		}

		listele($url, $limit, $sayfa_sayisi, $urun_sayisi, $artan_urun);
	}








	/* Ürünlerin isim ve fiyatlarını ayırma */

	function listele($url, $limit, $sayfa_sayisi, $urun_sayisi, $artan_urun) {

		// Tek Sayfalı (Kategori)
		if ($artan_urun == 0) {
			$page = file_get_contents($url);

			for ($a=2; $a <= $urun_sayisi + 2; $a++) {
				toparla($page, $a);
			}
		}


		// Çok Sayfalı (Kategori)
		else {

			for ($sayfa=1; $sayfa <= $sayfa_sayisi; $sayfa++) {

				// TEST
				for ($w=0; $w < 10; $w++) { 
					echo "<br>";
				}
				// TEST



				$url2 = $url."?p=".$sayfa."?limit=".$limit;
				echo $url2;
				echo "<br>";

				$page = file_get_contents($url2);


				// Sayfalar
				if ($sayfa != $sayfa_sayisi) {
					for ($a=2; $a < 12; $a++) {
						toparla($page, $a);
					}
				}
				
				// Son Sayfa
				else {
					for ($a=2; $a <= $artan_urun + 2; $a++) {
						toparla($page, $a);
					}
				}

				
			}
		}
	}

	function toparla($page, $a) {

		$urunler = array();

		$urun = @explode("<h5>", $page);
		$urun = @explode("</h5>", $urun[$a]);
		$urun = array_filter($urun);
		// Key -> 0

		$fiyat = @explode("<span class=\"price\"", $urun[1]);
		$fiyat = @explode(">", $fiyat[2]);
		$fiyat = @explode("<", $fiyat[1]);
		$fiyat = array_filter($fiyat);
		$fiyat = @$fiyat[0];

		$isimLink = @explode("\"", $urun[0]);
		$isimLink = array_filter($isimLink);
		$link = @$isimLink[1];
		$isim = @$isimLink[3];
		

		if ($fiyat && $urun) {

			echo "<br><br>";
			echo $fiyat;
			echo "<br>";						
			echo $isim;
			echo "<br>";
			echo $link;
			echo "<br>";

		}else {

			echo "eklenmedi";

		}
	}

?>