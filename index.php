<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        // Start session management with a persistent cookie
        $duration = 60 * 60 * 24 * 7;    // 1 weeks in seconds
        //$duration = 0;                // per-session cookie
        session_set_cookie_params($duration, '/');
        session_start();

       // Create a cart array if needed
        if (empty($_SESSION['food_cart'])) {
           $_SESSION['food_cart'] = array();
        }

       // Create a table of foods
        $foods = array();
        $foods['breakfast'] = array('name'=>'eggFork','price'=> '7.99');
                                
        $foods['lunch'] = array('name' =>'sugarChicken','price'=> '9.89');
                            
        $foods['dinner'] = array('name' =>'chickenDinner','price'=>'15.00');
                                 
        $foods['drinks'] = array('name' =>'beer','price'=>'1.50');
        
       // Include cart functions
        require_once('order.php');

       // Get the action to perform
        $action = filter_input(INPUT_POST, 'action');
        if ($action === NULL) {
            $action = filter_input(INPUT_GET, 'action');
            if ($action === NULL) {
               $action = 'show_add_item';
            }
        }

       // Add or update cart as needed
        if ($action == 'add') {
           $category=filter_input(INPUT_POST, 'category');
           $foodqty = filter_input(INPUT_POST, 'foodqty');
           add_food($category,$foodqty);
           include('orderView.php');
        } else if ($action == 'update') {
            $new_qty_list = filter_input(INPUT_POST, 'newqty', FILTER_DEFAULT, 
                                            FILTER_REQUIRE_ARRAY);
            foreach ($new_qty_list as $category => $qty) {
            if ($_SESSION['food_cart'][$category]['qty'] != $qty) {
                update_food($category, $qty);
            }
            }
            include('orderView.php');
        } else if ($action == 'show_cart') {
           include('orderView.php');
        } else if ($action == 'show_add_item') {
           include('menu.php');
        } else if ($action == 'empty_cart') {
           unset($_SESSION['food_cart']);
           include('orderView.php');
        }
       ?>

    </body>
</html>
