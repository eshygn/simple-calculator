<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge" -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

    <title>Document</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
         <!-- echo htmlspecialchars($_SERVER["PHP_SELF"]); to sanitize-->

         <input type = "number" name="num01" placeholder="number one" >
         <select name = "operator">
            <option value = "add">+</option>
            <option value = "subtract">-</option>
            <option value = "multiply">x</option>
            <option value = "divide">/</option>
         </select>
         <input type="number" name="num02" placeholder="number two">
         <button>Calculate</button>
    </form>

    <?php 
    if ($_SERVER["REQUEST_METHOD"]=="POST"){

        // TO grab data from inptuts
        $num01 =filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);
        $num02 =filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);
        $operator =htmlspecialchars($_POST["operator"]); // converts to html entities.  

        // Error handlers
        $errors = false;

        //to find if a user left an input empty
        if (empty($num01) || empty($num02) || empty($operator)) { //empty = in-built funciton that checks if input is empty
            echo "<p class='calc-error'>Please fill this field </p>";
            $errors=true;
        }

        if (!is_numeric($num01) || !is_numeric($num02)) {
            echo "<p class='calc-error'> Cannot be non-numeric";
            $errors=true;
        }

        // Calculate the numbers if no errors
        if (!$errors) {
            $value=0; // will show error for some if it is left empty
            switch ($operator) {
                case "add":
                    $value = $num01+$num02;
                    break;
                    
                case "subtract":
                    $value = $num01-$num02;
                    break;

                case "multiply":
                    $value = $num01*$num02;
                    break;

                case "divide":
                    $value = $num01/$num02;
                    break;

                default:
                    echo "<p class='calc-error'>Something went wrong!</p>";
                    
                    
            }

            echo "<p class='calc-result'>Result = " . $value . "</p>";

        }
        
    }
    ?>


</body>

</html>