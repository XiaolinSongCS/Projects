<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Add a book to the cart
function add_food($category, $quantity) {
    global $foods;
    if ($quantity < 1) 
        {return;}

    // If book already exists in cart, update quantity
    if (isset($_SESSION['food_cart'][$category])) {
        $quantity += $_SESSION['food_cart'][$category]['qty'];
        update_food($category, $quantity);
        return;
    }

    // Add book
    $price = $foods[$category]['price'];
    $total = $price * $quantity;
    $food =array(
        'name' => $foods[$category]['name'],
        'price' => $price,
        'qty'  => $quantity,
        'total' => $total
    );
    $_SESSION['food_cart'][$category] = $food;
}

// Update an book in the cart
function update_food($category, $quantity) {
    global $foods;
    $quantity = (int) $quantity;
    if (isset($_SESSION['food_cart'][$category])) {
        if ($quantity <= 0) {
            unset($_SESSION['food_cart'][$category]);
        } else {
            $_SESSION['food_cart'][$category]['qty'] = $quantity;
            $total = $_SESSION['food_cart'][$category]['price'] *
                     $_SESSION['food_cart'][$category]['qty'];
            $_SESSION['food_cart'][$category]['total'] = $total;
        }
    }
}

// Get cart subtotal
function get_subtotal() {
    $subtotal = 0;
    foreach ($_SESSION['food_cart'] as $food) {
        $subtotal += $food['total'];
    }
    $subtotal = number_format($subtotal, 2);
    return $subtotal;
}
?>
