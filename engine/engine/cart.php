<?php
function addToCart($session_id, $product_id) {
    // Тут в случае, если записи с заданными параметрами в таблице нет, то выбрасывает warning за обращение по значению
    // к массиву, который null
    $quantity = (int)getOneResult("SELECT `quantity` FROM `cart` WHERE 
            `product_id` = {$product_id} AND `session_id` = '{$session_id}'")['quantity'];
    if ($quantity >= 1) {
        executeSql("UPDATE `cart` SET `quantity` = `quantity` + 1 WHERE 
            `product_id` = {$product_id} AND `session_id` = '{$session_id}'");
    } else {
        executeSql("INSERT INTO `cart` (`session_id`, `product_id`) VALUES ('{$session_id}', {$product_id})");
    }
}

function fetchCart($session_id) {
    return getAssocResult("SELECT catalog.id catalog_id, cart.id cart_id, catalog.name name, catalog.price price, cart.quantity quantity FROM 
            `catalog`, `cart` WHERE `catalog`.id = `cart`.product_id AND cart.session_id = '{$session_id}'");
}

function fetchTotalPrice($session_id) {
    return (float)getOneResult("SELECT SUM(`catalog`.`price`*`cart`.`quantity`) `total` FROM `catalog`, `cart` 
            WHERE `catalog`.`id` = `cart`.`product_id` AND `session_id` = '{$session_id}'")['total'];
}

function deleteCart($id) {
    executeSql("DELETE FROM `cart` WHERE `id` = {$id}");
}