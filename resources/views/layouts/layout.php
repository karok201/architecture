<?php

/**
 * @var $content
 */

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>Document</title>
</head>
<body>

<header class="sticky top-0 z-50 bg-white">
    <?php require(APP_PATH . '/resources/views/components/navbar.php') ?>
</header>

<main>
    <?= $content ?>
</main>

<footer class="relative bg-gray-300 pt-8 pb-6">
    <?= file_get_contents(APP_PATH . '/resources/views/components/footer.php') ?>
</footer>

<script src="/resources/js/main.js"></script>
</body>
</html>
