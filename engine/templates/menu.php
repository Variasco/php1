<?php if ($auth): ?>
    <p>Вход выполнен. Пользователь с именем <?= $name ?><a href="?page=logout">[Выход]</a></p>
<?php else: ?>
    <form action="?page=login" method="post">
        <input type="text" name="login">
        <input type="password" name="pass">
        <span>Save</span><input type="checkbox" name="save">
        <input type="submit" name="submit">
    </form>
<?php endif; ?>
<ul class="menu__ul">
    <li class="menu__li"><a class="menu__link" href="/">Главная</a></li>
    <li class="menu__li"><a class="menu__link" href="/?page=gallery">Галерея</a></li>
    <li class="menu__li"><a class="menu__link" href="/?page=catalog">Каталог</a></li>
    <li class="menu__li"><a class="menu__link" href="/?page=cart">Корзина</a></li>
    <li class="menu__li"><a class="menu__link" href="/?page=about">О нас</a></li>
    <?php if (isAdmin()): ?>
        <li class="menu__li"><a class="menu__link" href="/?page=admin">Админка</a></li>
    <?php endif; ?>
</ul>