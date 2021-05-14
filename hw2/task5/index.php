<?php
function renderTemplate($page, $menu = '', $content = '') {
    ob_start();
    include "$page.php";
    return ob_get_clean();
}

$have_to_be_lucky = rand(0,1);
if ($have_to_be_lucky) {
    echo renderTemplate('layout', renderTemplate('menu'), renderTemplate('main'));
} else {
    echo renderTemplate('layout', renderTemplate('menu'), renderTemplate('another'));
}
// Не могу понять, как так выходит, что пареметры в функции $menu и $content не используются, но всё работает