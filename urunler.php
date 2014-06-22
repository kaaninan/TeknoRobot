<ul class="icerik">

<?php
	include "ayar.php";

	// Veritabanına bağlanma
	if(!isset($_GET["search"])){
		$result = mysql_query("SELECT * FROM urunler") or die (mysql_error());	 
	
	}else{
	 	$ara = $_GET["search"];
		$result = mysql_query("SELECT * FROM urunler WHERE isim LIKE '%$ara%'") or die (mysql_error());
	}


	// Sonuçları listeleme
	while($row = mysql_fetch_array($result)){

		$url = $row["url"];

		$urun = url_parse($url);

		/* Gerçek zamanlı veri */
		$isim = $urun['isim'];
		$fiyat = $urun['fiyat'];
		$stok = $urun['stok'];

	?>

	<li id="<?php echo $row['id']; ?>">
		<div class="firma"><?php echo $urun['host']; ?></div>
		<div class="isim"><a href="<?php echo $url; ?>"><?php echo $row["isim"]; ?></a></div>
		<div class="fiyat"><?php echo $fiyat; ?></div>
		<div class="stok"><?php echo $stok; ?></div>
		<div class="islem">
			<a id="sil" href="?id=<?php echo $row['id']; ?>">Ekle</a>
		</div>
	</li>

	<?php } ?>

</ul>