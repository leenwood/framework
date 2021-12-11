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

    <?php if (!empty($error)): ?>
    <div class="warning"><?php echo $error ?></div>
    <?php endif; ?>
    <a href="/login" class="btn btn-primary">Авторизоваться</a> <br />
    <a href="/registr" class="btn btn-primary">Зарегистрироваться</a> <br />
    <a href="/addInfo/Form" class="btn btn-primary">Ввод данных</a> <br />
    <a href="/admin" class="btn btn-primary">Панель администратора</a> <br />
</body>
<?php