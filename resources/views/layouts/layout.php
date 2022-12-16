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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>Document</title>
</head>
<body>
<header>
    <nav class="fixed top-0 z-50 w-screen h-[6%] bg-[#2b2b2b] flex justify-between text-white items-center">
        <div>
            <div class="relative py-3 sm:max-w-xl mx-auto">
                <nav x-data="{ open: false }">
                    <button class="w-10 h-10 relative focus:outline-none" @click="open = !open">
                        <span class="sr-only">Open main menu</span>
                        <div class="block w-5 absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <span aria-hidden="true" class="block absolute h-0.5 w-5 bg-current transform transition duration-250 ease-in-out" :class="{'rotate-45': open,' -translate-y-1.5': !open }"></span>
                            <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current   transform transition duration-250 ease-in-out" :class="{'opacity-0': open } "></span>
                            <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current transform  transition duration-250 ease-in-out" :class="{'-rotate-45': open, ' translate-y-1.5': !open}"></span>
                        </div>
                    </button>
                </nav>
            </div>
        </div>

        <div class="text-center justify-center">
            dasd
        </div>

        <div>
            qweqweqwe
        </div>
    </nav>
</header>
<main class="h-screen bg-[#232323]">
    <?= $content ?>
</main>
<footer>
    <div class="fixed bottom-0 h-12 w-full bg-[#2b2b2b] flex justify-between text-white items-center">
        Footer
    </div>
</footer>
</body>
</html>
