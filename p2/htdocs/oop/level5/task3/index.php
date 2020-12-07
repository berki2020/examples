<?php

namespace task3;

include $_SERVER['DOCUMENT_ROOT'] . '/oop/level5/task3/autoload.php';

use task3\UserFormValidator;
use task3\User;

$success = false;
if (! empty($_POST)) {
    try {
        $user = new User();
        $user->load($_POST['id']);
        $success = (new UserFormValidator())->validate($_POST);
        if (!$user->save($_POST)) {
            $success = false;
            throw new \Exception('Ошибка записи данных, попробуйте позже.', 40);
        }
    } catch (\Exception $e) {
        $error = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <?php if (!$success) { ?>
    <form action="" method="POST">
        <input type="text" name="id" value="<?= $_POST['id'] ?? ''; ?>" placeholder="id"><br>
        <input type="text" name="name" value="<?= $_POST['name'] ?? ''; ?>" placeholder="имя"><br>
        <input type="text" name="age" value="<?= $_POST['age'] ?? ''; ?>" placeholder="возраст"><br>
        <input type="text" name="email" value="<?= $_POST['email'] ?? ''; ?>" placeholder="email"><br>
        <input type="submit">
    </form>
    <?php if (isset($error)) { ?>
        <span style="color: red">Валидация не пройдена, ошибка: <?= $error; ?></span>
    <?php } 
         } else { ?>
        <span style="color: green">Валидация пройдена! Данные записаны.</span>
    <?php } ?>
</body>
</html>