<?php require_once 'init.php'; ?>


<div class="container mt-3">
    <header>
        <div class="container d-flex justify-content-center mt-3">
            <a class="btn btn-outline-dark" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                Access the dashboard
            </a>
            <div class="offcanvas admin-offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel"> Shop Project Dashboard</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div>
                        On this space, you can manage products, members and orders
                    </div>
                    <div class="dropdown mt-3">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Dashboard Menu
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= URL ?>admin/product_management.php">Product management</a></li>
                            <li><a class="dropdown-item" href="<?= URL ?>admin/member_management.php">Member management</a></li>
                            <li><a class="dropdown-item" href="<?= URL ?>admin/order_management.php">Order management</a></li>
                            <li><a class="dropdown-item" href="<?= URL ?>index.php">Back to Home</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>