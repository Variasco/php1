<div class="cart">
    <h2>Корзина</h2>
    <?php foreach ($cartGoods as $good): ?>
        <div class="cart-good">
            <h4><?= $good['name'] ?></h4>
            <p><?= $good['price'] ?> &#8381;</p>
            <p>Количество: <?= $good['quantity'] ?></p>
            <a class="button" href="?page=cart&action=delete&id=<?= $good['cart_id'] ?>">Удалить</a>
        </div>
    <?php endforeach; ?>
    <p>Итого: <?= $total ?> &#8381;</p>
</div>
<div>
    <h2>Оформление заказа</h2>
    <p><?= $message ?></p>
    <form action="?page=cart&action=order" method="post">
        <input type="text" name="name" placeholder="Имя" required>
        <input type="text" name="phone" placeholder="Телефон" required>
        <input type="submit" name="submit" value="Оформить">
    </form>
</div>