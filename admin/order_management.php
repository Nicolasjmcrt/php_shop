<?php

require_once '../inc/init.php';
require_once '../inc/admin_head_inc.php';
// var_dump($connect);

?>
<title>Shop Project Admin | Order Management</title>
</head>

<body>

    <!-- TRAITEMENT -->

    <?php

    $error = '';

    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $currentPage = (int) strip_tags($_GET['page']);
    } else {
        $currentPage = 1;
    }

    $sql = 'SELECT COUNT(*) AS nb_orders FROM `shop_order`;';

    $query = $connect->prepare($sql);

    $query->execute();

    $result = $query->fetch();

    $nbOrders = (int) $result['nb_orders'];

    $perPage = 10;

    $pages = ceil($nbOrders / $perPage);

    $premier = ($currentPage * $perPage) - $perPage;

    $viewOrder = $connect->query("SELECT * FROM shop_order ORDER BY order_id DESC LIMIT $premier, $perPage");

    // $viewOrder->bindValue(':premier', $premier, PDO::PARAM_INT);
    // $viewOrder->bindValue(':perPage', $perPage, PDO::PARAM_INT);

    $orders = $viewOrder->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <h1 class="text-center text-muted mt-3 admin-h1">Dashboard | Orders Management</h1>
    <p class="text-center text-muted mt-3 mb-3">Click the button to select a section</p>

    <?php
    require_once '../inc/admin_header_inc.php';

    if (!userIsAdmin()) {

        header('location:../index.php');
    }



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
        <nav>
            <ul class="pagination justify-content-center">
                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                    <a href="<?= ORDER ?>?page=<?= $currentPage - 1 ?>" class="page-link">Previous</a>
                </li>
                <?php for ($page = 1; $page <= $pages; $page++) : ?>
                    <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <a href="<?= ORDER ?>?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                    </li>
                <?php endfor ?>
                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                    <a href="<?= ORDER ?>?page=<?= $currentPage + 1 ?>" class="page-link">Next</a>
                </li>
            </ul>
        </nav>











        <?php
        require_once '../inc/admin_footer_inc.php';
        ?>