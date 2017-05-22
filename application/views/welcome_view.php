<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 11.05.17
 * Time: 15:41
 */
?>
<h1>Welcome</h1> <?php if (isset($_SESSION["current_user"])) { ?>
    <h2 style="color: #0000cc"><?= $_SESSION["current_user"]["name"] ?></h2>
<?php } else { ?>
    <a href="/login">sing in?</a>
<?php } ?>
