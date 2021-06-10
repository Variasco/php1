<div class="container">
    <?php foreach ($catalog as $good): ?>
        <div class="good">
            <a class="good__link" href="?page=product&id=<?= $good['id'] ?>">
                <h2><?= $good['name'] ?></h2>
                <img src="product_img/<?= $good['picture'] ?>" alt="<?= $good['picture'] ?>">
            </a>
            <p><?= $good['price'] ?> &#8381;</p>
            <a class="button" href="?page=catalog&action=buy&id=<?= $good['id'] ?>">В корзину</a>
        </div>
    <?php endforeach; ?>
</div>