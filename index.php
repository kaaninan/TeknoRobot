<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<title>Follow Me</title>	

	<link rel="stylesheet" type="text/css" href="css/style.css">		

	<script type="text/javascript" src="js/jquery.js"></script>	

	<script type="text/javascript">	

	/*
	// Arama    
	$(function(){        
		$("#search-form").submit(function() {
			event.preventDefault();
			var form = $('#search').val();            
			var data = "search=" + form;      

			$.ajax({                
				type: "POST",                
				url: "ara.php",                
				data: data,                
				success: function(sonuc) {                	
					$('#urunler').html("");                    
					$('#urunler').load("urunler.php?search="+sonuc);                
				}            
			});            
			return false;         
		});       
	*/


		// Silme    
		$(function(){        
			$("a#sil").click(function() {        	
				event.preventDefault();  	
				var id = $(this).attr("href").match(/id=([0-9]+)/)[1];        	
				var data = "id="+id;
/*
				$.ajax({                
					type: "POST",  
					url: "sil.php",                
					data: data,                
					success: function(sonuc) {                	
						/*                	
						$('#urunler').html("");                    
						$('#urunler').load("urunler.php");                    
						*/                    
						$('li#'+id).hide('slow');                
			//		}            
			//	});            
				return false;        
			});   
		});    
	</script>

</head>

<body>

	<!-- Header -->
	<div class="header">	
		<div class="logo">Follow Me</div>

		<div class="menu">
			<ul>
				<li><a href="">Arama</a></li>
				<li><a href="">Son Aramalar</a></li>
				<li><a href="">Hakkımızda</a></li>
				<li><a href="">İletişim</a></li>
			</ul>
		</div>
	</div>

	<div class="center">

		<!-- Search -->	
		<div class="search">	
			<form id="search-form" action"index.php" type="get">
				<input type="submit" class="submit-search" value="" />			
				<input id="search" name="search" type="text" placeholder="Ne aradınız?" class="search-text">
			</form>	
		</div>


		<!-- İçerik -->	
		<div class="icerik">

			<ul class="baslik">
				<li class="baslik">
					<div class="firma">Firma</div>
					<div class="isim">İsim</div>
					<div class="fiyat">Fiyat</div>
					<div class="stok">Stok</div>
					<div class="islem">İşlem</div>
				</li>
			</ul>
				
			<div id="urunler"><?php require "search.php"; ?></div>	
			
		</div>	

		<div class="clear"></div>	

		<!-- Footer -->	
		<div class="footer">Footer</div>
	</div>
	
</body>
</html>