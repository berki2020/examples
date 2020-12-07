<?php

function searchTitle($menuArray)
{
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if ($url == '/route/profile/') {
        return 'Профиль';
    }

    foreach ($menuArray as $elem) {
        if ($elem['path'] == $url) {
            return $elem['title'];
        }
    }

    return 'not found';
}
