<html>
<head>
    <meta charset="UTF-8">
    <title><?php $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        * {
            margin: 20px;
        }
    </style>
</head>
<body>
<?php echo $text ?>
<?php echo $msg ?>
<?php if(isset($pathAdmin)): ?>
    <a href="<?php echo $pathAdmin ?>" class="btn btn-primary" style="text-align: center; float: right;">Вернутся в панель администратора</a>
<?php endif; ?>
</body>
</html>
