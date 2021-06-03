<?php
$result = '';
$arg1 = '';
$arg2 = '';
$actions = [
    'sum' => '+',
    'sub' => '-',
    'mul' => '*',
    'div' => '/',
];
$operation = 'sum';

if (isset($_GET['submit'])) {
    $arg1 = (float) $_GET['arg1'];
    $arg2 = (float) $_GET['arg2'];
    $operation = strip_tags((string) $_GET['operation']);
    $result = calc($arg1, $arg2, $operation);
}

function calc($x, $y, $action)
{
    return match ($action) {
        'sum' => sum($x, $y),
        'sub' => sub($x, $y),
        'mul' => mul($x, $y),
        'div' => div($x, $y),
        default => "Error. Wrong operation",
    };
}

function sum($x, $y)
{
    return $x + $y;
}

function sub($x, $y)
{
    return $x - $y;
}

function mul($x, $y)
{
    return $x * $y;
}

function div($x, $y)
{
    if ($y == 0) {
        return INF;
    }
    return $x / $y;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!--    <script defer/>-->
</head>
<body>
<form>
    <input type="text" name="arg1" value="<?= $arg1 ?>">
    <select name="operation" id="">
        <?php foreach ($actions as $action_key => $action_value): ?>
            <option value="<?= $action_key ?>" <?php ($action_key == $operation)? print 'selected' : print '' ?>><?= $action_value ?></option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="arg2" value="<?= $arg2 ?>">
    <input type="submit" name="submit" value="вычислить">
    <input type="text" name="result" value="<?= $result ?>">
</form>
</body>
</html>