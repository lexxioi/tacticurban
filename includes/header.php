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
                <li><a class="btn--share" href="#share--form">Поделиться</a></li>
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