<?php

$success = false;
$error = false;

if (isset($_SESSION['auth']) && $_SESSION['auth']) {
    setcookie("login", $_COOKIE['login'], time() + 60 * 60 * 24 * 30, '/');
}

if (!empty($_POST)) {

    $login = mysqli_real_escape_string(connect(), $_POST['login']);
    $password = mysqli_real_escape_string(connect(), md5($_POST['password']));

    $result = mysqli_query(connect(), "SELECT id FROM users WHERE login = '$login' AND password = '$password' LIMIT 1");
    mysqli_close(connect());

    $result = mysqli_fetch_assoc($result);

    if ($result) {
        mySessionStart();
        setcookie("login", $_POST['login'], time() + 60 * 60 * 24 * 30, '/');
        $success = true;
        $_SESSION['auth'] = true;
        $_SESSION['user_id'] = $result['id'];
    } else {
        $error = true;
    }
}

if ((isset($_SESSION['auth']) && $_SESSION['auth']) && (isset($_GET['login']) && $_GET['login'] == 'off')) {
    mySessionDestroy();
}
