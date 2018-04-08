<?php
  
   function checkPassword($pwd, &$errors) {
    $errors_init = $errors;

	$pattern = preg_quote('#$%^&*()+=-[]\';,./{}|\":<>?~', '#');
    if (strlen($pwd) < 8) {
        $errors[] = "Password too short!";
    }

    if (!preg_match("#[0-9]+#", $pwd)) {
        $errors[] = "Password must include at least one number!";
    }

    if (!preg_match("#[a-zA-Z]+#", $pwd)) {
        $errors[] = "Password must include at least one letter!";
    }   
	    if (!preg_match("#[!@#$%^&*(){}[]]#", $pwd)) {
        $errors[] = "Password must include at least one special letter!";
    } 

    return ($errors == $errors_init);
}

?>