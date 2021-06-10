<?php

function getUser()
{
    if (isset($_SESSION['login'])) {
        return $_SESSION['login'];
    }
    return 'guest';
}

function isAuth()
{
    if (isset($_SESSION['login'])) {
        return true;
    }
    if (isset($_COOKIE['hash'])) {
        $result = getOneResult("SELECT * FROM `users` WHERE `hash` = '{$_COOKIE['hash']}'");
        if ($result) {
            $user = $result['login'];
            if (!empty($user)) {
                $_SESSION['login'] = $user;
                return true;
            }
        }
    }
    return false;
}

function auth($login, $pass)
{
    $login = mysqli_real_escape_string(getDb(), strip_tags(stripcslashes($login)));
    $result = getOneResult("SELECT * FROM `users` WHERE `login` = '{$login}'");
    if ($result) {
        if ($pass == $result['pass']) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $result['id'];
            return true;
        }
    }
    return false;
}

function setHash($id, $hash)
{
    executeSql("UPDATE `users` SET `hash` = '{$hash}' WHERE `id` = {$id}");
}

function isAdmin()
{
    if (isset($_SESSION['login']) && ($_SESSION['login'] == 'admin')) {
        return true;
    }
    return false;
}