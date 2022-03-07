<!DOCTYPE html>
<html>
<head>
    <title>GodMother Pizza</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <main>
    <h3>Your Pizza Order</h3>
    <?php 
        // read the radios
        $size = filter_input(INPUT_POST,'size');
        echo "You selected size $size <br>";
        // associative array to get size price, could also use if, else if etc.
        $size_prices = array('medium'=>7.00, 'large'=>9.00, 'family'=>12.00);
        $total = $size_prices[$size];

         
        // read chosen topping
        $topping = filter_input(INPUT_POST,'topping',
                FILTER_SANITIZE_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);
        if($topping != NULL) {
            $num_topping = count($topping);
            echo "<br>You chose these $num_topping toppings @ $1.25 ea.<br>";
            foreach($topping as $key => $value) {
                echo "$value $1.25<br>";
            }
        }
        $total += $num_topping * 1.25; // add in prices


         // read selected sides
         $items = filter_input(INPUT_POST,'items',
         FILTER_SANITIZE_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);
 
        if($items != NULL) {
        $num_items = count($items);
        echo "<br>You also chose @ $1.50 ea.<br>";
        foreach($items as $key => $value) {
            echo "$value $1.50<br>";
        }}
    
        $total += $num_items * 1.50; // add in side prices

        // display total bill
        echo '<br>Your total amount due on delivery is $'. number_format($total,2).'<br>';

        
        $address = filter_input(INPUT_POST, 'address');
        $address2 = filter_input(INPUT_POST, 'address2');
        echo '<br>Your pizza will be delivered to: <br>';
        echo $address;
        echo '<br>';
        echo $address2;

        $phone = filter_input(INPUT_POST,'phone', FILTER_SANITIZE_SPECIAL_CHARS);
        echo "<br>We will call $phone when it's on the way. <br>";

        $request = filter_input(INPUT_POST,'request');
        $request = nl2br($request,false);
        if($request != '') {
        echo "<br>You made this request <br>";
        echo $request;
        echo "<br>We will try to honor it<br>";
        }

        echo "<br>Thanks for ordering from GodMother's! <br>";

    ?>
    </main>
</body>
</html>
