<?php

function userConnected() {

    if (!isset($_SESSION['member'])) {
        
        return false;

    } else {

        return true;

    }
}

function userIsAdmin() {
    
    if (userConnected() && $_SESSION['member']['status'] === '1') {
        return true;

    } else {

        return false;
    }
}

function createCart () {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
        $_SESSION['cart']['product_id'] = [];
        $_SESSION['cart']['title'] = [];
        $_SESSION['cart']['color'] = [];
        $_SESSION['cart']['stock'] = [];
        $_SESSION['cart']['price'] = [];
    }
}
/**
 * function ajout au panier
 * 
 */
function updateCart($prodId, $formStock, $prodTitle, $prodColor, $prodPrice) {
    createCart();

    //Je vérifie si le produit est déjà dans la session panier avec array_search()
    $position = array_search($prodId, $_SESSION['cart']['product_id']);
    if ($position !== false) { // Si le produit est trouvé, j'incrémente la quantité

        $_SESSION['cart']['stock'][$position] += $formStock;

    } else {
        $_SESSION['cart']['product_id'][] = $prodId;
        $_SESSION['cart']['stock'][] = $formStock;
        $_SESSION['cart']['title'][] = $prodTitle;
        $_SESSION['cart']['color'][] = $prodColor;
        $_SESSION['cart']['price'][] = $prodPrice;
    }
}

function totalAmount() {
    $total = 0;

    for($i=0; $i < count($_SESSION['cart']['product_id']);$i++){
        $total += $_SESSION['cart']['stock'][$i] * $_SESSION['cart']['price'][$i]; 
    }
    return $total;
}

function deleteProductInCart($prodId) {
    // Je cherche la position du produit dans le panier
    $positionProduct = array_search($prodId, $_SESSION['cart']['product_id']);

    // array_splice() remplace une portion d'un tableau
    // En mode 1 remplace et reclasse les éléments dans le tableau
    array_splice($_SESSION['cart']['product_id'],$positionProduct, 1);
    array_splice($_SESSION['cart']['stock'],$positionProduct, 1);
    array_splice($_SESSION['cart']['title'],$positionProduct, 1);
    array_splice($_SESSION['cart']['color'],$positionProduct, 1);
    array_splice($_SESSION['cart']['price'],$positionProduct, 1);
}