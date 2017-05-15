<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 15.05.17
 * Time: 14:34
 */
?>
<h1>Select groups</h1>
<hr>
<form action="/group" method="post">
    <select name="groups[]" class="selectpicker" multiple title="groups">
        <?php
            echo ($data["groups"]);
            foreach ($data["groups"] as $group){?>
                <option value="<?= $group["id"] ?>"><?= $group["name"] ?></option>
            <?php
            }
        ?>
    </select>
    <input type="submit" value="Send">
</form>
