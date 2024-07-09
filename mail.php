<?php
	if (file_get_contents('php://input') != null){
		$inputJSON = file_get_contents('php://input');
		$input= json_decode( $inputJSON, TRUE ); 
	$mailBody = "Вопрос от ${input['name']} - ${input['email']}: \n ${input['message']}";
	mail(
			"metasea333@gmail.com", 
			"Нам задали вопрос", 
			$mailBody);
}
