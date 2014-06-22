<?PHP
	mysql_connect("localhost","root","");
	mysql_select_db("followme");
	mysql_query("SET NAMES UTF8");


	// Url Parse

	function url_parse($url){

		$parsed_url = parse_url($url);
		$host = $parsed_url['host'];

		$page = file_get_contents($url);

		if ($host == "www.robotistan.com") {
			$isim = explode("<td class=\"col3\"><span itemprop ='name'>", $page);
			$isim = explode("</span></td>", $isim[1]);

			$fiyat = explode("<td class=\"col3\">", $page);
			$fiyat = explode("<td class=\"col3\">", $fiyat[10]);

			$stok = explode("id=\"stokta_yok_mesaj\"><strong>", $page);
			$stok = explode("</strong>", $stok[1]);

			if($stok[0] == "Ürün stokta bulunmamaktadır."){
				$stok = "Yok";
			}else{
				$stok = "Mevcut";
			}

			//$stok = "var";
		}

		if($host == "www.hobievi.com"){
			$isim = explode("<h1 itemprop=\"name\" class=\"bg_none \" >", $page);
			$isim = explode("<br />", $isim[1]);

			$fiyat = explode("<span class=\"productSpecialPrice\" >", $page);
			$fiyat = explode("</span>", $fiyat[1]);

			$stok = explode("rel=\"nofollow\">", $page);
			$stok = explode(" ", $stok[83]);

			if($stok[0] == "STOKTA"){
				$stok = "Yok";
			}else{
				$stok = "Mevcut";
			}
		}

		// Host ismi düzeltme
		$firma = explode(".", $host);

		$bilgi = array('isim' => $isim[0],'fiyat' => $fiyat[0], 'host' => ucfirst($firma[1]), 'stok' => $stok);

		return $bilgi;
	}
?>