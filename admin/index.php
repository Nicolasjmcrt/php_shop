<?php
require_once '../inc/admin_head_inc.php';

?>
<title>Shop Project Admin | Dashboard</title>
</head>

<body>
    <h1 class="text-center text-muted mt-3 admin-h1">Welcome on your online store Dashboard</h1>
    <p class="text-center text-muted mt-3">Click the button to select a section</p>
    <?php
    require_once '../inc/admin_header_inc.php';

    if(!userIsAdmin()) {

        header ('location:../index.php');
    }
    ?>
    <?php
    require_once '../inc/admin_footer_inc.php';
    ?>