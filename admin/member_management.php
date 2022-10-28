<?php
require_once '../inc/init.php';
require_once '../inc/admin_head_inc.php';
// var_dump($connect);

?>
<title>Apple Admin | Member Management</title>
</head>

<body>

    <!-- TRAITEMENT -->

    <?php

    $error = '';

    if ($_POST) {

        foreach ($_POST as $key => $val) {
            $_POST[$key] = htmlspecialchars(addslashes($val));
        }

        $status = $_POST['status'];

        if (isset($_GET['action']) && $_GET['action'] == 'edit') {

            $connect->query("UPDATE member SET status = '$status' WHERE member_id = '$_GET[member_id]'");

            $error .= '<div class="alert alert-dismissible fade show alert-success" role="alert">
            The member status has been edited!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

            header('location:member_management.php');
        } else {

            if (empty($status)) {
                $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            You must select a status!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
        }

        $alert .= $error;
    }
    ?>

    <h1 class="text-center text-muted mt-3 admin-h1">Dashboard | Member Management</h1>
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

        <?php

        $viewReq = $connect->query("SELECT * FROM member ORDER BY status DESC");


        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            $edit = $connect->query("DELETE FROM member WHERE member_id = '$_GET[member_id]'");

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
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Member Id</th>
                    <th scope="col">Pseudo</th>
                    <th scope="col">Last name</th>
                    <th scope="col">First name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Address</th>
                    <th scope="col">Area Code</th>
                    <th scope="col">City</th>
                    <th scope="col">Status</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($lines = $viewReq->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <th scope="row" class="align-middle"><?php echo $lines['member_id']; ?></th>
                        <td class="align-middle"><?php echo $lines['pseudo']; ?></td>
                        <td class="align-middle"><?php echo $lines['lastname']; ?></td>
                        <td class="align-middle"><?php echo $lines['firstname']; ?></td>
                        <td class="align-middle"><?php echo $lines['email']; ?></td>
                        <td class="align-middle"><?php echo $lines['gender']; ?></td>
                        <td class="text-truncate align-middle" style="max-width: 200px;"><?php echo $lines['address']; ?></td>
                        <td class="align-middle"><?php echo $lines['area_code']; ?></td>
                        <td class="align-middle"><?php echo $lines['city']; ?></td>
                        <td class="align-middle"><?php echo $lines['status']; ?></td>
                        <td class="align-middle"><a href="<?= URL ?>admin/member.php?member=<?php echo $lines['member_id']; ?>"><i class="bi bi-search text-success"></i></a></td>
                        <td class="align-middle"><a href="?action=edit&member_id=<?php echo $lines['member_id']; ?>"><i class="bi bi-pencil-fill text-warning"></i></a></td>
                        <td class="align-middle"><a href="?action=delete&member_id=<?php echo $lines['member_id']; ?>"><i class="bi bi-trash-fill text-danger"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php if (isset($_GET['action']) && $_GET['action'] == 'edit') : ?>
        <div class="container member-container mt-3 w-50">
            <form action="" method="POST">
                <fieldset disabled>
                    <div class="mb-3">
                        <label for="member_id" class="form-label">Member ID</label>
                        <input type="text" class="form-control" name="member_id" id="member_id" value="<?= $mId ?>">
                    </div>
                    <div class="mb-3">
                        <label for="pseudo" class="form-label">Pseudo</label>
                        <input type="text" class="form-control" name="pseudo" id="pseudo" value="<?= $pseu ?>">
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" value="<?= $laN ?>">
                    </div>
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" value="<?= $fiN ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?= $ema ?>">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender" id="gender" aria-label="Gender">
                            <option selected>Select your gender</option>
                            <option value="m" <?php if (isset($gen)) {
                                                    echo 'selected';
                                                } ?>>Male</option>
                            <option value="f" <?php if (isset($gen)) {
                                                    echo 'selected';
                                                } ?>>Female</option>
                            <option value="mixed" <?php if (isset($gen)) {
                                                        echo 'selected';
                                                    } ?>>Mixed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="<?= $add ?>">
                    </div>
                    <div class="mb-3">
                        <label for="area_code" class="form-label">Area Code</label>
                        <input type="text" class="form-control" name="area_code" id="area_code" value="<?= $arC ?>">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" name="city" id="city" value="<?= $cit ?>">
                    </div>
                </fieldset>
                <div class="mb-3">
                    <label for="status" class="form-label"><strong>Status</strong></label>
                    <select id="status" name="status" class="form-select" aria-label="Default select example">
                        <option selected>Select the status</option>
                        <option value="0" <?php if (isset($stat)) {
                                                echo 'selected';
                                            } ?>>Classic Member</option>
                        <option value="1" <?php if (isset($stat)) {
                                                echo 'selected';
                                            } ?>>Administrator</option>
                        <option value="2" <?php if (isset($stat)) {
                                                echo 'selected';
                                            } ?>>Deactivated account</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-success btn-lg col-4">Edit</button>
                </fieldset>
            </form>
        </div>
    <?php endif; ?>













    <?php
    require_once '../inc/admin_footer_inc.php';
    ?>