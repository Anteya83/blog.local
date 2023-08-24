<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?></title>
</head>

<body>
    <div style="float:left;">
        <?php if ($auth_user) { ?>
            <p>Hello, <?= ucfirst($auth_user['name']) ?>!</p>
        <?php } else { ?>
            <form name="auth" action="" method="post">
                <h3>Log In</h3>
                <?php if ($error == true) { ?>
                    <p>Incorrect login or/and password!</p>
                <?php } ?>
                <p>
                    <input type="text" name="login" placeholder="LOGIN">
                </p>
                <p>
                    <input type="password" name="password" placeholder="PASSWORD">
                </p>
                <p>
                    <input type="submit" name="auth" value="Enter">
                </p>
            </form>
        <?php } ?>
        <h3>Site Menu</h3>
        <ul>
            <li><a href="/">Main</a></li>
            <li><a href="articles.php">Articles</a></li>
            <li><a href="about.php">About me</a></li>
            <?php if (!$auth_user) { ?>
                <li><a href="registration.php">Join</a></li>
            <?php } ?>

            <?php if ($auth_user) { ?>
                <li><a href="?<?= http_build_query(array_merge($_GET, ['logout' => '1'])) ?>">Exit</li></a>
            <?php } ?>
        </ul>



    </div>
    <div style="margin-left: 300px;">
        <?php require_once "html/$content.php"; ?>
    </div>
</body>

</html>