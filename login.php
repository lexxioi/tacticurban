<?php session_start();
$link=mysqli_connect('localhost', 'root', '', 'tacticurban');
if (!$link) {
    die("Ошибка соединения: " . mysqli_connect_error());
}

if(!empty($_POST['password']) and !empty($_POST['login'])){
	$login= $_POST['login'];
	$query = "SELECT * FROM users WHERE login='$login'";
	$result = mysqli_query($link, $query);
	$user = mysqli_fetch_assoc($result);
	$hash = $user['password'];
	if (password_verify($_POST['password'], $hash)){
		if(!empty($user)){
		$_SESSION['auth']=true;
		$_SESSION['login'] = $login;
		$_SESSION['id']=$user['id'];
		header('Location: works.php');
		} 
	} else {
		$error = "Неправильно введен логин или пароль";
	} 
}
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
            <h2>Авторизация</h2>
        </div>
        <div class="error" style="text-align: center; color: #689F38; font-size: 18px;"><b><?php echo $error; ?></b></div>
        <form action="" method="POST" class="auth">
            <label for="login">Логин</label>
            <input name="login" id="login"></input>
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password"></input>

            <div class="info--user">
                <p>Вы не зарегистрированы? 
                    <a href="register.php" class="link--user">Зарегистрироваться</a>
                </p>
            </div>

            <input type="submit" name="" id="btn--submit" value="Войти">
        </form>

        
    </main>
    <?php include_once "includes/footer.php"?>