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

    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $currentPage = (int) strip_tags($_GET['page']);
    } else {
        $currentPage = 1;
    }

    $sql = 'SELECT COUNT(*) AS nb_products FROM `product`;';

    $query = $connect->prepare($sql);

    $query->execute();

    $result = $query->fetch();

    $nbProducts = (int) $result['nb_products'];

    $perPage = 10;

    $pages = ceil($nbProducts / $perPage);

    $premier = ($currentPage * $perPage) - $perPage;

    $viewReq = $connect->prepare("SELECT * FROM product ORDER BY product_id DESC LIMIT :premier, :perPage");

    $viewReq->bindValue(':premier', $premier, PDO::PARAM_INT);
    $viewReq->bindValue(':perPage', $perPage, PDO::PARAM_INT);

    $viewReq->execute();

    $products = $viewReq->fetchAll(PDO::FETCH_ASSOC);



    if ($_POST) {

        foreach ($_POST as $key => $value) {
            $_POST[$key] = htmlspecialchars(addslashes($value));
        }

        if (isset($_GET['action']) && $_GET['action'] == 'edit') {

            $dbImg = $_POST['actual-picture'];
        }

        $reference = $_POST['reference'];
        $category = $_POST['category'];
        $subCategory = $_POST['sub_category'];
        $title = $_POST['title'];
        $details = $_POST['details'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $gender = $_POST['gender'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];

        $req = $connect->query("SELECT * FROM product WHERE reference = '$reference'");
        $state = $req->rowCount();







        // --------------------------AJOUT D'IMAGE--------------------------------


        if (!empty($_FILES['picture'])) {

            $picture = $_FILES['picture'];

            $imgName = time() . '_' . $reference . '_' . $picture['name'];

            $dbImg = URL . "img/$imgName";

            define("BASE", $_SERVER['DOCUMENT_ROOT'] . '/php_shop/');

            $imgFile = BASE . "img/$imgName";

            if ($picture['size'] <= 8000000) {

                $info = pathinfo($picture['name'], PATHINFO_EXTENSION);

                // $ext = $info['extension'];

                $tabExt = ['jpg', 'png', 'jpeg', 'gif', 'webp', 'JPG', 'PNG', 'JPEG', 'GIF', 'WEBP', 'Jpg', 'Png', 'Jpeg', 'Gif', 'Webp'];

                if (in_array($info, $tabExt)) {
                    copy($picture['tmp_name'], $imgFile);
                } else {
                    $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
                    Format not allowed !
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
            } else {
                $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
                Check your image size !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
        }

        // --------------------------VÉRIFICATION SI UPDATE OU INSERT INTO--------------------------------

        if (isset($_GET['action']) && $_GET['action'] == 'edit') {

            $connect->query("UPDATE product SET reference = '$reference',
                                                category = '$category',
                                                sub_category = '$subCategory',
                                                title = '$title',
                                                details = '$details',
                                                color = '$color',
                                                size = '$size',
                                                gender = '$gender',
                                                picture = '$dbImg',
                                                price = '$price',
                                                stock = '$stock' WHERE product_id = '$_GET[product_id]'");

            $error .= '<div class="alert alert-dismissible fade show alert-success" role="alert">
            The product has been edited!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

            header('location:product_management.php');
        } else {

            // --------------------------VÉRIFICATION DES INPUTS--------------------------------

            // Vérification si référence déjà existante
            if ($state >= 1) {
                $error = '<div class="alert alert-dismissible fade show alert-danger" role="alert">Product already exists!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }

            if (empty($category)) {
                $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            You must enter a category !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }

            if (empty($subCategory)) {
                $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            You must enter a sub-category !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }

            if (empty($title)) {
                $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            You must enter a title!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }

            if (empty($details)) {
                $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            You must enter some details for your product!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }

            if (empty($color)) {
                $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            You must enter a color!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }

            if (empty($size)) {
                $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            You must enter a size!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }

            if (empty($gender)) {
                $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            You must enter a gender!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }

            if (empty($_FILES['picture'])) {
                $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            You must enter a picture!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }

            if (empty($price)) {
                $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            You must enter a price!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }

            if (strlen($price) > 4) {
                $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            Price must not exceed 4 characters!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }

            if (empty($stock)) {
                $error .= '<div class="alert alert-dismissible fade show alert-danger" role="alert">
            You must enter a stock!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
            if (empty($error)) {
                $connect->query("INSERT INTO product(reference, category, sub_category, title, details, color, size, gender, picture, price, stock) VALUES('$reference', '$category', '$subCategory','$title', '$details', '$color', '$size', '$gender', '$dbImg', '$price','$stock')");


                $error .= '<div class="alert alert-dismissible fade show alert-success" role="alert">
                The product has been registered!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

                header('location:product_management.php');

                
            }
        }




        $alert .= $error;
    }

    ?>

    <h1 class="text-center text-muted mt-3 admin-h1">Dashboard | Product Management</h1>
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
    <div class="container-fluid mt-3">

        <?php


        // $error .= '<h2 class="text-center display-4">Liste des '. $viewReq->rowCount() . ' produits de la boutique</h2>';

        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            $connect->query("DELETE FROM product WHERE product_id = '$_GET[product_id]'");

            header('location:product_management.php');
        }

        if (isset($_GET['action']) && $_GET['action'] == 'edit') {
            $edit = $connect->query("SELECT * FROM product WHERE product_id = '$_GET[product_id]'");

            $data = $edit->fetch(PDO::FETCH_ASSOC);
        }

        $pId = (isset($data['product_id'])) ? $data['product_id'] : '';
        $ref = (isset($data['reference'])) ? $data['reference'] : '';
        $cat = (isset($data['category'])) ? $data['category'] : '';
        $sub = (isset($data['sub_category'])) ? $data['sub_category'] : '';
        $tit = (isset($data['title'])) ? $data['title'] : '';
        $des = (isset($data['details'])) ? $data['details'] : '';
        $col = (isset($data['color'])) ? $data['color'] : '';
        $siz = (isset($data['size'])) ? $data['size'] : '';
        $gnr = (isset($data['gender'])) ? $data['gender'] : '';
        $pic = (isset($data['picture'])) ? $data['picture'] : '';
        $pri = (isset($data['price'])) ? $data['price'] : '';
        $stk = (isset($data['stock'])) ? $data['stock'] : '';

        ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Product Id</th>
                    <th scope="col">Reference</th>
                    <th scope="col">Category</th>
                    <th scope="col">Sub-category</th>
                    <th scope="col">Title</th>
                    <th scope="col">Details</th>
                    <th scope="col">Color</th>
                    <th scope="col">Size</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) { ?>
                    <tr>
                        <th scope="row" class="align-middle"><?php echo $product['product_id']; ?></th>
                        <td class="align-middle"><?php echo $product['reference']; ?></td>
                        <td class="align-middle"><?php echo $product['category']; ?></td>
                        <td class="align-middle"><?php echo $product['sub_category']; ?></td>
                        <td class="align-middle"><?php echo $product['title']; ?></td>
                        <td class="text-truncate align-middle" style="max-width: 250px;"><?php echo $product['details']; ?></td>
                        <td class="align-middle"><?php echo $product['color']; ?></td>
                        <td class="align-middle"><?php echo $product['size']; ?></td>
                        <td class="align-middle"><?php echo $product['gender']; ?></td>
                        <td class="align-middle"><img src="<?php echo $product['picture']; ?>" style="width:100px;"></td>
                        <td class="align-middle"><?php echo $product['price']; ?>€</td>
                        <td class="align-middle"><?php echo $product['stock']; ?></td>
                        <td class="align-middle"><a href="?action=edit&product_id=<?php echo $product['product_id']; ?>"><i class="bi bi-pencil-fill text-warning"></i></a></td>

                        <td class="align-middle"><a href="?action=delete&product_id=<?php echo $product['product_id']; ?>"><i class="bi bi-trash-fill text-danger"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <nav>
            <ul class="pagination justify-content-center">
                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                    <a href="<?= PRODUCT ?>?page=<?= $currentPage - 1 ?>" class="page-link">Previous</a>
                </li>
                <?php for ($page = 1; $page <= $pages; $page++) : ?>
                    <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <a href="<?= PRODUCT ?>?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                    </li>
                <?php endfor ?>
                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                    <a href="<?= PRODUCT ?>?page=<?= $currentPage + 1 ?>" class="page-link">Next</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container mt-3 mb-5">
        <div class="row">
            <?php if (!empty($pic)) : ?>
                <div class="d-flex justify-content-center mt-3 mb-3">
                    <img src="<?= $pic; ?>" style="max-width:300px;">
                </div>
            <?php endif; ?>
            <div class="col-6">
                <form class="mt-3 mb-3 product-form" action="" method="POST" enctype="multipart/form-data" id="product-form">
                    <input type="hidden" name="product_id" name="product_id" value="<?= $pId ?>">
                    <div class="mb-3">
                        <label for="reference" class="form-label">Reference</label>
                        <input type="text" class="form-control" name="reference" id="reference" value="<?= $ref ?>">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" name="category" id="category" value="<?= $cat ?>">
                    </div>
                    <div class="mb-3">
                        <label for="sub_category" class="form-label">Sub-Category</label>
                        <input type="text" class="form-control" name="sub_category" id="sub_category" value="<?= $sub ?>">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?= $tit ?>">
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">Details</label>
                        <textarea class="form-control" id="details" name="details" rows="3"><?= $des ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" class="form-control" name="color" id="color" value="<?= $col ?>">
                    </div>
            </div>
            <div class="col-6 mt-3 mb-3">
                <div class="mb-3">
                    <label for="size" class="form-label">Size</label>
                    <input type="text" class="form-control" name="size" id="size" value="<?= $siz ?>">
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" name="gender" id="gender" aria-label="Gender">
                        <option selected>Select your gender</option>
                        <option value="m" <?php if (isset($gnr)) {
                                                echo 'selected';
                                            } ?>>Male</option>
                        <option value="f" <?php if (isset($gnr)) {
                                                echo 'selected';
                                            } ?>>Female</option>
                        <option value="mixed" <?php if (isset($gnr)) {
                                                    echo 'selected';
                                                } ?>>Mixed</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="picture" class="form-label">Picture</label>
                    <input type="file" class="form-control" name="picture" id="picture" value="<?= $pic ?>">

                    <input type="hidden" name="actual-picture" value="<?= $pic; ?>">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" id="price" value="<?= $pri ?>">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="text" class="form-control" name="stock" id="stock" value="<?= $stk ?>">
                </div>
                <button type="submit" name="submit" class="btn btn-outline-dark btn-lg col-4">Submit</button>
            </div>
            </form>
        </div>
    </div>


    <?php
    require_once '../inc/admin_footer_inc.php';
    ?>