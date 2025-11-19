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
            <h2>Мой профиль</h2>
        </div>

        <section class="profile">
            <div class="container">
                <div class="box-profile">
                    <img src="" alt="" class="img--profile">
                    <div class="infoblock">
                        <div class="it--infoblock">
                            <p class="it-name">Фамилия:</p>
                            <p class="musyrname">Дрозденко</p>
                            <div class="line"></div>
                        </div>
                        <div class="it--infoblock">
                            <p class="it-name">Email:</p>
                            <p class="myemail">lexxioi15@yandex.ru</p>
                            <div class="line"></div>
                        </div>
                        <div class="it--infoblock">
                            <p class="it-name">Имя:</p>
                            <p class="myname">Мария</p>
                            <div class="line"></div>
                        </div>
                        <div class="it--infoblock">
                            <p class="it-name">Дата рождения:</p>
                            <p class="mybirth">15.12.2006</p>
                            <div class="line"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include_once "includes/footer.php"?>