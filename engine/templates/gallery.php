<div class="post_title"><h2>Моя галерея</h2></div>
<p><?= $message ?></p>
<div class="gallery">
    <?php foreach ($images as $image): ?>
        <a rel="gallery" class="gallery__photo" href="/?page=big_picture&id=<?= $image['id'] ?>">
            <img class="gallery__img" src="gallery_img/small/<?= $image['name'] ?>" width="150" height="100"/></a>
    <?php endforeach; ?>
</div>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="userfile">
    <input type="submit" name="submit" value="Загрузить">
</form>