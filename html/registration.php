<h1>SIGN UP</h1>

<?php if ($errorr == 0 || $errorr == 1) { ?>

    <form name="reg" action="" method="post">

        <input type="text" placeholder="Enter your name" name="name" required>
        <br>

        <input type="text" placeholder="Enter your login" name="login" required>
        <br>

        <input type="text" placeholder="Enter Email" name="email" required>
        <br>

        <input type="password" placeholder="Enter Password" name="password" required>
        <br>

        <input type="password" placeholder="Repeat Password" name="password_repeat" required>
        <h4><?= $message ?></h4>
        <hr>
        <br>
        <input type="submit" class="registe" name="reg" value="Register"></input>
    </form>

<? } else { ?>
    <h4><?= $message ?></h4>
<?php }  ?>