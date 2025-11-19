<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ТактикУрбан</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/logo.svg">
</head>
<body>
    <header id="header">
        <div class="logo--header">
            <a href="index.php">
                <img src="img/logo.svg" alt="логотип тактического урбанизма">
            </a>
        </div>
        <nav>
            <ul class="menu">
                
                <li><a class="link" href="history.php">История</a></li>
                <li><a class="link" href="works.php">Проекты</a></li>
                <li><a class="link" href="articles.php">Статьи</a></li>
                <?php if(isset($_SESSION['auth']) && $_SESSION['auth'] == true) {  ?>
                <li><a class="link link--auth" href="profile.php">Профиль</a></li>
                <li><a class="link link--auth--last" href="myarticles.php">Мои статьи</a></li>
                <?php } ?>
                <li><a class="btn--share" href="works.php#share--form">Поделиться</a></li>
                <?php if(isset($_SESSION['auth']) && $_SESSION['auth'] == true) { ?>
                <li><a class="user-icon" href="logout.php"><img src="img/solar_logout-outline.svg" alt="иконка выхода" title="Выйти"></a></li>
                <?php } else {?>
                <li><a class="user-icon" href="register.php"><img src="img/icon_user.svg" alt="иконка пользователя" title="Зарегистрироваться"></a></li>
                <?php } ?>
            </ul>
        </nav>

        <div class="burger" id="burger">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="mobile-menu" id="mobileMenu">
            <nav class="mobile-nav">
                <li><a href="history.php">История</a></li>
                <li><a href="works.php">Проекты</a></li>
                <li><a href="articles.php">Статьи</a></li>
                <li><a class="btn--share-mobile" href="#share--form">Поделиться</a></li>
                <li><a href="register.php">Личный кабинет</a></li>
            </nav>
        </div>
    </header>
    <main>

        <div class="title--pages">
            <h2>Мои статьи</h2>
        </div>

       <section class="my_articles">
        <div class="container">
            <div class="russia">
                    <div class="item--russia">
                        <img src="img/image 9.jpg" alt="Тактический урабнизм в Москве">
                        <div class="wrap--text">
                            <div class="subtitle-russia">
                                Черниговский переулок в Москве (2015)
                            </div>
                            <div class="text--russia">
                                В 2015 году Черниговский переулок превратился в городскую гостиную под открытым небом: без капитального строительства. Пространство оснастили скамейками, креслами, книжными полками. Проект тестировал идею пешеходной зоны в центре города и стал примером, как можно оживить улицу малыми средствами.
                            </div>
                        </div>
                    </div>
                    <div class="item--russia">
                        <img src="img/image 10.jpg" alt="Тактический урабнизм в Твери">
                        <div class="wrap--text">
                            <div class="subtitle-russia">
                                Сквер-пергола в Твери (2017) 
                            </div>
                            <div class="text--world">
                                Молодой архитектор нашел спонсоров и за две недели сделал из пустыря на набережной Степана Разина новое общественное пространство. Сквер-пергола из жесткого каркаса и деревянных колонн имеет несколько разных скамей: часть для проведения мероприятий, часть просто для отдыха случайных прохожих. На это ушел всего 1 миллион рублей. Позднее автор проекта получил диплом международного жюри.
                            </div>
                        </div>
                    </div>
                </div>
        </div>
       </section>
    </main>
    <?php include_once "includes/footer.php"?>