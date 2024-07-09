<?php
	if (file_get_contents('php://input') != null){
		$inputJSON = file_get_contents('php://input');
		$input= json_decode( $inputJSON, TRUE ); 
	$mailBody = "Комментарий от ${input['name']} - ${input['email']}: \n ${input['message']}";
	mail(
			"metasea333@gmail.com", 
			"Комментарий от пользователя",
			$mailBody);
}
