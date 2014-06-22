<?php

	header("Content-type: text/html; charset=utf-8");

	mysql_connect("localhost","root","");
	mysql_select_db("followme2");
	mysql_query("SET NAMES UTF8");


	function urunEkle ($firma, $isim, $link, $fiyat) {


		// Tabloları listele

		$tablo = mysql_query( "SHOW TABLES" );  
  
		if (!$result) {  
		    echo "Sorguda hata meydana geldi <br>";  
		    echo 'mysql error: ' . mysql_error();  

		// Tablo varsa
		} else { 

		    while ($row = mysql_fetch_row($tablo)) {  
		        echo $row[0];
		    }


		    $sorgula = mysql_query("SELECT * FROM roboweb") or die (mysql_error());

			while($row = mysql_fetch_array($sorgula)){



			}	
		} 








		

		$sql = "INSERT INTO `followme2`.`roboweb` (`id`, `isim`, `fiyat_yeni`, `fiyat_eski`, `tarih`, `link`) VALUES (NULL, \'Deneme 1\', \'\', \'12,21\', \'2014-06-04\', \'adsaddasd\');";

	}









	$eski[] = ['isim' => 'apple', 'link' => 'banana'];
	$eski[] = ['isim' => 'apple2', 'link' => 'banana2'];
	$eski[] = ['isim' => 'apple3', 'link' => 'banana3'];

	$yeni[] = ['isim' => 'apple', 'link' => 'banana'];
	$yeni[] = ['isim' => 'apple3', 'link' => 'banana3'];


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