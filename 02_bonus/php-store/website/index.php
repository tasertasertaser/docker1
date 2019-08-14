<html>
    <head>
        <title>Fruit Shop</title>
    </head>

    <body>
        <h1>Welcome to the fruit shop please choose a fruit</h1>
        <ul>
            <?php

            $json = file_get_contents('http://product-service/');
            $obj = json_decode($json);

            $products = $obj->products;

            foreach ($products as $product) {
                echo "<li>$product</li>";
            }

            ?>
        </ul>
        <i> Your choice does not matter. </i>
    </body>
</html>
