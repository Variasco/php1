<?php
function getCatalog() {
    return getAssocResult("SELECT `id`, `name`, `picture`, `price` FROM `catalog`");
}

function getOneGood($id) {
    return getOneResult("SELECT `id`, `name`, `picture`, `description`, `price` FROM `catalog` WHERE `id` = {$id}");
}

