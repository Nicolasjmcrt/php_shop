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
    <div class="container mt-3 mb-5 d-flex flex-wrap justify-content-around">


        <?php while ($row = $orderReq->fetch(PDO::FETCH_ASSOC)) { ?>


            <div class="card m-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"> Order n° : <?php echo $row['order_id']; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Ordered : <?php echo $row['registration_date']; ?></h6>
                            <p class="card-text"><strong><?php echo $row['title']; ?></strong></p>
                            <p class="card-text">Quantity : <?php echo $row['quantity']; ?></p>
                            <p class="card-text">Price : <?php echo $row['price']; ?> €</p>
                            <p class="card-text"><strong>Total amount : <?php echo $row['amount']; ?> €</strong></p>
                            <p class="card-text">Order state : <?php echo $row['state']; ?></p>
                            <img src="<?php echo $row['picture']; ?>" alt="" style="max-width:150px;">
                </div>
            </div>
      
        <?php } ?>

    </div>

    <?php
    require_once '../inc/admin_footer_inc.php';
    ?>