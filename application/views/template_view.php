<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="utf-8">
    <title>Главная</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="/dist/css/bootstrap-select.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="/dist/js/bootstrap-select.js"></script>
</head>
<body>
<div class="row">
    <div class="col-sm-5 col-md-offset-1 ">
        <?php
        if (isset($content_view)){
            include 'application/views/' . $content_view;
        }
        ?>
    </div>
</div>
</body>
</html>