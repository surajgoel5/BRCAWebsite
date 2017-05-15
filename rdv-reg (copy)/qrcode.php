<?php 

    include('phpqrcode/qrlib.php'); 
	if (isset($_GET["code"])){
		$rdv_no = $_GET["code"];
		// outputs image directly into browser, as PNG stream 
		QRcode::png($rdv_no);
	}
	
	?>