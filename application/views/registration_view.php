
<?php
if (isset($data["errors"])) {
    foreach ($data["errors"] as $error) {
        echo "<span style='color: red'>" . $error . "</span><br>";
    }
}
?>
<form class="form-horizontal" enctype="multipart/form-data" action='/registration' method="POST">
    <fieldset>
        <div id="legend">
            <legend class="">Register</legend>
        </div>
        <div class="control-group">
            <!-- Username -->
            <label class="control-label" for="username">Username</label>
            <div class="controls">
                <input type="text" id="username" name="name" placeholder="" class="input-xlarge">
                <p class="help-block">Username can contain any letters or numbers, without spaces</p>
            </div>
        </div>

        <div class="control-group">
            <!-- E-mail -->
            <label class="control-label" for="email">E-mail</label>
            <div class="controls">
                <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                <p class="help-block">Please provide your E-mail</p>
            </div>
        </div>

        <div class="control-group">
            <!-- Password-->
            <label class="control-label" for="password">Password</label>
            <div class="controls">
                <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                <p class="help-block">Password should be at least 4 characters</p>
            </div>
        </div>

        <div class="control-group">
            <!-- Password -->
            <label class="control-label" for="password_confirm">Password (Confirm)</label>
            <div class="controls">
                <input type="password" id="password_confirm" name="confirmPass" placeholder="" class="input-xlarge">
                <p class="help-block">Please confirm password</p>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input-1">Select File</label>
            <div class="controls">
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000"/>
                <input id="input-1" type="file" name="image" class="file">
            </div>
            <p class="help-block">Browse file</p>

        </div>
        <div class="control-group">
            <!-- Button -->
            <div class="controls">
                <button class="btn btn-success">Register</button>

            </div>
        </div>
    </fieldset>
</form>