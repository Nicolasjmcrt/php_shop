<?php
require_once './inc/head_inc.php';
?>
<title>Apple | Category</title>
</head>

<body>

    <?php
    require_once './inc/header_inc.php';
    require_once './inc/shopnav_inc.php';
    ?>


    <?php

    if (isset($_GET['category'])) {
        $reqParam = $connect->query("SELECT * FROM product WHERE category = '$_GET[category]'");
        if ($reqParam->rowCount() <= 0) {
            header('location:index.php');
        }
    }

    if (isset($_GET['category'])) {

        $reqCat = $connect->query("SELECT * FROM product WHERE category = '$_GET[category]'");

    } else {

        if (isset($_GET['category']) && $_GET['sub_category']) {

        $reqSubCat = $connect->query("SELECT * FROM product WHERE sub_category = '$_GET[sub_category]'");

        }

     } ?>

    <?php if ($_GET['category']  == 'iPad') : ?>

        <div class="container hero-category d-flex flex-column m-auto justify-content-center p-5 ">
            <h2 class="text-center hero-h2">Which iPad is right for you?</h2>
            <div class="compare-grid d-flex justify-content-around w-80">
                <div class="ipad-grid d-flex flex-column align-items-center text-center">
                    <img src="./img/compare_ipad_pro__erf9x8mw04sy_large.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                    <img src="./img/compare_ipad_pro_swatches__bxn5nqwduk9y_large.png" class="swatches figure-img img-fluid" alt="">
                    <h3 class="h3-compare">iPad Pro</h3>
                    <p class="compare-tagline">The ultimate iPad experience with the most advanced technology.</p>
                    <p class="compare-price">From 1069 €</p>
                </div>
                <div class="ipad-grid d-flex flex-column align-items-center text-center">
                    <img src="./img/compare_ipad_air__bxjv33pk6nte_large.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                    <img src="./img/compare_ipad_air_swatches__dagugd9h3nsm_large.png" class="swatches figure-img img-fluid" alt="">
                    <h3 class="h3-compare">iPad Air</h3>
                    <p class="compare-tagline">Serious performance in a thin and light design.</p>
                    <p class="compare-price">From 789 €</p>
                </div>
                <div class="ipad-grid d-flex flex-column align-items-center text-center">
                    <img src="./img/compare_ipad_10_9__f7p2wja0gwuy_large.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                    <img src="./img/compare_ipad_10_9_swatches__lgggwl9kex2m_large.png" class="swatches figure-img img-fluid" alt="">
                    <h3 class="h3-compare">iPad<br><span>10th generation</span></h3>
                    <p class="compare-tagline">The all-new colorful iPad for the things you do every day.</p>
                    <p class="compare-price">From 589 €</p>
                </div>
                <div class="ipad-grid d-flex flex-column align-items-center text-center">
                    <img src="./img/compare_ipad_10_2__fwgwy7jydtea_large.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                    <img src="./img/compare_ipad_10_2_swatches__b77m5o9rqjhy_large.png" class="swatches figure-img img-fluid" alt="">
                    <h3 class="h3-compare">iPad<br><span>9th generation</span></h3>
                    <p class="compare-tagline">All the essentials in the most affordable iPad.</p>
                    <p class="compare-price">From 439 €</p>
                </div>
                <div class="ipad-grid d-flex flex-column align-items-center text-center">
                    <img src="./img/compare_ipad_mini__czcsk9ukpeie_large.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                    <img src="./img/compare_ipad_mini_swatches__fdzgy88hh6ai_large.png" class="swatches figure-img img-fluid" alt="">
                    <h3 class="h3-compare">iPad mini</h3>
                    <p class="compare-tagline">All the essentials in the most affordable iPad.</p>
                    <p class="compare-price">From 659 €</p>
                </div>
            </div>
        </div>

        <div class="container category-container mt-3 mb-5 d-flex flex-wrap w-80 justify-content-around">


            <?php while ($row = $reqCat->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="card product-card mb-3" style="width: 18rem;">
                    <img src="<?php echo $row['picture']; ?>" class="card-img-top" alt="<?php echo $row['title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['title']; ?></h5>
                        <p class="card-text"><?php echo $row['sub_category']; ?></p>
                        <p class="card-text"><?php echo $row['color']; ?></p>
                        <p class="card-text"><?php echo $row['size']; ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo $row['price']; ?> €</li>
                    </ul>
                    <div class="card-body">
                        <a href="<?= URL ?>product.php?product=<?php echo $row['product_id']; ?>" class="card-link">View product</a>
                    </div>
                </div>

            <?php }
            ?>
        </div>
        <?php
        require_once './inc/footer_inc.php';
        ?>

    <?php elseif ($_GET['category'] == 'iPhone') : ?>

        <div class="container hero-category d-flex flex-column m-auto justify-content-center p-5 ">
            <h2 class="text-center hero-h2">Which iPhone is right for you?</h2>
            <div class="compare-grid d-flex justify-content-around w-80">
                <div class="iphone-grid d-flex flex-column align-items-center text-center">
                    <img src="./img/compare_iphone_14_pro.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                    <img src="./img/swatch_iphone_14_pro__c2bl98e0li4i_large_2x.png" class="swatches figure-img img-fluid" alt="">
                    <h3 class="h3-compare">iPhone 14 Pro</h3>
                    <p class="compare-tagline">The ultimate iPhone.</p>
                    <p class="compare-price">From 1329 €</p>
                </div>
                <div class="iphone-grid d-flex flex-column align-items-center text-center">
                    <img src="./img/compare_iphone_14.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                    <img src="./img/swatch_iphone_14__eatap63qk6wm_large_2x.png" class="swatches figure-img img-fluid" alt="">
                    <h3 class="h3-compare">iPhone 14</h3>
                    <p class="compare-tagline">A total powerhouse.</p>
                    <p class="compare-price">From 1019 €</p>
                </div>
                <div class="iphone-grid d-flex flex-column align-items-center text-center">
                    <img src="./img/compare_iphone_13.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                    <img src="./img/swatch_iphone_13.png" class="swatches figure-img img-fluid" alt="">
                    <h3 class="h3-compare">iPhone 13</h3>
                    <p class="compare-tagline">As amazing as ever.</p>
                    <p class="compare-price">From 809 €</p>
                </div>
                <div class="iphone-grid d-flex flex-column align-items-center text-center">
                    <img src="./img/compare_iphone_se.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                    <img src="./img/swatch_iphone_se__bygc73yqw22u_large_2x.png" class="swatches figure-img img-fluid" alt="">
                    <h3 class="h3-compare">iPhone SE</h3>
                    <p class="compare-tagline">Serious power. Serious value.</p>
                    <p class="compare-price">From 559 €</p>
                </div>
            </div>
        </div>

        <div class="container category-container mt-3 mb-5 d-flex flex-wrap w-80 justify-content-around">


            <?php while ($row = $reqCat->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="card product-card mb-3" style="width: 18rem;">
                    <img src="<?php echo $row['picture']; ?>" class="card-img-top" alt="<?php echo $row['title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['title']; ?></h5>
                        <p class="card-text"><?php echo $row['sub_category']; ?></p>
                        <p class="card-text"><?php echo $row['color']; ?></p>
                        <p class="card-text"><?php echo $row['size']; ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo $row['price']; ?> €</li>
                    </ul>
                    <div class="card-body">
                        <a href="<?= URL ?>product.php?product=<?php echo $row['product_id']; ?>" class="card-link">View product</a>
                    </div>
                </div>

            <?php }
            ?>
        </div>
        <?php
        require_once './inc/footer_inc.php';
        ?>

    <?php elseif ($_GET['category'] == 'Watch') : ?>

        <div class="container hero-category d-flex flex-column m-auto justify-content-center p-5 ">
            <h2 class="text-center hero-h2">Which Apple Watch is right for you?</h2>
            <div class="compare-grid d-flex justify-content-around w-80">
                <div class="watch-grid d-flex flex-column align-items-center text-center">
                    <img src="./img/compare_s8.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                    <img src="./img/swatches-watch.png" class="swatches figure-img img-fluid" alt="">
                    <h3 class="h3-compare">Apple Watch Series 8</h3>
                    <p class="compare-price">From 499 €</p>
                </div>
                <div class="watch-grid d-flex flex-column align-items-center text-center">
                    <img src="./img/compare_se.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                    <img src="./img/swatches-watch-se.png" class="swatches figure-img img-fluid" alt="">
                    <h3 class="h3-compare">Apple Watch SE</h3>
                    <p class="compare-price">From 299 €</p>
                </div>
                <div class="watch-grid d-flex flex-column align-items-center text-center">
                    <img src="./img/compare_ultra.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                    <img src="./img/swatches-ultra.png" class="swatches figure-img img-fluid" alt="">
                    <h3 class="h3-compare">Apple Watch Ultra</h3>
                    <p class="compare-tagline">As amazing as ever.</p>
                    <p class="compare-price">999 €</p>
                </div>
            </div>
        </div>

        <div class="container category-container mt-3 mb-5 d-flex flex-wrap w-80 justify-content-around">


            <?php while ($row = $reqCat->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="card product-card mb-3" style="width: 18rem;">
                    <img src="<?php echo $row['picture']; ?>" class="card-img-top" alt="<?php echo $row['title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['title']; ?></h5>
                        <p class="card-text"><?php echo $row['sub_category']; ?></p>
                        <p class="card-text"><?php echo $row['color']; ?></p>
                        <p class="card-text"><?php echo $row['size']; ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo $row['price']; ?> €</li>
                    </ul>
                    <div class="card-body">
                        <a href="<?= URL ?>product.php?product=<?php echo $row['product_id']; ?>" class="card-link">View product</a>
                    </div>
                </div>

            <?php }
            ?>
        </div>
        <?php
        require_once './inc/footer_inc.php';
        ?>


    <?php elseif ($_GET['category'] == 'Mac') : ?>

        <div class="container hero-category d-flex flex-column m-auto justify-content-center p-5 ">
            <h2 class="text-center hero-h2">Which Mac is right for you?</h2>

            <div class="accordion accordion-flush" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Notebook
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="compare-grid d-flex justify-content-around w-80">
                                <div class="mac-grid d-flex flex-column align-items-center text-center">
                                    <img src="./img/compare_mba.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                                    <img src="./img/compare_swatches_mba.png" class="swatches figure-img img-fluid" alt="">
                                    <h3 class="h3-compare">MacBook Air</h3>
                                    <p class="compare-tagline">M1 Chip</p>
                                    <p class="compare-price">From 1199 €</p>
                                </div>
                                <div class="mac-grid d-flex flex-column align-items-center text-center">
                                    <img src="./img/compare_mbam2.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                                    <img src="./img/compare_swatches_mbam2.png" class="swatches figure-img img-fluid" alt="">
                                    <h3 class="h3-compare">MacBook Air</h3>
                                    <p class="compare-tagline">M2 Chip</p>
                                    <p class="compare-price">From 1499 €</p>
                                </div>
                                <div class="mac-grid d-flex flex-column align-items-center text-center">
                                    <img src="./img/compare_mbp13.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                                    <img src="./img/compare_swatches_mbp13.png" class="swatches figure-img img-fluid" alt="">
                                    <h3 class="h3-compare">MacBook Pro 13”</h3>
                                    <p class="compare-price">From 1599 €</p>
                                </div>
                                <div class="mac-grid d-flex flex-column align-items-center text-center">
                                    <img src="./img/compare_mbp14_and_16.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                                    <img src="./img/compare_swatches_mbp14-16.png" class="swatches figure-img img-fluid" alt="">
                                    <h3 class="h3-compare">MacBook Pro 14” and 16”</h3>
                                    <p class="compare-price">From 2249 €</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Desktop
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="compare-grid d-flex justify-content-around w-80">
                                <div class="mac-grid d-flex flex-column align-items-center text-center">
                                    <img src="./img/compare_imac24.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                                    <img src="./img/compare_swatches_imac24.png" class="swatches figure-img img-fluid" alt="">
                                    <h3 class="h3-compare">iMac 24”</h3>
                                    <p class="compare-price">From 1449 €</p>
                                </div>
                                <div class="mac-grid d-flex flex-column align-items-center text-center">
                                    <img src="./img/compare_macmini.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                                    <img src="./img/compare_swatches_mac_mini.png" class="swatches figure-img img-fluid" alt="">
                                    <h3 class="h3-compare">Mac mini</h3>
                                    <p class="compare-price">From 799 €</p>
                                </div>
                                <div class="mac-grid d-flex flex-column align-items-center text-center">
                                    <img src="./img/compare_macstudio.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                                    <img src="./img/compare_swatches_mac_studio.png" class="swatches figure-img img-fluid" alt="">
                                    <h3 class="h3-compare">Mac Studio</h3>
                                    <p class="compare-price">From 2299 €</p>
                                </div>
                                <div class="mac-grid d-flex flex-column align-items-center text-center">
                                    <img src="./img/compare_macpro.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                                    <img src="./img/compare_swatches_mac_pro.png" class="swatches figure-img img-fluid" alt="">
                                    <h3 class="h3-compare">Mac Pro</h3>
                                    <p class="compare-price">From 6499 €</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container category-container mt-3 mb-5 d-flex flex-wrap w-80 justify-content-around">


            <?php while ($row = $reqCat->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="card product-card mb-3" style="width: 18rem;">
                    <img src="<?php echo $row['picture']; ?>" class="card-img-top" alt="<?php echo $row['title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['title']; ?></h5>
                        <p class="card-text"><?php echo $row['sub_category']; ?></p>
                        <p class="card-text"><?php echo $row['color']; ?></p>
                        <p class="card-text"><?php echo $row['size']; ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo $row['price']; ?> €</li>
                    </ul>
                    <div class="card-body">
                        <a href="<?= URL ?>product.php?product=<?php echo $row['product_id']; ?>" class="card-link">View product</a>
                    </div>
                </div>

            <?php }
            ?>
        </div>
        <?php
        require_once './inc/footer_inc.php';
        ?>

    <?php elseif ($_GET['category'] == 'AirPods') : ?>

        <div class="container hero-category d-flex flex-column m-auto justify-content-center p-5 ">
            <h2 class="text-center hero-h2">Which AirPods are right for you?</h2>
            <div class="compare-grid d-flex justify-content-around w-80">
                <div class="airpods-grid d-flex flex-column align-items-center text-center">
                    <img src="./img/compare_airpods_2nd_gen.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                    <h3 class="h3-compare">AirPods</h3>
                    <p class="compare-tagline">2nd generation</p>
                    <p class="compare-price">From 159 €</p>
                </div>
                <div class="airpods-grid d-flex flex-column align-items-center text-center">
                    <img src="./img/compare_airpods_3rd_gen.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                    <h3 class="h3-compare">AirPods</h3>
                    <p class="compare-tagline">3rd generation</p>
                    <p class="compare-price">From 209 €</p>
                </div>
                <div class="airpods-grid d-flex flex-column align-items-center text-center">
                    <img src="./img/compare_airpods_pro.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                    <h3 class="h3-compare">AirPods Pro</h3>
                    <p class="compare-tagline">2nd generation</p>
                    <p class="compare-price">299 €</p>
                </div>
                <div class="airpods-grid d-flex flex-column align-items-center text-center">
                    <img src="./img/compare_airpods_max.png" class="ipad-pro-fig figure-img img-fluid" alt="">
                    <h3 class="h3-compare">AirPods Max</h3>
                    <p class="compare-price">629 €</p>
                </div>
            </div>
        </div>

        <div class="container category-container mt-3 mb-5 d-flex flex-wrap w-80 justify-content-around">


            <?php while ($row = $reqCat->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="card product-card mb-3" style="width: 18rem;">
                    <img src="<?php echo $row['picture']; ?>" class="card-img-top" alt="<?php echo $row['title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['title']; ?></h5>
                        <p class="card-text"><?php echo $row['sub_category']; ?></p>
                        <p class="card-text"><?php echo $row['color']; ?></p>
                        <p class="card-text"><?php echo $row['size']; ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo $row['price']; ?> €</li>
                    </ul>
                    <div class="card-body">
                        <a href="<?= URL ?>product.php?product=<?php echo $row['product_id']; ?>" class="card-link">View product</a>
                    </div>
                </div>

            <?php }
            ?>
        </div>
        <?php
        require_once './inc/footer_inc.php';
        ?>

    <?php elseif ($_GET['category'] == 'TV/Home') : ?>

        <div class="container-fluid tv-home-container d-flex flex-column align-items-center">
            <img src="./img/hero_tv.png" alt="" class="img-fluid" >
            <img src="./img/hero_homepod_appletv.png" alt="" class="img-fluid hero-homepode-tv4k">
            <h1 class="tv-home-h1 text-center">The future hits home.</h1>
            <p class="text-center tv-home-p">Simply connect your favorite devices and transform your house into a remarkably smart, convenient, and entertaining home. Control lights, locks, and thermostats with your iPhone — or just your voice. Play any song, in any room, from anywhere. And elevate movie night with theater-like picture and sound. All with the security and privacy of Apple.</p>
        </div>

        <div class="container tv-big-cards d-flex justify-content-around">
            <div class="col-6 big-card mx-4 d-flex flex-column align-items-center">
                <p class="homepod-p">HomePod mini</p>
                <h3 class="text-center tv-homepod-h3">Room-filling sound in every room.</h3>
                <p>99 €</p>
                <img src="./img/homepod-big-card.png" class="img-fluid" alt="">
            </div>
            <div class="col-6 big-card mx-4 d-flex flex-column align-items-center">
                <img src="./img/apple_tv_4k_logo.png" class="img-fluid tv4k-logo" alt="">
                <h3 class="text-center tv-homepod-h3">The Apple experience. Cinematic in every sense.</h3>
                <p>Starting at 169 €</p>
                <img src="./img/tv4k-big-card.png" class="img-fluid" alt="">
            </div>
        </div>


        <div class="container category-container mt-3 mb-5 d-flex flex-wrap w-80 justify-content-around">


            <?php while ($row = $reqCat->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="card product-card mb-3" style="width: 18rem;">
                    <img src="<?php echo $row['picture']; ?>" class="card-img-top" alt="<?php echo $row['title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['title']; ?></h5>
                        <p class="card-text"><?php echo $row['sub_category']; ?></p>
                        <p class="card-text"><?php echo $row['color']; ?></p>
                        <p class="card-text"><?php echo $row['size']; ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo $row['price']; ?> €</li>
                    </ul>
                    <div class="card-body">
                        <a href="<?= URL ?>product.php?product=<?php echo $row['product_id']; ?>" class="card-link">View product</a>
                    </div>
                </div>

            <?php }
            ?>
        </div>
        <?php
        require_once './inc/footer_inc.php';
        ?>

    <?php endif ?>