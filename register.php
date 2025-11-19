<?php 
session_start();
$link = mysqli_connect('localhost', 'root', '', 'tacticurban');
if (!$link) {
    die("Ошибка соединения: " . mysqli_connect_error());
}

$errors = []; // Массив для сбора ошибок

if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['confirm'])) {
    $login = $_POST['login'];
    // $password = password_hash($password, PASSWORD_DEFAULT);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    
    // Проверяем занятость логина
    $query = "SELECT * FROM users WHERE login='$login'";
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($result); 
    
    if ($user) {
        $errors[] = "Логин занят";
    }
    
    // Проверяем совпадение паролей
    if ($password !== $confirm) {
        $errors[] = "Пароли не совпадают";
    }
    
    // Если ошибок нет - регистрируем пользователя
    if (empty($errors)) {
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users SET login='$login', password='$hashPassword'";
        
        if (mysqli_query($link, $query)) {
            $_SESSION['auth'] = true;
            $id = mysqli_insert_id($link);
            $_SESSION['id'] = $id;
            header("Location: works.php");
            exit;
        } else {
            $errors[] = "Ошибка регистрации: " . mysqli_error($link);
        }
    }
    var_dump($password, $confirm);
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
            <h2>Регистрация</h2>
        </div>
        
        <!-- Блок для вывода ошибок -->
        <?php if (!empty($errors)): ?>
            <div class="errors-container">
                <?php foreach ($errors as $error): ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" class="auth">
            <label for="login">Логин</label>
            <input name="login" id="login"></input>
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password"></input>
            <label for="confirm">Повторите пароль</label>
            <input type="password" name="confirm" id="confirm"></input>
            
            <div class="info--user">
                <p>Вы зарегистрированы? 
                    <a href="login.php" class="link--user">Войти</a>
                </p>
            </div>

            <input type="submit" name="" id="btn--submit" value="Зарегистрироваться">
        </form>
        
    </main>
    <?php include_once "includes/footer.php"?>