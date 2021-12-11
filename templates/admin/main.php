<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
<p><?php echo $msg ?></p>
<a href="/" class="btn btn-primary">Домой</a> <br> <br> <br>
<a href="/admin/create/user" class="btn btn-primary">Создать нового пользователя</a> <br> <br>
<a href="/admin/users" class="btn btn-primary">Посмотреть всех пользователей</a> <br> <br>
</body>
<?php
