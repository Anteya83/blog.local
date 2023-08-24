<?php
require_once 'src/Base.php';


$title = "Sign Up";
$content = 'registration';
//print_r($request);
$errorr = 0;
$message = '';

if (isset($request->reg)) { //if form was send
    $name = $request->name ?? false;
    $login = $request->login ?? false;
    $email = $request->email ?? false;

    if (mb_strlen($name) > 20) {
        $message =  "Name length must be less than 20 characters";
        $errorr = 1;
    }
    if (mb_strlen($login) < 4 || mb_strlen($login) > 50) {

        $message = "Login length must be more than 3 characters";
        $errorr = 1;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message =  "Email is not correct";
        $errorr = 1;
    }

    if (isset($request->password) && is_string($request->password) && $request->password == $request->password_repeat) {
        if (strlen($request->password) < 6 || strlen($request->password) > 50) {
            $errorr = 1;
            $message = "Password length must be more than 5 characters";
        } else {
            $password = md5($request->password . SALT); //salt for password

        }
    } else {
        $errorr = 1;
        $message = "Password mismatch, try again";
    }
    if ($errorr == 0) {
        $errorr = 2;
        try {
            $db->insert('users', ['type', 'name', 'login', 'password', 'email'], ['0', $name, $login, $password, $email]);
            $message =  "Registration completed successfully and now you can <a href='/'>Log In</a>";
        } catch (PDOException $e) {
            $errorr = true;
            $e = $e->getMessage();
            if (str_starts_with($e, "SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry")) {
                $message = "This login is already taken.";
            }
        }
    }
}



require_once 'html/main.php';
