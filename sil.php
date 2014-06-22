<?PHP
	include "ayar.php";

	$id = $_REQUEST["id"];

	$sorgu = mysql_query("DELETE FROM `urunler` WHERE `id` = '$id'");

	if(!$sorgu){
		echo 0;
	}else{
		echo 1;
	}
?>