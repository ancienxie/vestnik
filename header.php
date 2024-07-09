	<!DOCTYPE html>
	<html lang="en">
	<head>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="stylesheet" href="./stylesheet/main.css">
    	<title>Галактический вестник</title>
    	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

	</head>
	<body>
	    <div class="top-menu">
	        <ul class="top-menu__elements">
	            <li>
	                <img src="./images/logo.png" alt="Галактический вестник">
	            </li>
				<?php
	    		include "top-menu.php";
	    		foreach($menu as $item){?>
	            <li>
	                <a href="<? echo $item["link"]?>"><p class="top-menu__elements--p"><?=$item["text"];?></p></a>
	            </li>
	            <? }?>
	        </ul>
	    </div>
	    <hr>
    </body>