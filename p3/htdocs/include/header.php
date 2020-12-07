<?php

include $_SERVER['DOCUMENT_ROOT'] . '/include/my_session.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/connection.php';

if (isset($_COOKIE['login'])) {
    mySessionStart();
}

if (!isset($_SESSION['auth']) || !$_SESSION['auth']) {
    if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) != '/') {
        header('Location: /?login=yes');
    }
}

include $_SERVER['DOCUMENT_ROOT'] . '/include/auth.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/menu.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/view_h1.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
</head>

<body>

<div class="header">
    <div class="logo"><img src="/i/logo.png" width="68" height="23" alt="Project"></div>
    <div class="clearfix"></div>
</div>

<div class="clearfix">
<?php printMenu($menuArray, 'main-menu', SORT_DESC); ?>
</div>

</div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="left-collum-index">

            <h1><?= searchTitle($menuArray); ?></h1>
            <?php if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) != '/route/profile/') { ?>
            <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.</p>
            <?php } ?>

        </td>
        <td class="right-collum-index">

            <div class="project-folders-menu">
                <ul class="project-folders-v">
                    <?php if (isset($_SESSION['auth']) && $_SESSION['auth']) { ?>
                        <li class="project-folders-v-active"><a href="/route/profile/">Профиль</a></li>
                        <li class="project-folders-v-active"><a href="?login=off">Выйти</a></li>
                    <?php } else { ?>
                    <li class="project-folders-v-active"><a href="?login=yes">Авторизация</a></li>
                    <li><a href="#">Регистрация</a></li>
                    <li><a href="#">Забыли пароль?</a></li>
                    <?php } ?>
                 </ul>
                <div class="clearfix"></div>
            </div>

            <div class="index-auth">

                <?php if ($success) {
                    include $_SERVER['DOCUMENT_ROOT'] . '/include/success.php';
                } else { ?>
                    <?php if ((isset($_GET['login']) && $_GET['login'] == 'yes')) { ?>
                        <form action="?login=yes" method="POST">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <?php if (!isset($_COOKIE['login'])) { ?>
                                <tr>
                                    <td class="iat">
                                        <label for="login_id">Ваш e-mail:</label>
                                        <input id="login_id" size="30" name="login" value="<?= $_POST['login'] ?? ''; ?>">
                                    </td>
                                </tr>
                                <?php } else { ?>
                                <tr>
                                    <td class="iat">
                                        <input type="hidden" id="login_id" size="30" name="login" value="<?= $_COOKIE['login']; ?>">
                                    </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td class="iat">
                                        <label for="password_id">Ваш пароль:</label>
                                        <input id="password_id" size="30" name="password" type="password" value="<?= $_POST['password'] ?? ''; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="submit" value="Войти"></td>
                                </tr>
                            </table>
                        </form>
                        <?php
                        if ($error) {
                            include $_SERVER['DOCUMENT_ROOT'] . '/include/error.php';
                        }
                    } ?>
                <?php } ?>
            </div>

        </td>
    </tr>
</table>