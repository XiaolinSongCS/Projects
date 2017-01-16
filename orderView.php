<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Order</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>

        <header>
            <h1>My Order</h1>
        </header>
        <section id="main">

            <h1>Your Cart</h1>
            <?php if (!isset($_SESSION['food_cart']) || count($_SESSION['food_cart']) == 0) : ?>
                <p>There are no order in your cart.</p>
            <?php else: ?>
                <form action="index.php" method="get">
                    <input type="hidden" name="action" value="update"/>
                    <table>
                        <tr id="cart_header">
                            <th>Order</th>
                            <th>Order Price</th>
                            <th>Quantity</th>
                            <th>Order Total</th>
                        </tr>

                        <?php
                        foreach ($_SESSION['food_cart'] as $category => $food) :
                            $price = number_format($food['price'], 2);
                            $total = number_format($food['total'], 2);
                            ?>
                            <tr>
                                <td>
                                    <?php echo $food['name']; ?>
                                </td>
                                <td>
                                    $<?php echo $price; ?>
                                </td>
                                <td>
                                    <input type="text"
                                           name="newqty[<?php echo $category; ?>]"
                                           value="<?php echo $food['qty']; ?>"/>
                                </td>
                                <td>
                                    $<?php echo $total; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3"><b>Subtotal</b></td>
                            <td>$<?php echo get_subtotal(); ?></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <input type="submit" value="Update Cart"/>
                            </td>
                        </tr>
                    </table>
                    <p>Click "Update Cart" to update quantities in your
                        cart. Enter a quantity of 0 to remove an order.
                    </p>
                </form>
            <?php endif; ?>
            <p><a href=".?action=show_add_item">Add Item</a></p>
            <p><a href=".?action=empty_cart">Empty Cart</a></p>

        </section>
    </body>
</html>
