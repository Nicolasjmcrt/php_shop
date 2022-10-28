<?php
    $req = $connect->query("SELECT DISTINCT category FROM product");
    ?>
    <nav class="shop-nav d-flex align-items-center justify-content-center">
        <ul class=" d-flex justify-content-between w-75">
            <li><a href="<?= URL ?>index.php"></a></li>
            <?php while ($line = $req->fetch(PDO::FETCH_ASSOC)) { ?>
                <li><a href="<?= URL ?>category.php?category=<?php echo $line['category']; ?>"><?php echo $line['category']; ?></a></li>
            <?php } ?>
        </ul>
    </nav>