<?php 
	include "/var/www/workspace/s242/www/harder_version/header.php";

	$db = new PDO("mysql:host=localhost;dbname=student","root","root");

	$id = $_GET['id'] ?? 0;

    $sql = "SELECT *, DATE_FORMAT('date','%d.%m.%Y') news_date FROM news WHERE id=?";

    $res = $db->prepare($sql);

    $res->bindValue(1,$id,PDO::PARAM_INT);

    $res->execute();

    $row = $res->fetch();

    if($row)
    {
?>
    


<body>
	<div class="news-block">
		<ul>
			<li class="news-block-top__nav">
				<p>Главная&nbsp;/&nbsp;</p>
				<p class="news-block-top__nav--p"><?=$row['title']?></p>
			</li>
			<li class="news-block-top__title">
				<h2><?=$row['title']?></h2>
			</li>
			<li class="main-info__block--date"><p><?=$row['news_date']?></p></li>
		</ul>

    	<p><?=strip_tags($row['announce'])?></p>
    	<p><?=strip_tags($row['content'])?></p></li>
	</div>
    
</body>



<?php
	}
	else
	{
		echo "Новость отсутствует";
	} 
	include "/var/www/workspace/s242/www/harder_version/footer.php";
?>