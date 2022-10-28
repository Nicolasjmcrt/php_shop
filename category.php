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
    } ?>

    <div class="container category-container mt-3 mb-5 d-flex flex-wrap w-80 justify-content-around">


        <?php while ($row = $reqCat->fetch(PDO::FETCH_ASSOC)) { ?>

            <div class="card product-card mb-3" style="width: 18rem;">
                <img src="<?php echo $row['picture']; ?>" class="card-img-top" alt="<?php echo $row['title']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['title']; ?></h5>
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