<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Restaurant Menu</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    
    
    <body>
        <div class="list">
        <h1>Restaurant Menu </h1>    
        <h2>-Breakfast</h2>
        <h3>Egg Fork</h3>
        <h2>-Lunch</h2>
        <h3>Sugar Chicken</h3>
        <h2>-Dinner</h2>
        <h3>Chicken Dinner</h3>
        <h2>-Drinks</h2>
        <h3>Beer</h3>
        
        </div>
        
        <div class="image">
        <div class="img">
            <a target="_blank" href="./pictures/ScrambledEggfork.jpg">
            <img src="./pictures/ScrambledEggfork.jpg" alt="eggFork" width="300" height="180">
            </a>
            <div class="desc"> 
            <label>
                eggFork $7.99   
            </label>
            </div>
        </div>
        
        <div class="img">
            <a href="./pictures/sugarChicken.jpg" target="_blank">
            <img src="./pictures/sugarChicken.jpg" alt="sugarChicken" width="300" height="180">
            </a>
            <div class="desc">
            <label>sugarChicken $10.99</label>
            </div>
        </div>
        
        <div class="img">
            <a href="./pictures/chickenDinner.jpg" target="_blank">
            <img src="./pictures/chickenDinner.jpg" alt="chickenDinner" width="300" height="180">
            </a>
            <div class="desc">
            <label>chickenDinner $15.00</label>
            </div>
        </div>
        
         <div class="img">
            <a href="./pictures/beer.jpg">
            <img src="./pictures/beer.jpg" alt="beer" width="300" height="180">
            </a>
            <div class="desc">
            <label>beer $1.50</label>
            </div>
        </div>
        </div>
        
        <div class="choice">
        <h1> Please Choose your item </h1>
        <form action="index.php" method="get">
        <input type="hidden" name="action" value="add"/>
            <select name="category">
                <?php
                foreach ($foods as $category => $food) :
                    $name = $food['name'];
                ?>
                <option value="<?php echo $category; ?>">
                        <?php echo $name ?>
                </option>
                <?php endforeach; ?>
            </select>
            <br>
            <br>
            <select name="foodqty">
                <?php for ($i = 1; $i <= 10; $i++) : ?>
                    <option value="<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </option>
                <?php endfor; ?>
            </select>
            <br><br>
            <input type="submit" value="Add"/>
        </form>
        <p><a href=".?action=show_cart">View Cart</a></p>
        </div> 
        
    </body>
    
</html>
