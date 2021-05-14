<?php

$a = rand(-20, 20);
$b = rand(-10, 10);
$c = rand(0, 15);
echo "\$a = $a, \$b = $b, \$c = $c <hr>"; // выводим значения сгенерированных переменных

echo "Задание 1.<br>";
// Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения.
// Затем написать скрипт, который работает по следующему принципу:
// если $a и $b положительные, вывести их разность;
// если $а и $b отрицательные, вывести их произведение;
// если $а и $b разных знаков, вывести их сумму;
// Ноль можно считать положительным числом.

if ($a >= 0 && $b >= 0) {
    echo $a - $b;
}
if ($a < 0 && $b < 0) {
    echo $a * $b;
}
if (($a < 0 && $b >= 0) || ($a >= 0 && $b < 0)) {
    echo $a + $b;
}

echo "<br>";

// Задание 1, но с извращением, всего 3 маленьких условия, красота
function check($x, $y)
{
    if ($x >= 0) {
        if ($y >= 0) {
            return $x - $y;
        } else {
            return $x + $y;
        }
    } elseif ($y < 0) {
        return $x * $y;
    } else {
        return $x + $y;
    }
}

$result = check($a, $b);
echo $result;

echo "<br><hr>";

echo "Задание 2.<br>";
// Присвоить переменной $а значение в промежутке [0..15].
// С помощью оператора switch организовать вывод чисел от $a до 15.
// При желании сделайте это задание через рекурсию.

switch ($c) {
    case 0:
        echo "0 ";
    case 1:
        echo "1 ";
    case 2:
        echo "2 ";
    case 3:
        echo "3 ";
    case 4:
        echo "4 ";
    case 5:
        echo "5 ";
    case 6:
        echo "6 ";
    case 7:
        echo "7 ";
    case 8:
        echo "8 ";
    case 9:
        echo "9 ";
    case 10:
        echo "10 ";
    case 11:
        echo "11 ";
    case 12:
        echo "12 ";
    case 13:
        echo "13 ";
    case 14:
        echo "14 ";
    default:
        echo "15<br>";
}

// Через рекурсию
function switcher($x)
{
    echo "$x ";
    if ($x === 15) return;
    switcher($x + 1);
}

switcher($c);

echo "<br><hr>";

echo "Задание 3.<br>";
// Реализовать основные 4 арифметические операции в виде функций с двумя параметрами.
// Обязательно использовать оператор return.
// В делении проверьте деление на 0 и верните текст ошибки.

function sum($x, $y)
{
    return $x + $y;
}

function sub($x, $y)
{
    return $x - $y;
}

function mul($x, $y): int
{
    return $x * $y;
}

function div($x, $y): float|int|string
{
    if ($y === 0) return "Infinity";
    return round($x / $y, 2);
}

echo sum($a, $b) . "<br>";
echo sub($a, $b) . "<br>";
echo mul($a, $b) . "<br>";
echo div($a, $b) . "<br>";

echo "<hr>";

echo "Задание 4.<br>";
// Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
// где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
// В зависимости от переданного значения операции выполнить одну из арифметических операций
// (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).

function mathOperation($arg1, $arg2, $operation = 'sum')
{
    switch ($operation) {
        case 'sum':
            echo sum($arg1, $arg2);
            break;
        case 'sub':
            echo sub($arg1, $arg2);
            break;
        case 'mul':
            echo mul($arg1, $arg2);
            break;
        case 'div':
            echo div($arg1, $arg2);
            break;
        default:
            echo "Incorrect operation.";
    }
//    echo match ($operation) {         // подсказала сама IDE такой способ
//        'sum' => sum($arg1, $arg2),
//        'sub' => sub($arg1, $arg2),
//        'mul' => mul($arg1, $arg2),
//        'div' => div($arg1, $arg2),
//        default => "Incorrect operation.",
//    };
}

echo mathOperation($a, $b) . "<br>";
echo mathOperation($a, $b, 'sub') . "<br>";
echo mathOperation($a, $b, 'mul') . "<br>";
echo mathOperation($a, $b, 'div') . "<br>";

echo "<hr>";
echo "Задание 6.<br>";
// С помощью рекурсии организовать функцию возведения числа в степень.
// Формат: function power($val, $pow), где $val – заданное число, $pow – степень.

function power($val, $pow)
{
    if ($pow < 0) {
        if ($val === 0) return "Infinity";
        if ($pow !== -1) {
            return 1 / $val * power($val, $pow + 1);
        } else {
            return 1 / $val;
        }
    } elseif ($pow > 0) {
        if ($pow !== 1) {
            return $val * power($val, $pow - 1);
        } else {
            return $val;
        }
    } else {
        return 1;
    }
}

echo "$a ^ $b = " . power($a, $b);

echo "<br><hr>";
echo "Задание 7.<br>";
// Написать функцию, которая вычисляет текущее время и
// возвращает его в формате с правильными склонениями, например:
// 22 часа 15 минут
// 21 час 43 минуты

// Наверняка не самое оптимальное решение, быть может позже допишу, если придумаю
function timeNow(): string
{
    $hours = date("G");
    $minutes = date("i");
    $str = "Текущее время: ";

    if ($hours == 0 || (5 <= $hours && $hours <= 20)) {
        $str .= "$hours часов ";
    } elseif ($hours == 1 || $hours == 21) {
        $str .= "$hours час ";
    } else {
        $str .= "$hours часа ";
    }
    if (
        $minutes == 0 ||
        (5 <= $minutes && $minutes <= 20) ||
        (25 <= $minutes && $minutes <= 30) ||
        (35 <= $minutes && $minutes <= 40) ||
        (45 <= $minutes && $minutes <= 50) ||
        (55 <= $minutes && $minutes <= 60)
    ) {
        $str .= "$minutes минут.";
    } elseif (
        $minutes == 1 ||
        $minutes == 21 ||
        $minutes == 31 ||
        $minutes == 41 ||
        $minutes == 51
    ) {
        $str .= "$minutes минута.";
    } else {
        $str .= "$minutes минуты.";
    }
    return $str;
}

echo timeNow();