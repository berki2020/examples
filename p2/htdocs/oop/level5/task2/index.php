<?php

namespace task2;

include $_SERVER['DOCUMENT_ROOT'] . '/oop/level5/task2/autoload.php';

use task2\UserFormValidator;

$success = false;
if (! empty($_POST)) {
    try {
        $success = (new UserFormValidator())->validate($_POST);
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
        <input type="text" name="name" value="<?= $_POST['name'] ?? ''; ?>" placeholder="имя"><br>
        <input type="text" name="age" value="<?= $_POST['age'] ?? ''; ?>" placeholder="возраст"><br>
        <input type="text" name="email" value="<?= $_POST['email'] ?? ''; ?>" placeholder="email"><br>
        <input type="submit">
    </form>
    <?php if (!empty($_POST)) { ?>
        <span style="color: red">Валидация не пройдена, ошибка: <?= $error; ?></span>
    <?php } 
         } else { ?>
        <span style="color: green">Валидация пройдена!</span>
    <?php } ?>
</body>
</html>