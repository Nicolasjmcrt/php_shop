<?php
require_once './inc/head_inc.php';
?>
<title>Apple | Shop</title>
</head>

<body>

    <?php
    require_once './inc/header_inc.php';
    require_once './inc/shopnav_inc.php';
    ?>

    <div class="container-fluid container-ipad">
        <a class="ipad-section" href="<?= URL ?>category.php?category=iPad">
            <div class="ipad-section-texts">
                <h2 class="text-center">iPad</h2>
                <h3 class="text-center">Lovable. Drawable. Magical.</h3>
            </div>
        </a>
    </div>
    <div class="container-fluid container-iphone">
        <a class="iphone-section" href="<?= URL ?>category.php?category=iPhone">
            <div class="iphone-section-texts">
                <h2 class="text-center">iPhone 14 Pro</h2>
                <h3 class="text-center">Pro. Beyond.</h3>
            </div>
        </a>
    </div>
    <div class="container-fluid container-watch">
        <a class="watch-section" href="<?= URL ?>category.php?category=Watch">
            <div class="watch-section-texts">
                <h2 class="text-center"> WATCH<br><span>ultra</span></h2>
                <h3 class="text-center">Adventure awaits.</h3>
            </div>
        </a>
    </div>
    <div class="container-fluid container-mac">
        <a class="mac-section" href="<?= URL ?>category.php?category=Mac">
            <div class="mac-section-texts">
                <h2 class="text-center">MacBook Pro 13″</h2>
                <h3 class="text-center">Pro anywhere.</h3>
            </div>
        </a>
    </div>
    <div class="container-fluid container-double d-flex">
        <a class="iphone14-section col-6" href="<?= URL ?>category.php?category=iPhone">
            <div class="iphone14-section-texts">
                <h2 class="text-center">iPhone 14</h2>
                <h3 class="text-center">Big and bigger</h3>
            </div>
        </a>
        <a class="tv4k-section col-6" href="<?= URL ?>category.php?category=TV/Home">
            <div class="tv4k-section-texts">
                <h2 class="text-center">Apple TV 4k</h2>
                <h3 class="text-center">The Apple experience. Cinematic in every sense.</h3>
            </div>
        </a>
    </div>
    <?php
    require_once './inc/footer_inc.php';
    ?>