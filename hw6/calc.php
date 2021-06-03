<?php
$result = 'Error. Something went wrong..';
if (isset($_POST['operation'])) {
    $arg1 = (float)$_POST['arg1'];
    $arg2 = (float)$_POST['arg2'];
    $operation = strip_tags((string)$_POST['operation']);
    $result = calc($arg1, $arg2, $operation);
}

$response['result'] = $result;
echo json_encode($response);

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