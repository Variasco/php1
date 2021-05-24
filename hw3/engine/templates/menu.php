<ul>
<?php foreach ($menu as $item):?>
    <li><a href="<?=$item["href"]?>"><?=$item["title"]?></a></li>
<?php endforeach;?>
</ul>