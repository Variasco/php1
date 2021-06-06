<a href="<?= $_SERVER['HTTP_REFERER'] ?>">Назад</a>
<?php if (isset($good)): ?>
    <div class="good">
        <h2><?= $good['name'] ?></h2>
        <img src="product_img/<?= $good['picture'] ?>" alt="<?= $good['picture'] ?>">
        <p><?= $good['description'] ?></p>
        <p><?= $good['price'] ?> &#8381;</p>
        <button>Купить</button>
    </div>
<?php else: ?>
    <p>Товар не найден</p>
<?php endif; ?>