<?php

$title = 'Title page';
$red = (bool) rand(0, 1);
$result = [
    'AUTHORS' => [
        'emailFirstAuthor' => ['fullName' => 'firstAuthor', 'birthday' => 1982,],
        'emailSecondAuthor' => ['fullName' => 'secondAuthor', 'birthday' => 1972],
        'emailThirdAuthor' => ['fullName' => 'thirdAuthor', 'birthday' => 1962],
    ],
    'BOOKS' => [
        ['title' => 'firstBook', 'email' => 'emailFirstAuthor'],
        ['title' => 'secondBook', 'email' => 'emailSecondAuthor'],
        ['title' => 'thirdBook', 'email' => 'emailThirdAuthor'],
    ],
];

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title?></title>
    <style type="text/css">.red {color: red;}</style>
</head>
<body>
<h1 <?=$red ? 'class="red"':''?>><?=$title?></h1>

<!-- Выведите реально количество авторов -->
<div>Всего авторов на портале <?=count($result['AUTHORS'])?></div>

<!-- Выведите все книги -->
<?php foreach ($result['BOOKS'] as $book) { ?>
<p>Книга <?=$book['title']?>, ее написал <?=$result['AUTHORS'][$book['email']]['fullName']?> (<?=$book['email']?>)</p>
<?php } ?>
</body>
</html>