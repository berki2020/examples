<?php

$user_id = mysqli_real_escape_string(connect(), $_SESSION['user_id']);

$result = mysqli_query(connect(), "SELECT * FROM users LIMIT 1");
$user = mysqli_fetch_assoc($result);

$result = mysqli_query(connect(), "SELECT g.name AS name, g.description AS description FROM groups_users AS gu LEFT JOIN groups AS g ON gu.group_id = g.id WHERE user_id = '$user_id' LIMIT 2");

while ($group = mysqli_fetch_assoc($result)) {
    $groups[] = $group;
}
?>
<p>Информация о пользователе</p>
<ul>
    <li>id пользователя: <?= $user['id']; ?></li>
    <li>Активность: <?= $user['active']; ?></li>
    <li>Ф.И.О: <?= $user['fullname']; ?></li>
    <li>email: <?= $user['email']; ?></li>
    <li>Телефон: <?= $user['phone']; ?></li>
    <li>Логин: <?= $user['login']; ?></li>
    <li>Пароль: <?= $user['password']; ?></li>
    <li>Флаг подписки: <?= $user['flag']; ?></li>
</ul>
<p>Группы</p>
<ul>
    <?php foreach ($groups as $group): ?>
        <li>Имя: <?= $group['name']; ?> - Описание: <?= $group['description']; ?></li>
    <?php endforeach; ?>
</ul>