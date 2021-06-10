<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?<?= uniqid(); ?>">
</head>
<body>
<nav class="menu">
    <?=$menu?>
</nav>
<div id="main">
    <?=$content?>
</div>
</body>
</html>