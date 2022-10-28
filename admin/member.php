<?php
require_once '../inc/init.php';
require_once '../inc/admin_head_inc.php';
// var_dump($connect);

?>
<title>Shop Project Admin | Member Profile</title>
</head>

<body>

    <!-- TRAITEMENT -->

    <?php

    $error = '';



    ?>

    <h1 class="text-center text-muted mt-3 admin-h1">Dashboard | Member Profile</h1>
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

    <?php

    $memberReq = $connect->query("SELECT * FROM member WHERE member_id = '$_GET[member]'");

    $member = $memberReq->fetch(PDO::FETCH_ASSOC);

    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
        $delete = $connect->query("DELETE FROM member WHERE member_id = '$_GET[member_id]'");

        header('location:member_management.php');
    }

    if (isset($_GET['action']) && $_GET['action'] == 'edit') {
        $edit = $connect->query("SELECT * FROM member WHERE member_id = '$_GET[member_id]'");

        $data = $edit->fetch(PDO::FETCH_ASSOC);
    }

    $mId = (isset($data['member_id'])) ? $data['member_id'] : '';
    $pseu = (isset($data['pseudo'])) ? $data['pseudo'] : '';
    $laN = (isset($data['lastname'])) ? $data['lastname'] : '';
    $fiN = (isset($data['firstname'])) ? $data['firstname'] : '';
    $ema = (isset($data['email'])) ? $data['email'] : '';
    $gen = (isset($data['gen'])) ? $data['gen'] : '';
    $add = (isset($data['address'])) ? $data['address'] : '';
    $arC = (isset($data['area_code'])) ? $data['area_code'] : '';
    $cit = (isset($data['city'])) ? $data['city'] : '';
    $stat = (isset($data['status'])) ? $data['status'] : '';


    ?>

    <div class="container member-container mb-5 d-flex justify-content-center w-70">
        <div class="col-8 mb-5">
            <div class="card mt-4">
                <h5 class="card-header">Member Profile : <?php echo $member['pseudo']; ?></h5>
                <div class="card-body p-5">
                    <p class="card-text"><strong>Member ID : </strong> <?php echo $member['member_id']; ?></p>
                    <p class="card-text"><strong>Last Name : </strong> <?php echo $member['lastname']; ?></p>
                    <p class="card-text"><strong>First Name : </strong> <?php echo $member['firstname']; ?></p>
                    <p class="card-text"><strong>E-mail : </strong> <?php echo $member['email']; ?></p>
                    <p class="card-text"><strong>Gender : </strong> <?php echo $member['gender']; ?></p>
                    <p class="card-text"><strong>Address :</strong> <?php echo $member['address']; ?></p>
                    <p class="card-text"><strong>Area Code : </strong> <?php echo $member['area_code']; ?></p>
                    <p class="card-text"><strong>City : </strong> <?php echo $member['city']; ?></p>
                    <p class="card-text"><strong>Status : </strong> <?php echo $member['status']; ?></p>
                </div>
                <div class="row p-5">
                    <a href="<?= URL ?>/admin/member_order.php?member=<?php echo $member['member_id']; ?>" class="mb-3 btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg> View member orders
                    </a>

                    <a href="?action=delete&member_id=<?php echo $member['member_id']; ?>" class="mb-3 btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once '../inc/admin_footer_inc.php';
    ?>