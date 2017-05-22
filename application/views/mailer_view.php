<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 22.05.17
 * Time: 15:10
 */
?>
<h1 style="color: red"><?php if (isset($data["message"])) $data["message"] ?></h1>
<form action="/mailer" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">text</label>
        <textarea name="body" class="form-control" id="exampleInputPassword1">

        </textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>