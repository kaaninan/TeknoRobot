<?php 

	header("Content-type: text/html; charset=utf-8");


	// Roboweb.net Menu Listesi Alma

	function menuler() {

		$menuler = array();

		$url = "http://www.roboweb.net";
		$page = file_get_contents($url);

		$son = false;

		// Linkler için (for)
		$b = 1;

		// Parse İşlemleri

		// Garanti olsun diye $i < 120
		//for ($b=1; $b < 120; $b++) {
		while ($son == false) {

			$link = @explode("<div class=\"accordion-row\">", $page);
			// Arttır
			$link = @explode("</a>", $link[$b]);
			$link = @explode("<a href=\"", $link[0]);
			$link = @explode("\"", $link[1]);
			$isim = @explode(">", $link[1]);

			$link = array_filter($link);

			// Bittiğini bulma
			if (!$link) {
				$son = true;
			}

			// Bitmediyse
			else {

				// Link urun.php için
				// İsim bilgilendirme maili için
				$link = @$link[0];
				$isim = @$isim[1];


				// Ana menuleri bulma
				$menu_link = explode("/", $link);
				$sayi = count($menu_link);

				// Eğer kategori ismi ana kategoriyse
				if ($sayi == 4) {
					
					/* LOG */
					echo "Link:  ";
					echo $link;
					echo "<br><br>";
					echo "İsim:  ";
					echo $isim;
					echo "<br><br><br><br>";

					$menuler[] = ["isim" => $isim, "link" => $link];
				}
			}
			$b++;
		}

	return $menuler;

	}

 ?>