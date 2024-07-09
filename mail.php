<?php
	if(isset($_POST))
	{
		mail($_POST['email'],"Имя: ".$_POST['name'],$_POST["message"]);
	}
?>