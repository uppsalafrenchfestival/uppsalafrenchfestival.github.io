<?php
    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $name = $email = $gender = $comment = $website = "";

    $isSubmitted = FALSE;
    $isError = FALSE;

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }  
     
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        isSubmitted = TRUE;
        
        if (empty($_POST["name"])) {
            $error = "Name is required";
            $isError = TRUE;
        } else {
            $name = test_input($_POST["name"]);
        }

        if (empty($_POST["email"]) && !$isError) {
            $error = "Email is required";
            $isError = TRUE;
        } else {
        $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Invalid email format";
                $isError = TRUE;
            }
        }

        if (empty($_POST["address"]) && !$isError) {
            $comment = "";
        } else {
            $comment = test_input($_POST["comment"]);
        }
    }
?> 

