<?php
require_once '../inc/init.php';
require_once '../inc/admin_head_inc.php';
// var_dump($connect);

?>
<title>Apple Admin | Member Orders</title>
</head>

<body>

    <!-- TRAITEMENT -->

    <?php

    $error = '';

    if (isset($_GET['member'])) {

        $orderReq = $connect->query("SELECT member.member_id, shop_order.*, order_details.*, product.* FROM member INNER JOIN shop_order ON member.member_id = shop_order.member_id INNER JOIN order_details ON shop_order.order_id = order_details.order_id INNER JOIN product ON product.product_id = order_details.product_id WHERE member.member_id = '$_GET[member]'");
    }

    ?>

    <h1 class="text-center text-muted mt-3 admin-h1">Dashboard | Member orders Management</h1>
    <p class="text-center text-muted mt-3 mb-3">Click the button to select a section</p>

    <?php



    require_once '../inc/admin_header_inc.php';

    ?>
    <div class="container mt-3 mb-3">
        <?= $alert; ?>
    </div>
    <hr>
    <div class="container mt-3">



        <?php while ($row = $orderReq->fetch(PDO::FETCH_ASSOC)) { ?>


            <p>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                    <?php echo $row['order_id']; ?>
                </button>
            </p>
           



            <h2><?php echo $row['order_id']; ?></h2>
            <p><?php echo $row['amount']; ?></p>
            <p><?php echo $row['registration_date']; ?></p>
            <p><?php echo $row['state']; ?></p>
            <p><?php echo $row['product_id']; ?></p>
            <p><?php echo $row['quantity']; ?></p>
            <p><?php echo $row['price']; ?></p>
            <img src="<?php echo $row['picture']; ?>" alt="">

        <?php } ?>

    </div>






    <?php
    require_once '../inc/admin_footer_inc.php';
    ?>