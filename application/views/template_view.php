<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="utf-8">
    <title>Главная</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="row">
    <div class="col-sm-5 col-md-offset-1 ">
        <?php include 'application/views/' . $content_view; ?>
    </div>
</div>
</body>
</html>