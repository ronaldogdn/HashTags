<?php
	session_start();
	if(!empty($_POST['valor_guid'])){		
		$_SESSION['guid'] = $_POST['valor_guid'];
	}
	








