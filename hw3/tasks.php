<?php
echo "Задание 1.<br>";
// С помощью цикла while вывести все числа в промежутке от 0 до 100,
// которые делятся на 3 без остатка.

$i = 0;
$str = "";
while ($i <= 100) {
    if (!($i % 3)) {
        $str .= $i . ", ";
    }
    $i++;
}

echo substr($str, 0, -2) . ".";

echo "<hr><br>";

echo "Задание 2.<br>";
// С помощью цикла do…while написать функцию для вывода чисел от 0 до 10,
// чтобы результат выглядел так:
// 0 – ноль.
// 1 – нечетное число.
// 2 – четное число.
// 3 – нечетное число.
// …
// 10 – четное число.

$i = 0;
do {
    if (!$i) {
        echo "{$i} - ноль.<br>";
    } else {
        echo match ($i & 1) {
            1 => "{$i} - нечетное число.<br>",
            0 => "{$i} - четное число.<br>",
        };
    }
    $i++;
} while ($i <= 10);

echo "<hr><br>";

echo "Задание 3.<br>";
// Объявить массив, в котором в качестве ключей будут использоваться названия областей,
// а в качестве значений – массивы с названиями городов из соответствующей области.
// Вывести в цикле значения массива, чтобы результат был таким:
// Московская область:
// Москва, Зеленоград, Клин.
// Ленинградская область:
// Санкт-Петербург, Всеволожск, Павловск, Кронштадт.
// Рязанская область … (названия городов можно найти на maps.yandex.ru)
// строго соблюдать формат вывода выше, т.е. двоеточие и точка в конце

$russia = [
    "Московская область" => [
        "Москва",
        "Зеленоград",
        "Клин",
    ],
    "Ленинградская область" => [
        "Санкт-Петербург",
        "Всеволожск",
        "Павловск",
        "Кронштадт",
    ],
    "Рязанская область" => [
        "Рязань",
        "Скопин",
        "Шилово",
        "Сасово",
    ],
];

$str = "";
foreach ($russia as $region => $cities) {
    $str .= $region . ":<br>" . implode(", ", $cities) . ".<br>";
}
echo $str;

echo "<hr><br>";

echo "Задание 4.<br>";
// Объявить массив, индексами которого являются буквы русского языка,
// а значениями – соответствующие латинские буквосочетания
// (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
// Написать функцию транслитерации строк. Она должна учитывать и заглавные буквы.

$letters = [
    'а' => 'a',   'б' => 'b',   'в' => 'v',
    'г' => 'g',   'д' => 'd',   'е' => 'e',
    'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
    'и' => 'i',   'й' => 'y',   'к' => 'k',
    'л' => 'l',   'м' => 'm',   'н' => 'n',
    'о' => 'o',   'п' => 'p',   'р' => 'r',
    'с' => 's',   'т' => 't',   'у' => 'u',
    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
    'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
    'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
    'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
];

function transliterator ($string, $template)
{
    $transliterated_str = '';
    foreach (mb_str_split($string) as $letter) {
        foreach ($template as $ru_letter => $latin_letter) {
            if ($letter == mb_strtoupper($ru_letter)) {
                $transliterated_str .= strtoupper($latin_letter);
                break;
            } elseif ($letter == $ru_letter) {
                $transliterated_str .= $latin_letter;
                break;
            } elseif ($latin_letter == end($template))
            {
                $transliterated_str .= $letter;
            }
        }
    }
    return $transliterated_str;
}

echo transliterator("Привет, мир!", $letters);

echo "<hr><br>";

echo "Задание 5.<br>";
// Написать функцию, которая заменяет в строке пробелы на подчеркивания и
// возвращает видоизмененную строчку. Можно через str_replace

function separator ($string)
{
    return str_replace(' ', '_', $string);
}

echo separator('Привет Мир!');

echo "<hr><br>";

echo "Задание 7.<br>";
// Вывести с помощью цикла for числа от 0 до 9,
// не используя тело цикла. Выглядеть должно так:
// for (…){ // здесь пусто}

for ($i = 0; $i <= 10; print ($i++ . " "));

echo "<hr><br>";

echo "Задание 8.<br>";
// Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».

$str = "";
foreach ($russia as $region => $cities) {
    $sub_str = $region . ":<br>";
    foreach ($cities as $city) {
        if (mb_strtolower(substr($city, 0, 2)) == "к") {
            $sub_str .= $city . ", ";
        }
    } if ($sub_str[-1] !== ">") {
        $str .= substr($sub_str, 0, -2) . ".<br>"; // убираем последнюю запятую и ставим точку
    }
}
echo $str;

echo "<hr><br>";

echo "Задание 9.<br>";
// Объединить две ранее написанные функции в одну, которая получает строку на русском языке,
// производит транслитерацию и замену пробелов на подчеркивания
// (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).

echo transliterator(separator("Тут название статьи или блога"), $letters);