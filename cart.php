<?php
require_once './inc/head_inc.php';

?>
<title>Apple | Cart</title>
</head>

<body>

    <?php
    require_once './inc/header_inc.php';
    require_once './inc/shopnav_inc.php';
    ?>


    <?php

    if (isset($_POST['addCart'])) {

        $req = $connect->query("SELECT * FROM product WHERE product_id = $_POST[product_id]");
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $prodId = $_POST['product_id'];
        $prodTitle = $data['title'];
        $prodColor = $data['color'];
        $prodPrice = $data['price'];
        $formStk = $_POST['stock'];

        updateCart($prodId, $formStk, $prodTitle, $prodColor, $prodPrice);

        // var_dump($_SESSION['cart']);

    }

    if (isset($_POST['cartValid'])) {

        for ($i = 0; $i < count($_SESSION['cart']['product_id']); $i++) {

            $id = $_SESSION['cart']['product_id'][$i];

     

            $req = $connect->query("SELECT * FROM product WHERE product_id = $id");

            $product = $req->fetch(PDO::FETCH_ASSOC);

 

            if ($product['stock'] < $_SESSION['cart']['stock'][$i]) {

                if ($product['stock'] > 0) {

                    $_SESSION['cart']['stock'][$i] = $product['stock'];
                } else {

                    $error .= '<p class="text-danger text-center">The requested product is no longer available!</p>';
                    deleteProductInCart($id);
                    $i--; // Je refais un tour du panier afin de m'assurer que tout est ok avant la validation

                }
                
                $check  = true;
                
            }
        }
  
        if (!isset($check)) {
            $member = $_SESSION['member']['member_id'];
            $connect->query("INSERT INTO shop_order (member_id, amount, registration_date, state) VALUES('$member','".totalAmount()."',NOW(), 'being processed')");

            $orderId = $connect->lastInsertId();

            for ($i=0; $i < count($_SESSION['cart']['product_id']); $i++) { 
               
                $connect->query("INSERT INTO order_details(order_id,product_id,quantity,price) VALUES('$orderId','".$_SESSION['cart']['product_id'][$i]."','".$_SESSION['cart']['stock'][$i]."','".$_SESSION['cart']['price'][$i]."')");

                // Mettre à jour la bdd


                $connect->query("UPDATE product SET stock = stock - '".$_SESSION['cart']['stock'][$i]."' WHERE product_id = '".$_SESSION['cart']['product_id'][$i]."' ");
            }

            unset($_SESSION['cart']);
        }

       
    }
    ?>

    <div class="container cart-container mt-3 mb-3">
        <h2 class="pb-3 text-center">Review your bag.</h2>
        <p class="text-center">Free delivery and free returns.</p>
        <hr>
        <table class="table table-striped align-middle table-hover">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Product Id</th>
                    <th scope="col">Product</th>
                    <th scope="col">Color</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sub-total</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (empty($_SESSION['cart']['product_id'])) {
                    $error .= '<tr class="align-middle"><td colspan="6" class="text-center display-6">Your basket is empty.</td></tr>';
                    $alert .= $error;
                    echo $alert;
                } else {
                    
                    for ($line = 0; $line < count($_SESSION['cart']['product_id']); $line++) {
                        $subTotal = $_SESSION['cart']['price'][$line] * $_SESSION['cart']['stock'][$line];
                ?>
                        <tr>
                            <td class="align-middle"><?php echo $_SESSION['cart']['product_id'][$line]; ?></td>
                            <td class="align-middle"><a class="link-secondary" href="<?= URL ?>product.php?product=<?php echo $_SESSION['cart']['product_id'][$line]; ?>"><?php echo $_SESSION['cart']['title'][$line]; ?></a></td>
                            <td class="align-middle"><?php echo $_SESSION['cart']['color'][$line]; ?></td>
                            <td class="align-middle"><?php echo $_SESSION['cart']['stock'][$line]; ?></td>
                            <td class="align-middle"><?php echo $_SESSION['cart']['price'][$line]; ?>,00 €</td>
                            <td class="align-middle"><?php echo $subTotal ?>,00 €</td>
                        </tr>
                    <?php 
                    }
                    ?>
            <tfoot>
                <tr class="table-dark">
                    <td class="align-middle"><strong>Total</strong></td>
                    <td class="align-middle"></td>
                    <td class="align-middle"></td>
                    <td class="align-middle"></td>
                    <td class="align-middle"></td>
                    <td class="align-middle"><strong><?= totalAmount() ?>,00 €</strong></td>
                </tr>
            </tfoot>
        </table>
        <?php if (!userConnected()) {

                        $error2 .= '<div class="alert alert-light text-center role="alert">Please <span class="fw-bold text-decoration-none"><a href="authentication.php">sign in</a></span> or <span class="fw-bold"><a href="registration.php">register</a></span> to place your order</div>';
                    } else { ?>
            <div class="row d-flex justify-content-end">
                <form action="" method="POST" class="d-flex justify-content-end">
                    <input type="submit" name="cartValid" value="Check out" class="btn btn-primary btn-lg">
                </form>
            </div>
    </div>
<?php }
                    $alert2 .= $error2;
                } ?>

<?= $alert2 ?>



<?php
require_once './inc/footer_inc.php';
?>