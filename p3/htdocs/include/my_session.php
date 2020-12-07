<?php

function mySessionStart()
{
    if (!session_id()) {
    	$sessionCookieLifeTime = 360;
        ini_set('session.gc_maxlifetime', 3600);
        ini_set('session.cookie_lifetime', $sessionCookieLifeTime);
        session_start();
        setcookie(session_name(), session_id(), time() + $sessionCookieLifeTime, '/');
    }
}

function mySessionDestroy()
{
    setcookie(session_name(), session_id(), time() - 10);
    session_unset();
    session_destroy();
    header('Location: /');
}
