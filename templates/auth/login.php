<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<div class="authorization_div_main">
    <form action="/authorization" method="POST">
        <label>Log in</label>
        <input type="text" name="login" class="authorization_input form-control" placeholder="Персональный счет"><br>
        <input type="password" name="password" class="authorization_input form-control" placeholder="Пароль"><br>
        <button class="btn btn-success" type="submit">Sign in</button>
        <button formaction="registr" class="btn btn_border">Sign up</button>
    </form>
</div>
</body>
</html>

<!--  INSERT INTO `users` (`uid`, `lastname`, `surname`, `password`, `homeSqueare`) VALUES (NULL, 'Ershov', 'George', '123321', '10.23');  -->
<?php ?>