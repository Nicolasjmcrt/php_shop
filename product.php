<?php
require_once './inc/head_inc.php';


?>
<title>Apple | Product</title>
</head>

<body>

    <?php
    require_once './inc/header_inc.php';
    require_once './inc/shopnav_inc.php';

    $error = '';
    ?>

    <?php


    if (isset($_GET['product'])) {
        $reqParam = $connect->query("SELECT * FROM product WHERE product_id = '$_GET[product]'");
        if ($reqParam->rowCount() <= 0) {
            header('location:index.php');
        }
    }

    if (isset($_GET['product'])) {

        $reqProd = $connect->query("SELECT * FROM product WHERE product_id = '$_GET[product]'");
        $product = $reqProd->fetch(PDO::FETCH_ASSOC);
    }

    ?>

    <div class="container product-container mt-3 mb-5 d-flex justify-content-center w-70">
        <div class="row">
            <div class="col-6">
                <img class="img-fluid" style="max-width: 500px; min-width: 350px;" src="<?php echo $product['picture']; ?>" alt="<?php echo $product['title']; ?>">
            </div>
            <div class="col-6 d-flex flex-column justify-content-center">
                <h3><?php echo $product['title']; ?></h3>
                <p><?php echo $product['details']; ?></p>
                <p><?php echo $product['size']; ?></p>
                <p>Color : <?php echo $product['color']; ?></p>
                <p>Category : <?php echo $product['category']; ?></p>
                <p><strong><?php echo $product['price']; ?> €</strong></p>
                <div class="col-3">
                    <?php if ($product['stock'] > 0) : ?>
                        <form action="cart.php" method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                            <select class="form-select" name="stock" id="stock" aria-label="Get stock">
                                <?php
                                for ($i = 1; $i <= $product['stock']; $i++) {
                                ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <input type="submit" name="addCart" class="btn btn-primary" value="Add to bag"></input>
                    </form>
                   <?php  else : 
                    $error .= '<p class="text-danger">This product is currently out of stock!</p>';
                    $alert .= $error;
                    ?>
                    <?php endif ?>
                    <?= $alert ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once './inc/footer_inc.php';
    ?>