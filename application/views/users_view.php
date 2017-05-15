<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 15.05.17
 * Time: 16:54
 */
?>
<h1> Users List</h1>
<table class="table table-striped">
    <thead>
    <tr>
        <th>avatar</th>
        <th>email</th>
        <th>groups</th>
    </tr>
    </thead>
    <?php foreach ($data["users"] as $email => $groups) { ?>
        <tr>
            <td>
                <img src="<?= $data["users"][$email]["avatar"]?>" height="100px" width="150px">
            </td>
            <td>
                <?= $email ?>
            </td>
            <td>
                <?php foreach ($data["users"][$email]["groups"] as $group) { ?>
                    <?= $group . ", " ?>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
</table>
