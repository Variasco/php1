<?php
function getOrders() {
    return getAssocResult("SELECT `name`, `phone`, `id`, `status` FROM `orders`");
}

function getUserSessionId($id) {
    return getOneResult("SELECT `session_id` FROM `orders` WHERE `id` = {$id}");
}