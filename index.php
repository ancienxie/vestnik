<?php 
    //include "./vendor/autoload.php";
    include "./header.php";
    $db = new PDO("mysql:host=localhost;dbname=news","root","root");
    $sql = "SELECT * FROM news ORDER BY `date` DESC LIMIT 1";
    $res = $db->query($sql);
    $row = $res->fetch();

    //dump($_SERVER);
?>
    <div style="background-image: url(./images/<?=$row['image']?>);" class="ban-image">
        <section   class="ban-image__text">
            <h1 class="ban-image__text--title"><?=$row['title']?></h1>
            <p class="ban-image__text--info"><?=strip_tags($row['announce'])?></p>
        </section>
    </div>    
    <div class="main-info">
        <section class="main-info__title">
                <h1 class="main-info__title--text">Новости</h1>
        </section>
        <?php
            $sql = "SELECT *, DATE_FORMAT(`date`,'%d.%m.%Y') news_date FROM news ORDER BY `date` DESC LIMIT 4";
            $res = $db->query($sql);

        ?>

        <section class="main-info__block">
        <?php
            foreach($res->fetchALL() as $row)
            {
        ?>
            <ul class="main-info__block--news">
                <li class="main-info__block--date"><p><?=$row['news_date']?></p></li>
                <li class="main-info__block--title"><h2><?=$row['title']?></h2></li>
                <li class="main-info__block--text"><p><?=strip_tags($row['announce'])?></p></li>
                <li class="main-info__block--button">
                    <a href="./news.php?id=<?=$row['id']?>" class="main-info__block--button--text">
                        ПОДРОБНЕЕ<div id="arrow-1"></div>
                    </a>
                </li>
            </ul>
        <?php
            }
        ?>   
        </section>
    </div>
    <div class="nav">
        <ul class="nav__elem">
            <li class="nav__elem--button"><button class="nav_elem--button--text">1</button></li>
            <li class="nav__elem--button"><button class="nav_elem--button--text">2</button></li>
            <li class="nav__elem--button"><button class="nav_elem--button--text">3</button></li>
            <li class="nav__elem--button"><button class="nav_elem--button--arrow"><div id="arrow-2"></div></button></li>
        </ul>
    </div>

    <form class = "form1" method="POST">
        <div class="form1--errors">
            <div class="errorMessages"></div>
        </div>
        <div class="form1--content">
            <div id="forma">
                <div class="form1--content--name">
                    <label for="name">Ваше имя</label>
                    <input type = "text" name="name">
                </div>

                <div class="form1--content--email">
                    <label for="email">Ваш email</label>
                    <input type = "text" name="email">
                </div>

                <div class="form1--content--message">
                    <label for="message">Комментарий</label>
                    <textarea type = "text" name="message" rows="2" cols="10"></textarea>
                </div>

                <input type="submit" class="sender" value="Отправить">
            </div>
        </div>
    </form>

    <?php 
    //if(preg_match("/([a-z0-9])(\d+)/", $value)){
    //if(preg_match("/([a-z0-9])\.(ru|org|com)/", $value)){
    //echo preg_replace("/[a-z0-9]+\.(ru|org|com)/","<b>$0<b/>", $value);
        //echo $value;
    //}?>

    <!-- <?php //echo preg_replace("/^(?!\d)[a-zA-Z0-9]+\@[a-zA-Z0-9]+\.(?!\d)[a-zA-Z0-9]{2,}+(\.(?!\d)[a-zA-Z0-9]{2,})*(\.(?!\d)[a-zA-Z0-9]{2,})*$/","<a href=mailto:metasea333@gmail.com>", "metasea333@gmail.com")?>text</a> -->

    
<?php include "./footer.php"?>
<?php //index.php?>