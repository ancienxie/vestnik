<?php 
	include "./header.php";

	$db = new PDO("mysql:host=localhost;dbname=news","root","root");

	$id = $_GET['id'] ?? 0;

    $sql = "SELECT *, DATE_FORMAT(`date`,'%d.%m.%Y') news_date FROM news WHERE id=?";

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
                <p class="news-block-top__nav--p">
                    <?=$row['title']?>
                </p>
            </li>
            <li class="news-block-top__title">
                <h1 class="news-block-top__title--p">
                    <?=$row['title']?>
                </h1>
            </li>
        </ul>
        <section class="news-block__section">
            <ul class="news-block__section-left">
                <li class="news-block__date">
                    <p>
                        <?=$row['news_date']?>
                    </p>
                </li>
                <li class="news-block-announce">
                    <h2>
                        <?=strip_tags($row['announce'])?>
                    </h2>
                </li>
                <li class="news-block--content">
                    <p class="news-block--content--p">
                        <?=strip_tags($row['content'])?>
                    </p>
                </li>
                <li class="news-block__button">
                    <a href="../index.php" class="news-block__button--text">
                        <div id="arrow-3"></div>
                        НАЗАД К НОВОСТЯМ
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <img class="news-block__section-right--img" src="../images/<?=$row['image']?>" alt="Картинка">
                </li>
            </ul>
        </section>

    </div>
 
 </body>


<?php
	}
	else
	{
		echo "Новость отсутствует";
	} 
	include "./footer.php";
?>