<?php
	if(isset($_POST["feedbackMsg"]) && isset($_POST["mail"])){
		$msg = wordwrap($_POST["feedbackMsg"], 70, "\r\n");
		$mail = $_POST["mail"];

		mail("earlofdarkness23334@gmail.com", $mail, $msg, "FROM: webdv@webdv.zzz.com.ua");
	};
?>