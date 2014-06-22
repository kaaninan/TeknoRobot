<?PHP
	include "ayar.php";

	$url = $_REQUEST["url"];

	$urun = url_parse($url);

	$isim = $urun['isim'];
	$fiyat = $urun['fiyat'];

	$sorgu = mysql_query("INSERT INTO `urunler` (`isim`,`url`,`fiyat`) VALUES ('$isim','$url','$fiyat')");

	if(!$sorgu){
		echo 0;
	}else{
		echo 1;
	}
?>