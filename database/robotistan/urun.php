<?php
	
	header("Content-type: text/html; charset=utf-8");



	function menu() {

		require "menu.php";

		$menuler = menuler();

		foreach ($menuler as $key => $value) {
			

			print_r($value);

			echo "<br><br>";

			$url = $value["link"];

			$page = file_get_contents($url);

			$page1 = explode("<body", $page);
			$page = explode(">", $page1[1]);

			echo $page1[0];
			echo $page[1];

		}

	}


	menu();

?>