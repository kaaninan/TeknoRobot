<ul class="icerik">
<?php
	include "ayar.php";

	if(isset($_GET["search"])){

		$ara = $_GET["search"];

		// Geçici veritabanı oluşturma
		$mysql_gecici_tablo = mysql_query("CREATE TEMPORARY TABLE `arama` (id INT AUTO_INCREMENT PRIMARY KEY, host TEXT, isim TEXT, fiyat FLOAT, stok TEXT)") or die (mysql_error());


		// Her sitede arama yapma #############################################

		// Robotsitan
		$page = file_get_contents('http://www.robotistan.com/index.php?do=catalog/results&q='.$ara);

		// Kaç ürün olduğunu hesaplama
		for ($i=35; $i < 66; $i++) {

			$tek_url = explode("<a href=\"", $page);
			$tek_url = @explode("\"><img", $tek_url[$i]);

			if ($tek_url[0] == "mailto:toptansatis@robotistan.com") {
				$son = $i;
				break;
			}
		}

		echo $son;

		// Sonuçları Kaydetme
		for ($i=35; $i < $son; $i++) {

			// Tek url'i çek
			$tek_url = explode("<a href=\"", $page);
			$tek_url = explode("\"><img", $tek_url[$i]);

			// Çalışan url oluştur
			$url = "http://www.robotistan.com/".$tek_url[0];

			// İsim, fiyat, stok çek
			$urun = url_parse($url);

			$host = $urun['host'];
			$isimm = $urun['isim'];
			$fiyat = $urun['fiyat'];
			$stok = $urun['stok'];

			$ekle = mysql_query("INSERT INTO arama ('host', isim) VALUES ('.$host.' , '".$isimm."') ") or die (mysql_error());
		}

			// Listeleme

			$result = mysql_query("SELECT * FROM `arama`") or die (mysql_error());	 
			
			while($row = mysql_fetch_array($result)){
	?>
	<li>
		<div class="firma"><?php echo $row['host']; ?></div>

		<div class="isim">	
			<a href="<?php echo $url; ?>"><?php echo $row['isim']; ?></a>
		</div>

		<div class="fiyat"></div>
		
		<div class="stok"><?php ?></div>
		
		<div class="islem">
			<a id="sil" href="?id=">Ekle</a>
		</div>

	</li>
	<?php
		
	}}
	?>
</ul>