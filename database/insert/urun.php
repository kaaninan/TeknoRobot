<?php

	header("Content-type: text/html; charset=utf-8");

	mysql_connect("localhost","root","");
	mysql_select_db("followme2");
	mysql_query("SET NAMES UTF8");


	function urunEkle ($firma, $yeni_urunler) {


		// Tabloları listele

		$tablo = mysql_query( "SHOW TABLES" );
		$sonuc = false;

	    while ($row = mysql_fetch_row($tablo)) {  

	    	// Eğer gelen firma database'de varsa
	        if ($firma == $row[0]) {
	        	$sonuc = true;
	        }

	    }

	    // Eğer tablo varsa
	    if ($sonuc == true) {

	    	$sorgula = mysql_query("SELECT * FROM ".$firma) or die (mysql_error());

			while($row = mysql_fetch_array($sorgula)){
	    		$eski_urunler[] = ["isim" => $row["isim"], "link" => $row["link"], "fiyat_eski" => $row["fiyat_eski"], "fiyat_yeni" => $row["fiyat_yeni"], "tarih" => $row["tarih"]];

			}

			print_r($yeni_urunler);
	    	
	    	// kontrolleri yap

	    }

	    // Tabla yoksa
	    else {


	    	foreach ($yeni_urunler as $key => $value) {

	    		print_r($yeni_urunler);

	    		echo "<br><br><br>";

	    		echo $yeni_urunler["isim"];

	    		echo "<br>";


	    	}
	    	
	    }


	    








		

		$sql = "INSERT INTO `followme2`.`roboweb` (`id`, `isim`, `fiyat_yeni`, `fiyat_eski`, `tarih`, `link`) VALUES (NULL, \'Deneme 1\', \'\', \'12,21\', \'2014-06-04\', \'adsaddasd\');";

	}











	$eski[] = array('isim' => 'apple', 'link' => 'banana');
	$eski[] = ['isim' => 'apple2', 'link' => 'banana2'];
	$eski[] = ['isim' => 'apple3', 'link' => 'banana3'];

	$yeni[] = ['isim' => 'apple', 'link' => 'banana'];
	$yeni[] = ['isim' => 'apple3', 'link' => 'banana3'];


	urunEkle("roboweb", $eski);


	// Eski kayıtları silme

	foreach ($eski as $key => $value) {

		echo "<span style=\"color:blue; font-size: 30px;\">";
		echo "ESKİ VALUE <br><br>";
		echo "</span>";

		print_r($value);

		$yeni_isim = $value["isim"];

		$son = false;

		foreach ($yeni as $key => $value) {

			echo "<br><br><br>YENİ VALUE <br><br>";
			print_r($value);

			if ($value["isim"] == $yeni_isim) {
				echo "<br><br><br>";
				echo "<span style=\"color:red;\"> aynı  - >  ";
				echo $yeni_isim;
				echo("</span>");

				$son = true;

			}else {
				echo "<br><br>";
				echo "<span style=\"color:red; font-size: 26px;\">";
				echo "BULUNAMADI";
				echo "</span>";

			}

			echo "<br><br><br>";

		}

		if ($son == false) {
			echo "<br><br><br> Hiç BULUNAMADI <br><br><br>";
		}


		echo "<br><br><br>";
	}




?>