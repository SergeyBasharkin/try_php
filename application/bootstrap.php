<?php

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/db_connection.php';
require_once 'core/utils/form_validator.php';
require_once 'core/utils/My_Mailer.php';
require_once 'core/utils/Post_Validator.php';


require_once 'core/route.php';
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
Route::start();
