<?php

require_once '../inc/init.php';
require_once '../inc/admin_head_inc.php';
// var_dump($connect);

?>
<title>Shop Project Admin | Product Management</title>
</head>

<body>

    <!-- TRAITEMENT -->

    <?php

    $error = '';

    ?>

    <h1 class="text-center text-muted mt-3 admin-h1">Dashboard | Orders Management</h1>
    <p class="text-center text-muted mt-3 mb-3">Click the button to select a section</p>

    <?php
    require_once '../inc/admin_header_inc.php';

    if (!userIsAdmin()) {

        header('location:../index.php');
    }

    $viewOrder = $connect->query("SELECT * FROM shop_order LIMIT 0, 10");

    $orders = $viewOrder->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <div class="container mt-3 mb-3">
        <?= $alert; ?>
    </div>
    <hr>
    <div class="container mt-3">


        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">State</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) { ?>
                    <tr>
                        <th scope="row" class="align-middle"><?php echo $order['order_id']; ?></th>
                        <td class="align-middle"><?php echo $order['state']; ?></td>
                        <td class="align-middle"><?php echo $order['amount']; ?> €</td>
                        <td class="align-middle"><?php echo $order['registration_date']; ?></td>
                        <td class="align-middle"><a href=""><i class="bi bi-search"></i></a></td>
                        <td class="align-middle"><a href="?action=edit&order_id=<?php echo $order['order_id']; ?>"><i class="bi bi-pencil-fill text-warning"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>











        <?php
        require_once '../inc/admin_footer_inc.php';
        ?>