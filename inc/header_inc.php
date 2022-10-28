<?php require_once 'init.php'; ?>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= URL?>index.php"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL?>index.php">Home</a>
                    </li>

                    <?php if (userIsAdmin()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL?>admin/index.php">Dashboard</a>
                        </li>
                    <?php endif ?>

                    <?php if(userConnected()) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL?>profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL?>shop.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL?>cart.php">Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL?>authentication.php?action=logout">Logout</a>
                        </li>
                        
                    <?php else : ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL?>registration.php">Sign up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL?>authentication.php">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL?>shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL?>cart.php">Cart</a>
                    </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
</header>