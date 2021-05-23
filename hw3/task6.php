<?php
$menu = [
    [
        "title" => "Главная",
        "href" => "/",
    ],
    [
        "title" => "Каталог",
        "href" => "/?page=catalog",
        "children" => [
            [
                "title" => "Процессоры",
                "href" => "/?page=processors",
            ],
            [
                "title" => "Видеокарты",
                "href" => "/?page=videocards",
            ],
            [
                "title" => "Метринские платы",
                "href" => "/?page=motherboards",
            ],
        ],
    ],
    [
        "title" => "О нас",
        "href" => "/?page=about",
    ],
];

function getMenu ($parent) {
    $str = "<ul>";
    foreach ($parent as $key => $item) {
        $str .= "<li><a href=\"{$item["href"]}\">{$item["title"]}</a>";
        if (isset($item["children"])) {
            $str .= getMenu($item["children"]);
        }
        $str .= "</li>";
    }
    $str .= "</ul>";
    return $str;
}

echo getMenu($menu);