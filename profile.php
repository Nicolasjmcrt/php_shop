<?php
require_once './inc/init.php';
require_once './inc/head_inc.php';
// var_dump($connect);

if (!userConnected()) {
    header('location:authentication.php');
    exit();
}

if (userIsAdmin()) {
    $alert .= '<div class="alert alert-info" role="alert">
    Hello Administrator !
     </div>';
}

?>
<title>Apple | Member profile</title>
</head>


<body>


    <!-- TRAITEMENT -->
    <?php
    require_once './inc/header_inc.php';
    ?>

    <h1 class="text-center text-muted mt-3">Member profile</h1>
    <div class="container d-flex justify-content-center mt-3">
    <?= $alert; ?>
    </div>
    <div class="container d-flex justify-content-center mt-3">
        
        <div class="card" style="width: 40rem;">
            <div class="card-body">
                <h5 class="card-title">Pseudo : <?php echo $_SESSION['member']['pseudo']; ?></h5>
                <p class="card-text">Last name : <?php echo $_SESSION['member']['lastname']; ?></p>
                <p class="card-text">First name : <?php echo $_SESSION['member']['firstname']; ?></p>
                <p class="card-text">E-mail : <?php echo $_SESSION['member']['email']; ?></p>
                <p class="card-text">Gender : <?php echo $_SESSION['member']['gender']; ?></p>
                <p class="card-text">Address : <?php echo $_SESSION['member']['address']; ?></p>
                <p class="card-text">Area code : <?php echo $_SESSION['member']['area_code']; ?></p>
                <p class="card-text">City : <?php echo $_SESSION['member']['city']; ?></p>
            </div>
        </div>
    </div>

    <?php
    require_once './inc/footer_inc.php';
    ?>