<?php

// var_dump($_SERVER["REQUEST_METHOD"]);

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $firstname = htmlspecialchars($_POST["firstname"]); //converts code into html entities which means it won't be picked as a code. Use this function every single time so user wont inject any malicious code into the system
    $lastname = htmlspecialchars($_POST["lastname"]);
    $favoritepet = htmlspecialchars($_POST["favoritepet"]);

    // htmlentities(); // takes non-code characters and converts into html entities. Similar to htmlsepcialchars

    if(empty($first)) {
        exit();
        header("Location: ../index.php");
    }

    echo "These are the data that the user submitted:";
    echo "<br>";
    echo $firstname;
    echo "<br>";
    echo $lastname;
    echo "<br>";
    echo $favoritepet;

    
    header("Location: ../index.php"); // goes back to front page after submitting
}
else {
    header("Location: ../index.php"); 
}

// Sanitize data. Rule of thumb -> Never trust data submitted by a user

// Always use server-side security when it comes to security inside your server, eg for form validation etc.