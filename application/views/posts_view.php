<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 22.05.17
 * Time: 17:57
 */

?>
<?php if (isset($data["errors"])) var_dump($data["errors"]) ?>
<?php if (isset($data["db_result"])) var_dump($data["db_result"]) ?>

<?php foreach ($data["posts"] as $post) { ?>
    <div class="media">
        <div class="media-body">
            <h4 class="media-heading"><?= $post["user"]["name"] ?></h4>
            <?= $post["body"] ?>
            <form action="/post" method="post" id="comment">
                <div class="form-group">
                    <label for="exampleInputbody1">Body</label>
                    <textarea name="body" style=" height: 70px" class="form-control" id="exampleInputbody1"></textarea>
                </div>
                <input value="<?= $post["id"] ?>" hidden name="id">

                <button type="submit" class="btn btn-default">Submit</button>
            </form>

        </div>
    </div>
    <?php if (isset($post["comments"])) foreach ($post["comments"] as $comment) { ?>
        <div style="margin-left: 25px ">
            <h4 class="media-heading"><?= $comment["user"]["name"] ?></h4>
            <?= $comment["body"] ?>
        </div>
    <?php } ?>
<?php } ?>

<form action="/post" method="post">
    <div class="form-group">
        <label for="exampleInputbody1">Body</label>
        <textarea name="body" style=" height: 70px" class="form-control" id="exampleInputbody1"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>



