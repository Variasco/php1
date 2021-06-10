<div class="orders">
    <h2>Заказы</h2>
    <div class="order">
        <p><b>Имя</b></p>
        <p><b>Телефон</b></p>
        <p><b>Статус</b></p>
    </div>
    <?php foreach ($orders as $order): ?>
        <div class="order">
            <a class="order__link" href="?page=orderDetails&id=<?= $order['id'] ?>">
                <p><?= $order['name'] ?></p>
                <p><?= $order['phone'] ?></p>
                <p><?= $order['status'] ?></p>
            </a>
        </div>
    <?php endforeach; ?>
</div>